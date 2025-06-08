<?php
namespace App\Http\Controllers\AppController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\ServiceManagement;
use App\Emailtemplate;
use App\ServiceBooking;
use App\Subcategory;
use App\ServiceAcknowledgement;
use App\Cmspage;
use App\Notification;
use Validator;
use Mail,Hash;

class ProviderController extends Controller {
    protected $role_id   =   2;
    public function __constructor(){ }

    public function mobile_number_exist($mobile_number,$user_id = null){
	    $query  =   users::where("phone_no",$mobile_number);
	    if($user_id){
	        $query->where("id","!=",$user_id);
	    }
	    $exist  =   $query->where("status",1)->where("is_delete",0)->first();
	    if(!empty($exist)){
	        return true;
	    }else{
	        return false;
	    }
    }
    
    public function provider_signup(Request $request){
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
        $user_data->skill_category  =   $request['category_name'];
        $user_data->name            =   $request['name'];
        $user_data->email           =   $request['email'];
        $user_data->city            =   $request['city'];
        $user_data->zip_code        =   $request['postal_code'];
        $user_data->document        =   $request['document'];
        $user_data->password        =   Hash::make($request['password']);
        $user_data->email_otp       =   $otp;
        $user_data->email_otp_status=   1;
        $user_data->role            =   $this->role_id;
        $user_data->terms           =   1;
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

    public function provider_signup_verification(Request $request){
    	$rules  =   [
            "provider_id"   =>  "required",
            "otp"       	=>  "required|numeric|digits:4",
        ];
        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
            return response($res);
        }
        $provider_id                =   $request['provider_id'];
        $provider_data              =   users::find($provider_id);

        if(!empty($provider_data)){
    	    if( ($provider_data->email_otp == $request['otp']) && ($provider_data->email_otp_status == 1) ){
    	        $provider_data->email_otp        =   null;
    	        $provider_data->email_otp_status =   0;
                $provider_data->email_verified   =   1;
                $provider_data->varify_status    =   1;
                $provider_data->account_activate =   1;
    	        $provider_data->save();
    	 
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

    public function provider_resend_otp(Request $request){
    	$provider_id        =   $request['provider_id'];
        $provider_data      	=   users::find($provider_id);
        if(!empty($provider_data)){
            $otp        =   getOtp();

            $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
            $message        = str_replace(array('{name}','{link}'), array($provider_data->name,$otp), $EmailTemplates->message); 
            $subject        = $EmailTemplates->subject;
            $to_name        = $provider_data->name;
            $to_email       = $provider_data->email;
            $data           = array();
            $data['msg']    = $message;
            Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) {
              $message->to($to_email, $to_name)->subject($subject);
              $message->from(env('MAIL_USERNAME'));
            });

            $provider_data->email_otp        =   $otp;
            $provider_data->email_otp_status =   1;
            $provider_data->save();
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

    public function provider_login(Request $request) {
        $rules      =   [
                "email"     =>  "required|email",
                "password"  =>  "required",
                // "notification_token" => "required",
        ];
        $validator  =   Validator::make($request->all(),$rules);
	    if($validator->fails()){
	        $data['errors']     =   $validator->messages();
	        $res['status']      =   0;
	        $res['message']     =   "Invalid Data";
	        $res['response']    =   $data;
	        return response($res);
	    }

    	$email     =   $request['email'];
        $password  =   $request['password'];
        $notification_token = $request['notification_token'];

        $user_data = users::where("email",$email)->where("role",$this->role_id)->where('status',0)->where('is_delete',0)->first();

        if(!empty($user_data)) {
            if(Hash::check($password,$user_data->password)) {
                if($user_data->email_verified == 0){
    		         
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
                    $data['user_data']  =    $user_data;
                    $res['status']      =   2;
                    $res['message']     =   "Please Verify Email to login";
                    $res['response']    =   $data;
                    return response($res); 

                } else if($user_data->email_verified == 1){
                    // Start-> Code by Kumar Divya for approval of providers
                    if($user_data->is_approved==1){
                        $user_data->notification_token=$notification_token;
                        $user_data->save();

                        $data['errors']     =   [];
                        $data['user_data']  =   $user_data;
                        $res['status']      =   1;
                        $res['message']     =   "Login Successfully";
                        $res['response']    =   $data;
                        return response($res);
                    }else if($user_data->is_approved==2) {
                        $data['errors']     =   [];
                        $res['status']      =   0;
                        $res['message']     =   "Admin has rejected your account";
                        $res['response']    =   $data;
                        return response($res);
                    }else{
                        $data['errors']     =   [];
                        $res['status']      =   0;
                        $res['message']     =   "Admin has not approved your account";
                        $res['response']    =   $data;
                        return response($res);
                    }
                    // End-> Code by Kumar Divya for approval of providers
                } else {
                    $data['errors']     =   [];
                    $res['status']      =   0;
                    $res['message']     =   "You are not a verified user";
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
        }else{
            $data['errors']     =   ["email" => ["Email not registered"]];
            $res['status']      =   0;
            $res['message']     =   "Email not registered";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function provider_data(Request $request){
    	$provider_id = ($request['provider_id'] ) ? $request['provider_id'] : null;
        if(!empty($provider_id)){
             $provider_data  = users::where("id",$provider_id)->where("status",0)->where("is_delete",0)->
                first();

             $notification_count = Notification::where("user_id",$provider_id)->where("is_delete",0)->where("is_read",0)->count();
             
             $provider_booking_data  = ServiceBooking::where("assign_provider",$provider_id)->whereNotIn('status', [3,5])
                ->join('service_acknowledgements','service_acknowledgements.service_booking_id','=','service_booking.id')
                ->select('service_booking.*','service_acknowledgements.start_at_provider', 'service_acknowledgements.end_at_provider', 'service_acknowledgements.ack_start', 'ack_end', 'service_acknowledgements.service_status')
                ->orderBy('service_booking.created_at', 'desc') 
                ->get();

             foreach($provider_booking_data as $key=>$value){
                $provider_booking_data[$key]["start_date"] = explode("-",$value->date);
                $provider_booking_data[$key]["start_time"] = explode("-",$value->time);
                $provider_booking_data[$key]["user_details"] = users::where("id",$value->user_id)->first();
             }
             //print_r($provider_booking_data);
             //die;

             if(!empty($provider_data)){
                $data['errors']                         =   [];
                $data['provider_data']                  =   $provider_data; 
                $data['provider_booking_data']          =   $provider_booking_data;
                $data['notification_count']             =   $notification_count;
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
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function providerNotifications(Request $request){
        $provider_id = ($request['provider_id'] ) ? $request['provider_id'] : null;
        if(!empty($provider_id)){
             $notification_data  = Notification::where("user_id",$provider_id)->where('is_delete',0)->
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

    public function providerNotificationsMarkRead(Request $request){
        $provider_id = ($request['provider_id'] ) ? $request['provider_id'] : null;
        if(!empty($provider_id)){
            Notification::where("user_id",$provider_id)->where('is_delete',0)->update(['is_read'=>1]);

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

    public function finishedServiceData(Request $request){
        $provider_id = ($request['provider_id'] ) ? $request['provider_id'] : null;
        if(!empty($provider_id)){
             $provider_booking_data  = ServiceBooking::where("assign_provider",$provider_id)->where('service_booking.status',5)
                ->join('service_acknowledgements','service_acknowledgements.service_booking_id','=','service_booking.id')
                ->select('service_booking.*','service_acknowledgements.start_at_provider', 'service_acknowledgements.end_at_provider', 'service_acknowledgements.ack_start', 'ack_end', 'service_acknowledgements.service_status')
                ->orderBy('service_booking.created_at', 'desc') 
                ->get();

             foreach($provider_booking_data as $key=>$value){
                $provider_booking_data[$key]["start_date"] = explode("-",$value->date);
                $provider_booking_data[$key]["start_time"] = explode("-",$value->time);
                $provider_booking_data[$key]["user_details"] = users::where("id",$value->user_id)->first();
             }

            $data['errors']                         =   [];
            $data['provider_booking_data']          =   $provider_booking_data; 
            $res['status']                          =   1;
            $res['message']                         =   "Success";
            $res['response']                        =   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User 1";
            $res['response']    =   $data;
            return response($res);
        }
    }

    public function provider_forgot_password(Request $request){
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
        $provider_data      =   users::where("email",$email)->where("role",$this->role_id)->first();
        if(!empty($provider_data)){
            $otp                =   getOtp();
            $update_data        =   [
                "email_otp"         =>  $otp,
                "email_otp_status"  =>  1,
            ];
            users::where("id",$provider_data->id)->update($update_data);

            $EmailTemplates    = Emailtemplate::where('slug', 'Forgot-password')->first();
            $message           = str_replace(array('{name}','{link}'), array($provider_data->name,$otp), $EmailTemplates->message); 
            $subject           = $EmailTemplates->subject;
            $to_name           = $provider_data->name;
            $to_email          = $provider_data->email;
            $data              = array();
            $data['msg']       = $message;
            Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject){
              $message->to($to_email, $to_name)->subject($subject);
              $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
            });

            $data['errors']     	=   [];
            $data['provider_id']    =   $provider_data->id;
            $res['status']      	=   1;
            $res['message']     	=   "Please use OTP sent to your email";
            $res['response']    	=   $data;
            return response($res);
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Invalid User";
            $res['response']    =   $data;
            return response($res);
        }  
    }

    public function provider_check_forgot_password(Request $request){
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
        $provider_data      =   users::where("email",$email)->where("role",$this->role_id)->first();
        if(!empty($provider_data)){
            if($provider_data->email_otp != $otp){
                $data['errors']     =   ["otp" => ["Invalid OTP"]];
                $res['status']      =   0;
                $res['message']     =   "Invalid OTP";
                $res['response']    =   $data;
                return response($res);
            }else if($provider_data->email_otp_status != 1){
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
                Users::where("id",$provider_data->id)->update($update_data);
                $data['errors']     =   [];
                $data['provider_id']    =   $provider_data->id;
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

    public function provider_reset_password(Request $request){
    	$provider_id    =   $request['provider_id'];
        $messages   =   [
            'new_password.same' => "New Password and Confirm password didn't match.",
            'new_password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
        ];
        $rules  =   [
            'provider_id'       =>  'required',
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
        $provider_data                  =   users::find($provider_id);
        if(!empty($provider_data)){
            $provider_data->email_otp       =   null;
            $provider_data->email_otp_status=   0;
            $provider_data->password        =   Hash::make($request['new_password']);
            $provider_data->save();
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


    public function providerChangePassword(Request $request){
        $provider_id    =   $request['provider_id'];
        $old_password   =   $request['old_password'];
        $new_password   =   $request['new_password'];
        $confirm_password   =   $request['confirm_password'];

        $messages   =   [];
        $rules  =   [
            'provider_id'       =>  'required',
            'old_password'      =>  'required',
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

        $provider_data                  =   users::find($provider_id);
        if(!empty($provider_data)){
            if(Hash::check($old_password,$provider_data->password)) {
                $provider_data->password=Hash::make($new_password);
                $provider_data->save();
                
                $data['errors']     =   [];
                $res['status']      =   1;
                $res['message']     =   "Password changed successfully";
                $res['response']    =   $data;
                return response($res);                
            }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Old password does not match";
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

    public function provider_get_all_caterory(Request $request){
		$provider_cat_data             =  ServiceManagement::where("active_status",0)->where("is_delete",0)->get();
		//$support_data = Faq::where("status",1)->where("is_delete","0")->orderBy("id","desc")->get();
	 	if(!empty($provider_cat_data)){
	    	$data['errors']                 =   [];
	    	$data['provider_cat_data']          =   $provider_cat_data; 
	    	$res['status']                  =   1;
	    	$res['message']                 =   "Success";
	    	$res['response']                =   $data;
	    	return response($res);
	 	}else{
	    	$data['errors']     =   [];
	    	$res['status']      =   0;
	    	$res['message']     =   "Invalid Data";
	    	$res['response']    =   $data;
	    	return response($res);
	 }
    }
    
    public function provider_userImageUpload(Request $request){
        $name               =   '';
        if ($request->hasFile('personal_image')) {
            $image          =   $request->file('personal_image');
            $name           =   time().rand(1,9999).'.'.$image->getClientOriginalExtension();
            $destinationPath=   public_path('/image/provider_profile');
            $image->move($destinationPath, $name);
        }

        if ($request->hasFile('all_provider_docs')) {
            $image          =   $request->file('all_provider_docs');
            $image_ext      =   ($request['fileExt']) ? ($request['fileExt']) : $image->getClientOriginalExtension();
            //$name           =   time().'.'.$image_ext;
            $name           =    md5($image->getClientOriginalName().time().rand(1,9999)).'.'.$image_ext;
            $destinationPath =  public_path('/image/provider_document');
            $image->move($destinationPath, $name);
        }
        return $name;
    }

    public function provider_profile_update(Request $request){
        $provider_id                        =   $request['provider_id'];
        if(!empty($provider_id)){
            $provider_data                  =   users::find($provider_id);
            $provider_data->skill_category  =   $request['skill_category'];
            $provider_data->name            =   $request['name'];
            $provider_data->phone_no        =   $request['phone_no'];
            $provider_data->city            =   $request['city'];
            $provider_data->zip_code        =   $request['zip_code'];
            if($request['personal_image']){
                $provider_data->image           =   $request['personal_image'];
            }
            $provider_data->save();
            $data['errors']     =   [];
            $data['provider_data']    =   $provider_data;
            $res['status']      =   1;
            $res['message']     =   "Provider Profile updated successfully";
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

    public function provider_booking_details(Request $request){
        $booking_id = ($request['booking_id'] ) ? $request['booking_id'] : null;
        if(!empty($booking_id)){
            $provider_booking_data  = ServiceBooking::where("service_booking.id",$booking_id)
                ->join('service_managemenets','service_managemenets.id','=','service_booking.service_id')
                ->join('service_acknowledgements','service_acknowledgements.service_booking_id','=','service_booking.id')
                ->select('service_booking.*','service_managemenets.category_name','service_acknowledgements.start_at_provider', 'service_acknowledgements.end_at_provider', 'service_acknowledgements.ack_start', 'ack_end', 'service_acknowledgements.service_status')
                ->where('service_managemenets.is_delete',0)
                ->first();
                
            if(!empty($provider_booking_data)){
                $provider_booking_data->start_date=explode("-",$provider_booking_data->date)[0];
                $provider_booking_data->start_time=explode("-",$provider_booking_data->time)[0];
                $provider_booking_data->end_date=explode("-",$provider_booking_data->date)[1];
                $provider_booking_data->end_time=explode("-",$provider_booking_data->time)[1];
                $provider_booking_data->user_details = users::where("id",$provider_booking_data->user_id)->first();
                
                $data['errors']                         =   [];
                $data['provider_booking_data']          =   $provider_booking_data; 
                $res['status']                          =   1;
                $res['message']                         =   "Success";
                $res['response']                        =   $data;
                return response($res);
             }else{
                $data['errors']     =   [];
                $res['status']      =   0;
                $res['message']     =   "Details not available";
                $res['response']    =   $data;
                return response($res);
             }
        }else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Details not available";
            $res['response']    =   $data;
            return response($res);  
        }

    }


    public function providerLogout(Request $request){
        $rules      =   [
                "provider_id"     =>  "required",
        ];

        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){
            $data['errors']     =   $validator->messages();
            $res['status']      =   0;
            $res['message']     =   "Invalid Data";
            $res['response']    =   $data;
        }else{
            $provider_id    =   $request['provider_id'];
            $user_data=users::where('id',$provider_id)->first();
            $user_data->notification_token=null;
            $user_data->save();

            $data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Logout successfully";
            $res['response']    =   $data;
        }
        return response($res);
    }

    public function termsAndConditions(Request $request){
    	$terms_and_condition_data=Cmspage::where('slug','provider_terms_and_conditions')->first();
    	if(!empty($terms_and_condition_data)) {
    		$data['errors']     =   [];
            $res['status']      =   1;
            $res['message']     =   "Terms and condition for provider fetched successfully.";
            $res['response']    =   $terms_and_condition_data;
    	}else{
            $data['errors']     =   [];
            $res['status']      =   0;
            $res['message']     =   "Could not fetch terms and conditions.";
            $res['response']    =   $data;
    	}
    	return response($res);
    }


    public function startEndService(Request $request){
        $rules      =   [
            "provider_id"     =>  "required",
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
            $provider_id=$request['provider_id'];
            $service_booking_id=$request['service_booking_id'];
            $status=$request['status'];

            $service_booking_data=ServiceBooking::where('assign_provider',$provider_id)->where('id',$service_booking_id)->where('status','!=',3)->first();

            $customer_data=users::where('id',$service_booking_data->user_id)->first();
            $provider_data=users::where('id',$provider_id)->first();
            $service_management=ServiceManagement::where('id',$service_booking_data->service_id)->where('is_delete',0)->first();

            if(!empty($service_booking_data) && !empty($customer_data) && !empty($provider_data) && !empty($service_management)) {

                if($status==1){
                    // Sent mails to customer
                    $EmailTemplates    = Emailtemplate::where('slug', 'service_start_confirmation')->first();
                    $message           = str_replace(array('{name}','{provider_name}','{service_name}','{link}'), array($customer_data->name,$provider_data->name,$service_management->category_name,
                        "<a href='".url('/')."/upcoming-request/detail/".base64_encode($service_booking_data->id)."'>Confirm service started</a>"  ), $EmailTemplates->message); 

                    $subject           = $EmailTemplates->subject;
                    $to_name           = $customer_data->name;
                    $to_email          = $customer_data->email;
                    $data              = array();
                    $data['msg']       = $message;
                    Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject){
                      $message->to($to_email, $to_name)->subject($subject);
                      $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                    });
                    
                    // Sent notification to customer. 3=> for service start confirmed by customer
                    if($customer_data->notification_token) {
                        sendNotificationToCustomer(
                            $customer_data,
                            'Confirm service start' ,
                            $provider_data->name.' has sent you service start request for '.$service_management->category_name,
                            ['service_booking_id'=>$service_booking_id], 
                            3
                        );  
                    }

                    $service_acknowledgement= ServiceAcknowledgement::where('service_booking_id',$service_booking_id)->first();
                    $service_acknowledgement->service_status=1;
                    $service_acknowledgement->start_at_provider=date("Y-m-d H:i:s");
                    $service_acknowledgement->save();


                    $data['errors']     =  [];
                    $res['status']      =   1;
                    $res['message']     =   "Service start request sent successfully";
                    $res['response']    =   $data;
                }else if($status==3){  
                    $EmailTemplates    = Emailtemplate::where('slug', 'service_end_confirmation')->first();
                    $message           = str_replace(array('{name}','{provider_name}','{service_name}','{link}'), array($customer_data->name,$provider_data->name,$service_management->category_name,
                        "<a href='".url('/')."/upcoming-request/detail/".base64_encode($service_booking_data->id)."'>Confirm service finished</a>"  ), $EmailTemplates->message); 

                    $subject           = $EmailTemplates->subject;
                    $to_name           = $customer_data->name;
                    $to_email          = $customer_data->email;
                    $data              = array();
                    $data['msg']       = $message;

                    Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject){
                      $message->to($to_email, $to_name)->subject($subject);
                      $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
                    });

                    // Sent notification to customer. 4=> for service end confirmed by customer
                    if($customer_data->notification_token) {
                        sendNotificationToCustomer(
                            $customer_data,
                            'Confirm service start' ,
                            $provider_data->name.' has sent you service end request for '.$service_management->category_name,
                            ['service_booking_id'=>$service_booking_id], 
                            4
                        );  
                    }

                    $service_acknowledgement= ServiceAcknowledgement::where('service_booking_id',$service_booking_id)->first();
                    $service_acknowledgement->service_status=3;
                    $service_acknowledgement->end_at_provider=date("Y-m-d H:i:s");
                    $service_acknowledgement->save();

                    $data['errors']     =  [];
                    $res['status']      =   1;
                    $res['message']     =   "Service end request sent successfully";
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


    public function testNotification(Request $request){
        $id=$request['id'];
        $user_data=users::where('id',$id)->first();

        sendNotification($user_data->notification_token,"Notification Title","Hello Testing",["name"=>"Kumar Divya"]);
        $res['status']=1;
        $res['message']="Notification sent successfully";
        return response($res);
    }

}
?>