<?php
namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\Sliderimage;
use App\Emailtemplate;
use App\ServiceManagement;
use App\Subcategory;
use App\ServiceBooking;
use App\ServiceAcknowledgement;
use App\Notification;
use App\PaymentCard;
use App\Faq;
use Validator;
use Mail,Hash;


class CustomerController extends Controller {
    protected $role_id   =   1;
    public function __constructor(){ }

    public function mobile_number_exist($mobile_number,$user_id = null){
        $query  =   users::where("phone_no",$mobile_number);
        if($user_id){
            $query->where("id","!=",$user_id);
        }
        // $exist  =   $query->where("status",1)->where("is_delete",0)->first();
        $exist  =   $query->where("is_delete",0)->first();
        if(!empty($exist)){
            return true;
        }else{
            return false;
        }
    }

    public function email_exist($email,$user_id = null) {
        $query  =   users::where("email",$email);
        if($user_id){
            $query->where("id","!=",$user_id);
        }
        $exist  =   $query->where("is_delete",0)->first();
        if(!empty($exist)){
            return true;
        }else{
            return false;
        }
    }

    public function customer_signup(Request $request){
       /* print_r($request->all());
        die;*/
        if($this->mobile_number_exist($request['mobile_number'])){
        	$mobile_exist              = users::where("phone_no",$request['mobile_number'])->where("is_delete",0)->first();
            if(!empty($mobile_exist)){
                $data['errors']     =   [ "mobile_number" => ["Mobile number has already been taken"] ];
                $res['status']      =   0;
                $res['message']     =   "";
                $res['response']    =   $data;
                return response($res);
            }
        }

        if($request['email']){
            $email_exist              = users::where("email",$request['email'])->where("is_delete",0)->first();
                if(!empty($email_exist)){
                    $data['errors']     =   [ "email" => ["The email has already been taken"] ];
                    $res['status']      =   0;
                    $res['message']     =   "";
                    $res['response']    =   $data;
                    return response($res);
                }  
        }

        $otp                        =   getOtp();
        $user_data                  =   new users();
        $user_data->name      		=   $request['name'];
        $user_data->email           =   $request['email'];
        $user_data->address         =   $request['address'];
        $user_data->zip_code        =   $request['postal_code'];
        $user_data->password        =   Hash::make($request['password']);
        $user_data->entity_type     =   $request['entity_type'];
        $user_data->email_otp       =   $otp;
        $user_data->email_otp_status=   1;
        $user_data->profile_updated =   1;
        $user_data->status          =   0;
        // $user_data->account_activate  =   1;
        $user_data->role            =   $this->role_id;
        $user_data->phone_no   		=   ($request['mobile_number'])? $request['mobile_number'] : null;
        $user_data->save();
        $user_id                    =   $user_data->id;

        $name =$request['name'];
        $email=$request['email'];
        $link =   getOtp();
         
        $update_data        =   [
            "email_otp"         =>  $link,
            "email_otp_status"  =>  1,
        ];
        
        users::where("id",$user_id)->update($update_data);

         $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
         $message        = str_replace(array('{name}','{link}'), array($name,$link), $EmailTemplates->message); 
         $subject        = $EmailTemplates->subject;
         $to_name        = $name;
         $to_email       = $email;
         $data           = array();
         $data['msg']    = $message;
         Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
            $message->to($to_email, $to_name)->subject($subject);
            $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
         });

        $data['errors']     =   [];
        $data['user_id']    =   $user_id;
        $data['email']      =   $request['email'];
        $res['status']      =   1;
        $res['message']     =   "User registered successfully";
        $res['response']    =   $data;
        return response($res);
    }

    public function customer_login(Request $request){
     	$rules      =   [
                "email"     =>  "required|email",
                "password"  =>  "required",
                "notification_token" => "required"
        ];
        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

    	$email      =   $request['email'];
        $password   =   $request['password'];
        $notification_token = $request['notification_token'];

        $user_data  =   users::where("email",$email)->where("role",$this->role_id)->where('is_delete',0)->first();

        if(!empty($user_data)){
            if(Hash::check($password,$user_data->password)) {
                if($user_data->status==0) {
                    if($user_data->email_verified == 0) {
                        $name =$user_data->name;
                        $email=$user_data->email;
                        $link =   getOtp();
                         
                        $update_data        =   [
                            "email_otp"         =>  $link,
                            "email_otp_status"  =>  1,
                        ];
                        users::where("id",$user_data->id)->update($update_data);
    
                        $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
                        $message 	     = str_replace(array('{name}','{link}'), array($name,$link), $EmailTemplates->message); 
                        $subject 		 = $EmailTemplates->subject;
                        $to_name 	     = $name;
                        $to_email 	     = $email;
                        $data   	     = array();
                        $data['msg']    = $message;
                        Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) 
                        {
                          $message->to($to_email, $to_name)->subject($subject);
                          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                        });
    
                        $data['errors']     =   [];
                        $data['user_id']    =   $user_data->id;
                        $res['status']      =   2;
                        $res['message']     =   "Please Verify Email to login";
                        $res['response']    =   $data;
                        return response($res); 
                    } else if($user_data->email_verified == 1) {
                        $user_data->notification_token =$notification_token;
                        $user_data->save();

                        $data['errors']     =   [];
                        $data['user_data']  =   $user_data;
                        $res['status']      =   1;
                        $res['message']     =   "Login Successfully";
                        $res['response']    =   $data;
                        return response($res);
                    } 
                } else {
                    $data['errors']     =   [];
                    $data['user_data']  =   $user_data;
                    $res['status']      =   0;
                    $res['message']     =   "Your account has been deactivated";
                    $res['response']    =   $data;
                    return response($res);
                }
            } else{
                $data['errors']     =   ["password" => ["Password is incorrect"]];
                $res['status']      =   0;
                $res['message']     =   "Password is incorrect";
                $res['response']    =   $data;
                return response($res);
            }
            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Success";
            $res['response']    =   $data;
            return response($res);
        }else{
            $data['errors']     =   ["email" => ["Email not registered"]];
            $res['status']      =   0;
            $res['message']     =   "Email not registered";
            $res['response']    =   $data;
            return response($res);
        }
    }


    public function facebookLogin(Request $request){
        $rules  =   [
            "facebook_id"   =>  "required",
            "name"       =>  "required",
            "notification_token" => "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $facebook_id=$request['facebook_id'];
        $email = $request['email'];
        $name = $request['name'];
        $notification_token = $request['notification_token'];
        
        $user= users::where('facebook_id',$facebook_id)->where('is_delete',0)->select('id','name','email','facebook_id','email_verified','profile_updated','account_activate','status')->first();
        if(!empty($user)) {
            if($user->role!=1) {
                if($user->status==0){
                    if($user->email_verified!=1 && $user->profile_updated==1) {
                        $otp=getOtp();
                        $user->email_otp=$otp;
                        $user->email_otp_status=1;

                        $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
                        $message        = str_replace(array('{name}','{link}'), array($user->name,$otp), $EmailTemplates->message); 
                        $subject        = $EmailTemplates->subject;
                        $to_name        = $user->name;
                        $to_email       = $user->email;
                        $data           = array();
                        $data['msg']    = $message;
                        Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
                          $message->to($to_email, $to_name)->subject($subject);
                          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                        });
                    }

                    // Save notification token if profile is updated and email is verified.
                    if($user->email_verified==1 && $user->profile_updated==1) {
                        $user->notification_token=$notification_token;
                    }

                    $user->save();

                    $data['errors']= [];
                    $data['user']  = $user;
                    $res['status']      =   1;
                    $res['message']     =   "Already registered user";
                    $res['response']    =   $data;
                }else{
                    $data['errors']= [];
                    $data['user']  = $user;
                    $res['status']      =   0;
                    $res['message']     =   "Your account has been deactivated";
                    $res['response']    =   $data;
                }
            } else{
                $data['errors']= [];
                $res['status']      =   0;
                $res['message']     =   "Access denied";
                $res['response']    =   $data;
            } 
        } else{
            if(!empty($email)) {                
                $user_with_email=users::where('is_delete',0)->where('email',$email)->select('id','name','email','facebook_id','email_verified','profile_updated')->first();
                if(!empty($user_with_email)) {
                    $user_with_email->facebook_id=$facebook_id;
                    
                    if($user_with_email->email_verified!=1 && $user_with_email->profile_updated==1) {
                        $otp=getOtp();
                        $user_with_email->email_otp=$otp;
                        $user_with_email->email_otp_status=1;

                        $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
                        $message        = str_replace(array('{name}','{link}'), array($user_with_email->name,$otp), $EmailTemplates->message); 
                        $subject        = $EmailTemplates->subject;
                        $to_name        = $user_with_email->name;
                        $to_email       = $user_with_email->email;
                        $data           = array();
                        $data['msg']    = $message;
                        Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
                          $message->to($to_email, $to_name)->subject($subject);
                          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                        });
                    }

                    // Save notification token if profile is updated and email is verified.
                    if($user_with_email->email_verified==1 && $user_with_email->profile_updated==1) {
                        $user_with_email->notification_token=$notification_token;
                    }
                    $user_with_email->save();

                    $data['errors']= [];
                    $data['user']  = $user_with_email;
                    $res['status']      =   1;
                    $res['message']     =   "Already registered user";
                    $res['response']    =   $data;
                } else { 
                    $new_user                  =   new users();
                    $new_user->name      	   =   $name;
                    $new_user->email           =   $email;
                    $new_user->facebook_id     =   $facebook_id;
                    $new_user->role            =   $this->role_id;
                    $new_user->account_activate  =   1;
                    $new_user->email_verified  =   1;
                    $new_user->status = 0;
                    $new_user->save();

                    $new_user_data=users::where('id',$new_user->id)->where('is_delete',0)->select('id','name','email','facebook_id','email_verified','profile_updated','account_activate','status')->first();

                    $data['errors']= [];
                    $data['user']  = $new_user_data;
                    $res['status']      =   1;
                    $res['message']     =   "New Registered";
                    $res['response']    =   $data;
                }
            }else {
                $new_user                  =   new users();
                $new_user->name      	   =   $name;
                $new_user->facebook_id     =   $facebook_id;
                $new_user->role            =   $this->role_id;
                // $user_data->account_activate  =   1;
                $new_user->status          =   0;
                $new_user->save();

                $new_user_data=users::where('id',$new_user->id)->where('is_delete',0)->select('id','name','email','facebook_id','email_verified','profile_updated','account_activate','status')->first();

                $data['errors']= [];
                $data['user']  = $new_user_data;
                $res['status']      =   1;
                $res['message']     =   "New Registered";
                $res['response']    =   $data;
            }
        }
        return response($res);
    }


    public function twitterLogin(Request $request){
        $rules  =   [
            "twitter_id"   =>  "required",
            "name"       =>  "required",
            "notification_token" => "required"
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $twitter_id=$request['twitter_id'];
        $name = $request['name'];
        $notification_token=$request['notification_token'];
        
        $user= users::where('twitter_id',$twitter_id)->where('is_delete',0)->select('id','name','email','twitter_id','email_verified','profile_updated','account_activate','status')->first();
        if(!empty($user)) {
            if($user->role!=1) {
                if($user->status==0){
                    if($user->email_verified!=1 && $user->profile_updated==1) {
                        $otp=getOtp();
                        $user->email_otp=$otp;
                        $user->email_otp_status=1;

                        $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
                        $message        = str_replace(array('{name}','{link}'), array($user->name,$otp), $EmailTemplates->message); 
                        $subject        = $EmailTemplates->subject;
                        $to_name        = $user->name;
                        $to_email       = $user->email;
                        $data           = array();
                        $data['msg']    = $message;
                        Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
                          $message->to($to_email, $to_name)->subject($subject);
                          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                        });
                    }

                    // Save notification token if profile is updated and email is verified.
                    if($user->email_verified==1 && $user->profile_updated==1) {
                        $user->notification_token=$notification_token;
                    }

                    $user->save();

                    $data['errors']= [];
                    $data['user']  = $user;
                    $res['status']      =   1;
                    $res['message']     =   "Already registered user";
                    $res['response']    =   $data;
                }else{
                    $data['errors']= [];
                    $data['user']  = $user;
                    $res['status']      =   0;
                    $res['message']     =   "Your account has been deactivated";
                    $res['response']    =   $data;
                }
            } else{
                $data['errors']= [];
                $res['status']      =   0;
                $res['message']     =   "Access denied";
                $res['response']    =   $data;
            } 
        } else{
            $new_user                  =   new users();
            $new_user->name      	   =   $name;
            $new_user->twitter_id     =   $twitter_id;
            $new_user->role            =   $this->role_id;
            //$user_data->account_activate  =   1;
            $new_user->status          =   0;
            $new_user->save();

            $new_user_data=users::where('id',$new_user->id)->where('is_delete',0)->select('id','name','email','twitter_id','email_verified','profile_updated','account_activate','status')->first();

            $data['errors']= [];
            $data['user']  = $new_user_data;
            $res['status']      =   1;
            $res['message']     =   "New Registered";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function signup_verification(Request $request){
    	$rules  =   [
            "user_id"   =>  "required",
            "otp"       =>  "required|numeric|digits:4",
            "notification_token"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        $user_id                =   $request['user_id'];
        $user_data              =   users::find($user_id);

        if(!empty($user_data)){
    	    if( ($user_data->email_otp == $request['otp']) && ($user_data->email_otp_status == 1) ){
                $user_data->email_otp        =   null;
                $user_data->notification_token = $request['notification_token'];
    	        $user_data->email_otp_status =   0;
                $user_data->email_verified   =   1;
                $user_data->varify_status    =   1;
                $user_data->account_activate =   1;
    	        $user_data->save();
    	       
    	        $data['errors']     =   [];
    	        $res['status']      =   1;
    	        $res['message']     =   "Account Verified Successfully.";
    	        $res['response']    =   $data;
    	        return response($res);
    	    }else{
    	        $data['errors']     =   [ "otp" => ["Invalid OTP"] ];
    	        $res['status']      =   0;
    	        $res['message']     =   "Invalid OTP";
    	        $res['response']    =   $data;
    	        return response($res);
    	    }
    	}else{
    	    $data['errors']     =   [];
    	    $res['status']      =   0;
    	    $res['message']     =   "Invalid User";
    	    $res['response']    =   $data;
    	    return response($res);
    	}
    }

    public function customer_resend_otp(Request $request){
        $user_id        =   $request['user_id'];
        $user_data      =   users::find($user_id);
        if(!empty($user_data)){
            $otp        =   getOtp();

            $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
            $message        = str_replace(array('{name}','{link}'), array($user_data->name,$otp), $EmailTemplates->message); 
            $subject        = $EmailTemplates->subject;
            $to_name        = $user_data->name;
            $to_email       = $user_data->email;
            $data           = array();
            $data['msg']    = $message;
            Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
              $message->to($to_email, $to_name)->subject($subject);
              $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
            });

            $user_data->email_otp       =   $otp;
            $user_data->email_otp_status=   1;
            $user_data->save();
            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "OTP resend successfully";
            $res['response']    =   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function customer_forgot_password(Request $request){
      $rules  =   [
            "email"     =>  "required|email",
        ];
        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        $email          =   $request['email'];
        $user_data      =   users::where("email",$email)->where("role",$this->role_id)->first();
        if(!empty($user_data)){
            $otp                =   getOtp();
            $update_data        =   [
                "email_otp"         =>  $otp,
                "email_otp_status"  =>  1,
            ];
            users::where("id",$user_data->id)->update($update_data);

            $EmailTemplates    = Emailtemplate::where('slug', 'Forgot-password')->first();
            $message           = str_replace(array('{name}','{link}'), array($user_data->name,$otp), $EmailTemplates->message); 
            $subject           = $EmailTemplates->subject;
            $to_name           = $user_data->name;
            $to_email          = $user_data->email;
            $data              = array();
            $data['msg']       = $message;
            Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject){
              $message->to($to_email, $to_name)->subject($subject);
              $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
            });

            $data['errors']     =   [];
            $data['user_id']    =   $user_data->id;
            $res['status']      =   1;
            $res['message']     =   "Please use OTP sent to your email";
            $res['response']    =   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }  
    }

    public function customer_check_forgot_password(Request $request){
        $rules  =   [
            "email"     =>  "required|email",
            "otp"       =>  "required:numeric|digits:4",
        ];
        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        $email          =   $request['email'];
        $otp            =   $request['otp'];
        $user_data      =   users::where("email",$email)->where("role",$this->role_id)->first();
        if(!empty($user_data)){
            if($user_data->email_otp != $otp){
                $data['errors']     =   ["otp" => ["Invalid OTP"]];
                $res['status']      =   0;
                $res['message']     =   "Invalid OTP";
                $res['response']    =   $data;
                return response($res);
            }else if($user_data->email_otp_status != 1){
                $data['errors']     =   ["otp" => ["OTP expired"]];
                $res['status']      =   0;
                $res['message']     =   "OTP expired";
                $res['response']    =   $data;
                return response($res);
            }else{
                $update_data        =   [
                    "email_otp"         =>  null,
                    "email_otp_status"  =>  0,
                ];
                Users::where("id",$user_data->id)->update($update_data);
                $data['errors']     =   [];
                $data['user_id']    =   $user_data->id;
                $res['status']      =   1;
                $res['message']     =   "OTP verified successfully";
                $res['response']    =   $data;
                return response($res);
            }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function customer_reset_password(Request $request){
        $user_id    =   $request['user_id'];
        $messages   =   [
            'new_password.same' => "New Password and Confirm password didn't match.",
            'new_password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
        ];
        $rules  =   [
            'user_id'           =>  'required',
            'new_password'      =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password'  =>  'required|same:new_password|min:6|max:55',
        ];
        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        $user_data                  =   users::find($user_id);

        if(!empty($user_data)){
           if($request['new_password']){
                $new_password           = Hash::check($request['new_password'],$user_data->password);
                 if($new_password){
                    $data['errors']     =   [ "password" => ["New password should be different from previous password"] ];
                    $res['status']      =   2;
                    $res['message']     =   "";
                    $res['response']    =   $data;
                    return response($res);
                 }
                
            }
            $user_data->email_otp       =   null;
            $user_data->email_otp_status=   0;
            $user_data->password        =   Hash::make($request['new_password']);
            $user_data->save();
            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Password Reset Successfully. Login to continue";
            $res['response']    =   $data;
            return response($res);     
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function changePassword(Request $request) {
        $messages   =   [
            'new_password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
            'confirm_password.same' => "New Password and Confirm password didn't match.",
        ];
        $rules  =   [
            'user_id'           =>  'required',
            'old_password'      =>  'required',
            'new_password'      =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'confirm_password'  => 'required|same:new_password|min:6|max:55',
        ];

        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        

        $user_id    =   $request['user_id'];
        $old_password =  $request['old_password'];
        $new_password=$request['new_password'];

        $user_data  =   users::find($user_id);
        if(!empty($user_data)){
            $match_old_password  = Hash::check($old_password,$user_data->password);
            if($match_old_password){
                $match_new_password = Hash::check($new_password,$user_data->password);
                if(!$match_new_password){
                    $user_data->password= Hash::make($new_password);
                    $user_data->save();
                    $data['errors']     =   [];
                    $res['status']      =   1;
                    $res['message']     =   "Password changed successfully";
                    $res['response']    =   $data;
                }else{
                    $data['errors']     =   [];
                    $res['status']      =   0;
                    $res['message']     =   "Please enter a different password from previous password";
                    $res['response']    =   $data;    
                }
            }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Old password does not match";
                $res['response']    =   $data;
            }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function customer_data(Request $request){
        $user_id = $request['user_id'];
        if(!empty($user_id)){
             $user_data             =  users::where("id",$user_id)->where("status",0)->where("is_delete",0)->first();
             $cust_img_slider       =  Sliderimage::where("status",0)->where("is_delete",0)->get();
             $notification_count = Notification::where('user_id',$user_id)->where('is_read',0)->where('is_delete',0)->count();

             if(!empty($user_data)){
                $data['errors']                 =   [];
                $data['user_data']              =   $user_data; 
                $data['cust_img_slider']        =   $cust_img_slider; 
                $data['notification_count']     =   $notification_count; 
                $res['status']                  =   1;
                $res['message']                 =   "Success";
                $res['response']                =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid User";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function customer_all_category_data(Request $request){
        $user_id = $request['user_id'];
        if(!empty($user_id)){
             $user_category   = ServiceManagement::where('is_delete',0)->where('active_status',0)->get();
             
             if(!empty($user_category)){
                $data['errors']                 =   [];
                $data['user_category']          =   $user_category; 
                $res['status']                  =   1;
                $res['message']                 =   "Success";
                $res['response']                =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid User";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }   
    }

    public function customer_category_data(Request $request){
        $parent_cat_id = ($request['parent_cat_id']) ? $request['parent_cat_id'] : null;
        
        if(!empty($parent_cat_id)){
             $category_data   = Subcategory::where("parent_category",$parent_cat_id)->where('is_delete',0)->where('status',0)->get();
             
             if(!empty($category_data)){
                $data['errors']                 =   [];
                $data['category_data']          =   $category_data; 
                $res['status']                  =   1;
                $res['message']                 =   "Success";
                $res['response']                =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid Category";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid Category";
            $res['response']    =   $data;
            return response($res);
        } 
    }

    public function customer_category_detail(Request $request){

       $cate_id = ($request['cate_id']) ? $request['cate_id'] : null;
        
        if(!empty($cate_id)){
             $category_data =ServiceManagement::where("id",$cate_id)->where('is_delete',0)->where('active_status',0)->first();
             
             if(!empty($category_data)){
                $data['errors']                 =   [];
                $data['category_data']          =   $category_data; 
                $res['status']                  =   1;
                $res['message']                 =   "Success";
                $res['response']                =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid Category";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid Category";
            $res['response']    =   $data;
            return response($res);
        } 
    }

    public function customerImageUpload(Request $request) {
        $name               =   '';
        if ($request->hasFile('service_booking_image')) {
            $image          =   $request->file('service_booking_image');
            $name           =    time().rand(1,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath=   public_path('/image/book_service');
            $image->move($destinationPath, $name);
        }
        if ($request->hasFile('cust_personal_image')) {
            $image          =   $request->file('cust_personal_image');
            $name           =    time().rand(1,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath=   public_path('/image/users');
            $image->move($destinationPath, $name);
        }
        return $name;
    }

    public function customer_service_booking(Request $request){
        $rules      =   [
            "service_id"  =>  "required",
            "address" => "required",
            "date" => "required",
            "time"      =>  "required",
            "additional_information"  =>  "required",
            "user_id"  =>  "required",
            "status"  =>  "required",
            "sub_category"  =>  "required",
            "mobile_no"  =>  "required",
            "whatsapp_no"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $service_id = ($request['service_id'])? $request['service_id']:null;
        if(!empty($service_id)){
            $booking_data                           =   new ServiceBooking();
            $booking_data->address                  =   $request['address'];
            $booking_data->date                     =   $request['date'];
            $booking_data->time                     =   $request['time'];
            $booking_data->additional_information   =   $request['additional_information'];
            $booking_data->user_id                  =   $request['user_id'];
            $booking_data->service_id               =   $request['service_id'];
            $booking_data->status                   =   $request['status'];
            $booking_data->sub_category             =   $request['sub_category'];
            $booking_data->mobile_no                =   $request['mobile_no'];
            $booking_data->whatsapp_no              =   $request['whatsapp_no'];
            if(!empty($request['image'])) {
                $booking_data->image                =   $request['image'];
            }
            $booking_data->save();
            $service_booking_id                     =   $booking_data->id;
            
            // $service_acknowledgement = new ServiceAcknowledgement();
            // $service_acknowledgement->service_booking_id = $service_booking_id;
            // $service_acknowledgement->service_status = 0;
            // $service_acknowledgement->save();

            $data['errors']                =   [];
            $data['service_booking_id']    =   $service_booking_id;
            $res['status']                 =   1;
            $res['message']                =   "Service request sent successfully";
            $res['response']               =   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function customer_profile_details(Request $request){
        $customer_id = ($request['customer_id']) ? $request['customer_id'] : null;
        if(!empty($customer_id)){
             $customer_data             =  users::where("id",$customer_id)->where("status",0)->where("is_delete",0)->first();
             if(!empty($customer_data)){
                $data['errors']                 =   [];
                $data['customer_data']          =   $customer_data; 
                $res['status']                  =   1;
                $res['message']                 =   "Success";
                $res['response']                =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid User";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function customer_profile_update(Request $request) {
        $rules      =   [
            "name"  =>  "required",
            "phone_no" => "required",
            "address" => "required",
            "email"      =>  "required|email",
            "zip_code"  =>  "required",
            "entity_type"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $customer_id= $request['customer_id'];
        $name  =  $request['name'];
        $phone_no = $request['phone_no'];
        $address = $request['address'];
        $email     =  $request['email'];
        $zip_code  =  $request['zip_code'];
        $entity_type  =  $request['entity_type'];
        
        if($this->mobile_number_exist($phone_no,$customer_id)){
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Contact number already taken";
            $res['response']    =   $data;
            return response($res);
        }

        if($this->email_exist($email,$customer_id)){
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Email has been already taken";
            $res['response']    =   $data;
            return response($res);
        }
        
        $customer_profile_data=users::find($customer_id,['id','name','email','facebook_id','email_verified','profile_updated','status']);

        if(!empty($customer_profile_data)) {
            $customer_profile_data->name = $name;
            $customer_profile_data->email= $email;
            $customer_profile_data->phone_no = $phone_no;
            $customer_profile_data->address = $address;
            $customer_profile_data->zip_code = $zip_code;
            $customer_profile_data->profile_updated = 1;
            $customer_profile_data->entity_type = $entity_type;
            if($request['personal_image']){
                $customer_profile_data->image = $request['personal_image'];
            }
            
            if($request['profile_complete_mode']=="true") {
                if($customer_profile_data->email_verified!=1) {
                    $otp= getOtp();
                    $customer_profile_data->email_otp=$otp;
                    $customer_profile_data->email_otp_status=1;
                    $customer_profile_data->save();
                    
                    $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
                    $message        = str_replace(array('{name}','{link}'), array($name,$otp), $EmailTemplates->message); 
                    $subject        = $EmailTemplates->subject;
                    $to_name        = $name;
                    $to_email       = $email;
                    $data           = array();
                    $data['msg']    = $message;
                    Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
                        $message->to($to_email, $to_name)->subject($subject);
                        $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                    });

                    $data['errors']                     =   [];
                    $data['customer_profile_data']      =   $customer_profile_data;
                    $res['status']                      =   1;
                    $res['message']                     =   "Please verify your email";
                    $res['response']                    =   $data;  
                }else if($customer_profile_data->email_verified==1 && $customer_profile_data->status==0) {
                    if(!empty($request['notification_token'])) {
                        $customer_profile_data->notification_token=$request['notification_token'];
                        $customer_profile_data->save();
    
                        $data['errors']                     =   [];
                        $data['customer_profile_data']      =   $customer_profile_data;
                        $res['status']                      =   1;
                        $res['message']                     =   "Please verify your email";
                        $res['response']                    =   $data; 
                    } else {
                        $data['errors']                     =   [];
                        $data['customer_profile_data']      =   $customer_profile_data;
                        $res['status']                      =   0;
                        $res['message']                     =   "Invalid Data";
                        $res['response']                    =   $data; 
                    }
                }  else{
                    $customer_profile_data->save();
                    $data['errors']                     =   [];
                    $data['customer_profile_data']      =   $customer_profile_data;
                    $res['status']                      =   1;
                    $res['message']                     =   "Profile updated successfully";
                    $res['response']                    =   $data; 
                }        
            } else{
                $customer_profile_data->save();
                $data['errors']                     =   [];
                $data['customer_profile_data']      =   $customer_profile_data;
                $res['status']                      =   1;
                $res['message']                     =   "Profile updated successfully";
                $res['response']                    =   $data;
            }
        } else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function customerBookings(Request $request) {
        $rules      =   [
            "user_id"  =>  "required",
            "type" => "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $customer_id= $request['user_id'];
        $type  =  $request['type'];
        $acknowledgement_status= $request['acknowledgement_status'];

        if(isset($acknowledgement_status)){
            $booking_data= ServiceBooking::where('user_id', $customer_id)->where('status', $type)->
                                        join('service_acknowledgements', function ($join) use ($acknowledgement_status) {
                                            if($acknowledgement_status==0){
                                                $join->on('service_acknowledgements.service_booking_id','=','service_booking.id')
                                                ->where('service_acknowledgements.service_status',$acknowledgement_status);
                                            }else if($acknowledgement_status==1) {
                                                $join->on('service_acknowledgements.service_booking_id','=','service_booking.id')
                                                ->where('service_acknowledgements.service_status','>=',$acknowledgement_status);
                                            }
                                        })
                                        ->select('service_booking.*')
                                        ->orderBy('service_booking.created_at','DESC')
                                        ->get();
        }else{
            $booking_data= ServiceBooking::where('user_id', $customer_id);
            $booking_data= ($type==1)? $booking_data->whereIn('status',[0,1]) : $booking_data->where('status',$type) ; 
            $booking_data=$booking_data->orderBy('created_at','DESC')->get();
        }


        if(!empty($booking_data)) {
            foreach($booking_data as $key=>$value){
                if(!empty($value->user_id)) {
                    $booking_data[$key]["customer"] = users::find($value->user_id,['id','name','email','phone_no']);
                }

                if(!empty($value->assign_provider)) {
                    $booking_data[$key]["provider"] = users::find($value->assign_provider,['id','name','email','phone_no']);
                }

                if(!empty($value->service_id)){
                    $booking_data[$key]["service"] = ServiceManagement::find($value->service_id);
                    $booking_data[$key]["service_sub_category"] = Subcategory::where('parent_category',$value->service_id)->get();
                }

                $booking_data[$key]['service_acknowledgement'] = ServiceAcknowledgement::where('service_booking_id',$value->id)->first();
            }
            $data['errors']     =   [];
            $data['service_bookings']=$booking_data;
            $res['status']      =   1;
            $res['message']     =   "Service booking fetched successfully";
            $res['response']    =   $data;
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "No service bookings";
            $res['response']    =   $data;
        }
        return response($res);
    }


    public function serviceBookingDetail(Request $request) {
        $rules      =   [
            "booking_id"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $booking_id = $request['booking_id'];
        $booking_data = getServiceBookingDetail($booking_id);
    
        if(!empty($booking_data)) {
            $data['errors']     =   [];
            $data['service_booking']=$booking_data;
            $res['status']      =   1;
            $res['message']     =   "Service booking fetched successfully";
            $res['response']    =   $data;
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "No service bookings";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function logout(Request $request) {
        $rules      =   [
            "user_id"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id = $request['user_id'];
        $user= users::find($user_id);
        if(!empty($user)) {
            $user->notification_token= null;
            $user->save();

            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Logout successfully";
            $res['response']    =   $data;
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "User Invalid";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function confirmStartEndService(Request $request) {
        $rules      =   [
            "customer_id"     =>  "required",
            "service_booking_id" => "required", 
            "acknowledgement_status" => "required",
        ];


        // status of service
        //0=>not_start, 1=>start_request_sent, 2=>start_confirmed_by_customer, 3=>end_request_sent, 4=>end_confirmed_by_customer

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
        }else{
            $customer_id=$request['customer_id'];
            $service_booking_id=$request['service_booking_id'];
            $acknowledgement_status=$request['acknowledgement_status'];

            $service_booking_data=ServiceBooking::where('user_id',$customer_id)->where('id',$service_booking_id)->where('status','!=',3)->first();

            $customer_data=users::where('id',$service_booking_data->user_id)->first();
            $provider_data=users::where('id',$service_booking_data->assign_provider)->first();
            $service_management=ServiceManagement::where('id',$service_booking_data->service_id)->where('is_delete',0)->first();

            if(!empty($service_booking_data) && !empty($customer_data) && !empty($provider_data) && !empty($service_management)) {
                if($acknowledgement_status==2){
                    $service_acknowledgement= ServiceAcknowledgement::where('service_booking_id',$service_booking_id)->first();
                    $service_acknowledgement->service_status=$acknowledgement_status;
                    $service_acknowledgement->start_at_provider=date("Y-m-d H:i:s");
                    $service_acknowledgement->save();

                    // Send notification to the provider once service start is confirmed by customer
                    if($provider_data->notification_token){
                        sendNotification($provider_data->notification_token,"Start confirmation",$customer_data->name." has confirmed start of ".$service_management->category_name,['type'=>1,'data'=>$service_acknowledgement],1,
                        $provider_data->id);
                    }
                    
                    $data['errors']     =  [];
                    $res['status']      =   1;
                    $res['message']     =   "Service started successfully";
                    $res['response']    =   $data;
                }else if($acknowledgement_status==4){  
                    $service_acknowledgement= ServiceAcknowledgement::where('service_booking_id',$service_booking_id)->first();
                    $service_acknowledgement->service_status=4;
                    $service_acknowledgement->end_at_provider=date("Y-m-d H:i:s");
                    $service_acknowledgement->save();
                    
                    // Complete the service booking with status 5
                    $service_booking_data->status=5;
                    $service_booking_data->save();

                    // Send notification to the provider once service end is confirmed by customer
                    if($provider_data->notification_token){
                        sendNotification($provider_data->notification_token,"End confirmation",$customer_data->name." has confirmed end of ".$service_management->category_name,['type'=>1,'data'=>$service_acknowledgement],1,
                        $provider_data->id);
                    }

                    $data['errors']     =  [];
                    $res['status']      =   1;
                    $res['message']     =   "Service ended successfully";
                    $res['response']    =   $data;
                }else{
                    $data['errors']     =  [];
                    $res['status']      =   0;
                    $res['message']     =   "Invalid request";
                    $res['response']    =   $data;
                }
            } else{
                $data['errors']     =  [];
                $res['status']      =   0;
                $res['message']     =   "Invalid request";
                $res['response']    =   $data;
            }

        }
        return response($res);
    }

    public function bookOrCancelService(Request $request) {
        $rules      =   [
            "customer_id"     =>  "required",
            "service_booking_id" => "required", 
            "status" => "required",
        ];

        // status of service
        //0=>not_start, 1=>start_request_sent, 2=>start_confirmed_by_customer, 3=>end_request_sent, 4=>end_confirmed_by_customer

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
        }else{
            $customer_id=$request['customer_id'];
            $service_booking_id=$request['service_booking_id'];
            $status=$request['status'];

            $service_booking_data=ServiceBooking::where('user_id',$customer_id)->where('id',$service_booking_id)->first();

            if(!empty($service_booking_data)) {
                $service_booking_data->status=$status;
                $service_booking_data->save();

                $data['errors']     =  [];
                $res['status']      =   1;
                $res['message']     =   $status==0 ? "Service booked successfully" : "Service cancelled successfully";
                $res['response']    =   $data;
            } else{
                $data['errors']     =  [];
                $res['status']      =   0;
                $res['message']     =   "Invalid request";
                $res['response']    =   $data;
            }
        }
        return response($res);
    }

    public function notifications(Request $request){
        $user_id = ($request['user_id'] ) ? $request['user_id'] : null;
        if(!empty($user_id)){
             $notification_data  = Notification::where("user_id",$user_id)->where('is_delete',0)->
                orderBy('created_at','desc')->get();

            $data['errors']                         =   [];
            $res['status']                          =   1;
            $res['message']                         =   "Success";
            $res['response']                        =   $notification_data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function notificationsMarkRead(Request $request){
        $user_id = ($request['user_id'] ) ? $request['user_id'] : null;
        if(!empty($user_id)){
            Notification::where("user_id",$user_id)->where('is_delete',0)->update(['is_read'=>1]);

            $data['errors']                         =   [];
            $res['status']                          =   1;
            $res['message']                         =   "Success";
            $res['response']                        =   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function faq(Request $request){
        $faqs=Faq::where('is_delete',0)->where('status',0)->get();

        if(!empty($faqs)){
            $data['errors']                         =   [];
            $data['faqs']                           =   $faqs;
            $res['status']                          =   1;
            $res['message']                         =   "Success";
            $res['response']                        =   $data;
            return response($res);
        }else {
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Faq not available";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function transaction(Request $request){
        $result = array();
        if(!empty($request['reference'])) {
            //The parameter after verify/ is the transaction reference to be verified
            $url = "https://api.paystack.co/transaction/verify/".$request['reference'];
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt(
            $ch, CURLOPT_HTTPHEADER, [
                'Authorization: Bearer sk_test_ac9224b36e2557a50ed29333a5321a691ad0ca30']
            );
            $response = curl_exec($ch);
            if(curl_error($ch)){
                    echo 'error:' . curl_error($ch);
            }
            curl_close($ch);
    
            if(!empty($response)){
                $data['errors']                         =   [];
                $data['transcation']                    =   $response;
                $res['status']                          =   1;
                $res['message']                         =   "Success";
                $res['response']                        =   $data;
            }else {
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Invalid reference";
                $res['response']    =   $data;
            }
        } else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid data";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function addUpdateCard(Request $request) {
        $rules      =   [
            "user_id" => 'required',
            "cardholder_name"  =>  "required|max:50",
            "card_number"  =>  ['required','regex:/^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/'],
            "expiry_month"  =>  "required",
            "expiry_year"  =>  "required",
            "default_card"  =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id         =  $request['user_id']; 
        $payment_card_id =  $request['card_id'];
        $cardholder_name =  $request['cardholder_name'];
        $card_number     =  $request['card_number'];
        $expiry_month    =  $request['expiry_month'];
        $expiry_year     =  $request['expiry_year'];
        $default_card    =  $request['default_card'];

       if(!empty($payment_card_id)) {
            $payment_card=PaymentCard::where('user_id',$user_id)->where('id',$payment_card_id)->where('is_delete',0)->first();
            if($payment_card) {
                if($default_card==1) {
                    PaymentCard::where('user_id', $user_id )->where('is_delete',0)->update(['defalut_card' => 0]);
                }

                $payment_card->cardholder_name  =  $cardholder_name;
                $payment_card->card_number      =  $card_number;
                $payment_card->expiry_month     =  $expiry_month;
                $payment_card->expiry_year      =  $expiry_year;
                $payment_card->defalut_card     =  $default_card;
                $payment_card->save();
                
                $data['errors']     =   [];
                $res['status']      =   1;
                $res['message']     =   "Card updated successfully";
                $res['response']    =   $data;
            } else{                
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Could not update your card";
                $res['response']    =   $data;
            }
        } else {
            if($default_card==1) {
                PaymentCard::where('user_id', $user_id )->update(['defalut_card' => 0]);
            }

            $payment_card=new PaymentCard();
            $payment_card->user_id          =  $user_id;
            $payment_card->cardholder_name  =  $cardholder_name;
            $payment_card->card_number      =  $card_number;
            $payment_card->expiry_month     =  $expiry_month;
            $payment_card->expiry_year      =  $expiry_year;
            $payment_card->defalut_card     =  $default_card;
            $payment_card->save();

            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Card added successfully";
            $res['response']    =   $data;
        }
        
        return response($res);
    }

    public function paymentCard(Request $request) {
        $rules      =   [
            "user_id" => 'required',
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id         =  $request['user_id'];
        $payment_cards=PaymentCard::where('user_id',$user_id)->where('is_delete',0)->select("*","defalut_card as default_card")->orderBy('defalut_card','DESC')->get();


       if(!empty($payment_cards)) {
            $data['errors']     =   [];
            $data['payment_cards'] =  $payment_cards;
            $res['status']      =   1;
            $res['message']     =   "Payment cards fetched successfully";
            $res['response']    =   $data;
        } else {
            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "No payment card yet added.";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function paymentCardDetail(Request $request) {
        $rules      =   [
            "user_id" => 'required',
            "payment_card_id" => 'required'
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id         =  $request['user_id'];
        $payment_card_id         =  $request['payment_card_id'];
        $payment_card=PaymentCard::where('user_id',$user_id)->where('id',$payment_card_id)->select("*","defalut_card as default_card")->first();


       if(!empty($payment_card)) {
            $data['errors']     =   [];
            $data['payment_card'] =  $payment_card;
            $res['status']      =   1;
            $res['message']     =   "Payment card fetched successfully";
            $res['response']    =   $data;
        } else {
            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "No payment found";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function deletePaymentCard(Request $request) {
        $rules      =   [
            "user_id" => 'required',
            "payment_card_id" => 'required'
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id          =  $request['user_id'];
        $payment_card_id  =  $request['payment_card_id'];
        $payment_card=PaymentCard::where('user_id',$user_id)->where('id',$payment_card_id)->where('is_delete',0)->first();

       if(!empty($payment_card)) {
            $payment_card->is_delete= 1;
            $payment_card->save();

            if($payment_card->defalut_card==1){
                $new_default_card= PaymentCard::where('user_id',$user_id)->where('is_delete',0)->first();
                if(!empty($new_default_card)) {
                    $new_default_card->defalut_card = 1;
                    $new_default_card->save();

                    $data['errors']     =   [];
                    $data['default_card_id']     = $new_default_card->id;
                    $res['status']      =   1;
                    $res['message']     =   "Card deleted successfully";
                    $res['response']    =   $data;
                }else{
                    $data['errors']     =   [];
                    $res['status']      =   1;
                    $res['message']     =   "Card deleted successfully";
                    $res['response']    =   $data;
                }
            } else {
                $data['errors']     =   [];
                $res['status']      =   1;
                $res['message']     =   "Card deleted successfully";
                $res['response']    =   $data;
            }
        } else {
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "No card found.";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function setDefaultPaymentCard(Request $request) {
        $rules      =   [
            "user_id" => 'required',
            "payment_card_id" => 'required'
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }

        $user_id         =  $request['user_id'];
        $payment_card_id         =  $request['payment_card_id'];

        $payment_card=PaymentCard::where('user_id', $user_id )->where('id',$payment_card_id)->first();

       if(!empty($payment_card)) {
            PaymentCard::where('user_id', $user_id )->where('is_delete',0)->update(['defalut_card' => 0]);

            $payment_card->defalut_card= 1;
            $payment_card->save();

            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Card set as default";
            $res['response']    =   $data;
        } else {
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "No card found.";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function chargePaypal(Request $request){
        $ch = curl_init();
        $clientId = "ARAvOF64GZrk5GW8hDDTUZMG1DA7QrDI_ZE9KL_gS8l_1v2dFSI2683LXtk4T28hznb5XGt7_Ofa3I1E";
        $secret = "EE7v3zN3InGcPYXPk-1DfakDimFGE7DW_3310a1ogpFBkJlVEFA-El4eiWXBSesYWg0Y-x4d55Q2uIKQ";

        curl_setopt($ch, CURLOPT_URL, "https://api.sandbox.paypal.com/v1/oauth2/token");
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
        $result = curl_exec($ch);
        curl_close($ch);

        if(!empty($result)) {
            $result_arr = json_decode($result,true);
            $access_token= $result_arr['access_token']; 

            $pay_id= $request['pay_id']; 
            $autorization_id= $request['autorization_id']; 
            
            $payment_data = array(
                "amount" => array(
                    "currency" => "AUD",
                    "total" => "1.00"
                ),
                "is_final_capture" => "false"
            );

            $payment_data = json_encode($payment_data);
            $payment_url="https://api.sandbox.paypal.com/v1/payments/authorization/".$autorization_id."/capture";

            $capture_ch = curl_init();
            curl_setopt($capture_ch, CURLOPT_URL, $payment_url);
            curl_setopt($capture_ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$access_token));
            curl_setopt($capture_ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($capture_ch, CURLOPT_POST, true);
            curl_setopt($capture_ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($capture_ch, CURLOPT_POSTFIELDS,$payment_data);
            $capture_result = curl_exec($capture_ch);
            curl_close($capture_ch);

            // if(!empty($capture_result)) {
            //     $payment_detail_ch = curl_init();
            //     $payment_detail_url= "https://api.sandbox.paypal.com/v1/payments/payment/".$pay_id;
            //     curl_setopt($payment_detail_ch, CURLOPT_URL, $payment_detail_url);
            //     curl_setopt($payment_detail_ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$access_token));
            //     curl_setopt($payment_detail_ch, CURLOPT_SSL_VERIFYPEER, false);
            //     curl_setopt($payment_detail_ch, CURLOPT_RETURNTRANSFER, true); 
            //     $payment_detail_result = curl_exec($payment_detail_ch);
            //     curl_close($payment_detail_ch);
                
            //     if(!empty($payment_detail_result)) {
            //         $payment_detail_result_arr=json_decode($payment_detail_result,true);
            //         $payer_id= $payment_detail_result_arr['payer']['payer_info']['payer_id'];
                    
            //         $execute_data=array(
            //             "payer_id" => $payer_id
            //         );
            //         $execute_data=json_encode($execute_data);

            //         $execute_ch = curl_init();
            //         $payment_execute_url= "https://api.sandbox.paypal.com/v1/payments/payment/".$pay_id."/execute";
            //         curl_setopt($execute_ch, CURLOPT_URL, $payment_execute_url);
            //         curl_setopt($execute_ch, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$access_token));
            //         curl_setopt($execute_ch, CURLOPT_SSL_VERIFYPEER, false);
            //         curl_setopt($execute_ch, CURLOPT_POST, true);
            //         curl_setopt($execute_ch, CURLOPT_RETURNTRANSFER, true); 
            //         curl_setopt($execute_ch, CURLOPT_POSTFIELDS,$execute_data);
            //         $execute_result = curl_exec($execute_ch);
            //         curl_close($execute_ch);

            //         $data['paypal_response']= json_decode($execute_result);
            //         $data['autorization_id']= $autorization_id;
            //         $data['pay_id']= $pay_id;
            //         $data['access_token']= $access_token;
            //         $data['payment_url']= $payment_url;
            //         $res['status']      =   1;
            //         $res['message']     =   "Got token";
            //         $res['response']    =   $data;
            //     }
            // }

            $data['paypal_response']= json_decode($capture_result);
            $data['autorization_id']= $autorization_id;
            $data['pay_id']= $pay_id;
            $data['access_token']= $access_token;
            $data['payment_url']= $payment_url;
            $res['status']      =   1;
            $res['message']     =   "Got token";
            $res['response']    =   $data;
        }else{
            $data=[];
            $res['status']      =   0;
            $res['message']     =   "Could not get token";
            $res['response']    =   $data;
        }

        return response($res);
    }

}
?>