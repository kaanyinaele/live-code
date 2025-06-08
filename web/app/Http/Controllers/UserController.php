<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\users;
use Auth;
use Hash;
use App\Emailtemplate;
use Mail, Cookie,DB;
use Validator;

class UserController extends Controller
{    
  public function UserLoginForm()
  { 
    if(Auth::check() && Auth::user()->role == '1'){
         return redirect()->route('/'); 
       }
    else{
      return view('frontend.user.login');
     }
  }

	  public function login(Request $request)
	   {
      $this->validate($request, [
            'email'   => 'required|email|max:50',
            'passwd' => 'required|min:6|max:30'
        ]);
     // echo '<pre>'; print_r($request->all()); die;
         $data=users::where('email',$request->email)->first();
         if(is_null($data))
         {
          toastr()->error('Invalid user !!!');
          return redirect()->back();
         }
         if($data->account_activate == 0 && $data->role==1){
           toastr()->error('Your account is not verified.');
          return redirect()->back();
         }

         if($data->is_delete == 1 && $data->role==1){
           toastr()->error('Your Account Has Been Deleted.');
          return redirect()->back();
         }
         if($data->status ==1 && $data->role==1){
           toastr()->error('Your Account Has Been Suspended.');
          return redirect()->back();
         }

     

        if(Auth::attempt(['email' => $request->email, 'password' => $request->passwd,'is_delete'=>0,'status'=> 0,'role' => 1,'account_activate'=>1])) { 
           $remember_me=$request->has('remember_me')? true : false;
              if($remember_me){
                // echo 'Hello'; die;
                $minutes = time() + (10 * 365 * 24 * 60 *  60);
                Cookie::queue('remembered-checkbox', $remember_me, $minutes);
                Cookie::queue('remembered-email', $request['email'], $minutes);
                Cookie::queue('remembered-password', $request['passwd'], $minutes);
              }else{
                Cookie::queue(Cookie::forget('remembered-checkbox'));
                Cookie::queue(Cookie::forget('remembered-email'));
                Cookie::queue(Cookie::forget('remembered-password'));
              } 

            return redirect()->route('/');
            }
        else{
          toastr()->error('Username and password does not match.');
          return redirect()->route('login');
            }
    }


    public function logout()
    	{
    	Auth::logout();
    	//return view('user.login');
      return redirect()->route('login');
   		}


    public function ShowRegistration()
      {
        return view('frontend.user.registration');
       }

    public function Registration(Request $request)
      {  
        if(users::where('email',$request->email)->where('is_delete',0)->get()){
         $this->validate(request(), [
          'name'             =>'required|min:3|max:50',
          'email'            =>'required|email|unique:users|max:50',
          'phone_no'        =>'required|digits_between:7,15',
          'zip_code'         =>'digits_between:3,12|nullable',
          'password'         =>'required|min:6|max:30',
          'confirm_password' =>'same:password|required',
          'address'          => 'required|min:3|max:200',
          'radio_status'     => 'required',
          'Accept'           => 'required',
          ]);
        }
        else{
          $this->validate(request(), [
          'name'             =>'required|min:3|max:50',
          'email'            =>'required|email|max:50',
          'phone_no'        =>'required|digits_between:7,15',
          'zip_code'         =>'digits_between:3,12|nullable',
          'password'         =>'required|min:6|max:30',
          'confirm_password' =>'same:password|required',
          'address'          => 'required|min:3|max:200',
          'Accept'           => 'required',
          'radio_status'     => 'required',
          ]);
        }
         $form_data = array(
            'name'        => $request->name,
            'email'       => $request->email,
            'phone_no'    => $request->phone_no,
            'zip_code'    => $request->zip_code,
            'password'    => Hash::make($request['password']),
            'address'     =>$request->address,
            'radio_status'=>$request->radio_status,
            'created_at' => date("Y-m-d H:i:s")
           
          );
         users::create($form_data);

         //$token= mt_rand(1000000, 9999999);
          $user = users::where('email',$request->email)->where('status',0)->first();
         $link = "<a href='".url('email_verification/'.base64_encode($user->id))."'> Click hear to varify email</a>";

         //dd($link);
         $user = users::where('email',$request->email)->first();
         $name =$user->name;
         $email=$user->email;
         $EmailTemplates = Emailtemplate::where('slug', 'email_verification')->first();
         $message = str_replace(array('{name}','{link}'), array($name,$link), $EmailTemplates->message); 
         $subject   = $EmailTemplates->subject;
         $to_name =  $user->name;
         $to_email = $email;
         $data   =   array();
         $data['msg']=$message;
         Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) 
         {
          $message->to($to_email, $to_name)->subject($subject);
          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'),env('MAIL_NAME'));
        });

          // $form_data1 = array(
          //   'varify_token'    => $token,
          //   'created_at' => date("Y-m-d H:i:s")
          // );
          // users::create($form_data1);
        toastr()->success('Email Sent. Check your inbox.');
        return redirect()->route('login');
       } 

        public function email_varification($id)
        {  
            //it is for active account after click link
            users::where('id', base64_decode($id))->update(['account_activate'=> 1]);
            $check = users::where('id',base64_decode($id))->first();

             if(!empty($check))
             {
               users::where('email', $check->email)->update(['varify_status'=> 1,'email_verified' =>1]);
               toastr()->success('Account is successfully varified ');
               //send email notification for successful registration
               $user = users::where('id',base64_decode($id))->first();  //dd($user->email);
               $name =$user->name;
               $email=$user->email;
               $EmailTemplates = Emailtemplate::where('slug', 'sucessfully-registration')->first();
               $message = str_replace(array('{name}'), array($name), $EmailTemplates->message); 
               $subject   = $EmailTemplates->subject;
               $to_name =  $user->name;
               $to_email = $email;
               $data   =   array();
               $data['msg']=$message;
               Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) 
               {
                $message->to($to_email, $to_name)->subject($subject);
                $message->from(env('MAIL_USERNAME'),env('MAIL_NAME'));
               }); 
                return redirect()->route('login');
                 }
              
             else{
                  toastr()->error('Wrong Url');
                  return redirect()->route('registration');
                }
                  
                
        }

    public function forgetPassword_form()
    {
      return view('frontend.user.forgot_password');
    }

    function CheckSendmail(Request $request)
    {  
      $this->validate($request, [
        'email'   => 'required|email|max:50'
      ]);

      $email=$request->email;
      // $user = users::where('email', '=', $mail);
      $user = users::where('email',$email)->where('status',0)->first();
      if (is_null($user))
      {   
          toastr()->error('email does not exists');
          return back();
      }
      else
      {  
        $token= mt_rand(1000000, 9999999);  
         $link = "<a href='".url('resetpassword/'.$token)."'> Click hear to reset password</a>";
        //dd($link);
         $name =$user->name;
         $EmailTemplates = Emailtemplate::where('slug', 'Forgot-password')->first();
         $message = str_replace(array('{name}','{link}'), array($name,$link), $EmailTemplates->message); 
         $subject   = $EmailTemplates->subject;
         $to_name =  $user->name;
         $to_email = $email;
         $data   =   array();
         $data['msg']=$message;
         Mail::send('frontend.user.email', $data, function($message) use ($to_name, $to_email,$subject) 
         {
          $message->to($to_email, $to_name)
          ->subject($subject);
          $message->from(env('MAIL_USERNAME'),env('MAIL_NAME'));
        });

         $form_data = array(
          'token'    =>   $token,
          'email'  =>   $request->email,
          'created_at' => date("Y-m-d H:i:s")
        );

        $pass=DB::table('password_reset')->where('email', $user->email)->first();
         if($pass)
          {
            DB::table('password_reset')->where('email', $user->email)->update(['token'=> $token]);

          }else{
            DB::table('password_reset')->insert($form_data);
          }

         toastr()->success('Email Sent. Check your inbox.');
        return redirect()->back();

      }
  }

    public function resetPassword_form($id)
    { 
      $check = DB::table('password_reset')->where('token',$id)->where('status',1)->first();

      if(!empty($check))
      {

          $reset_id = $check->email;
      
          $currentDate = strtotime($check->created_at); 
          // dd($currentDate);
          $futureDate = strtotime("+5 minutes",$currentDate);
         
          $futureDate = date("Y-m-d H:i:s", $futureDate);
           //dd(date("Y-m-d H:i:s"));
          if(date("Y-m-d H:i:s") <= $futureDate){
            
            return view('frontend.user.reset_password',compact('reset_id'));
          }
          else{
               toastr()->error('This link for reset password is expired, please try again!');
              return redirect()->route('login');
          }
       }
      else{
          toastr()->error('The Link has been expired, Please Try again!');
          return redirect()->route('login');
      }
           
    }
    public function Reset(Request $request,$id)
    {   
     // dd('reset fucntion called');

       $validate = Validator::make($request->all(), [
           'password'              => 'required|min:6|max:20|confirmed',
           'password_confirmation' => 'required|same:password',
        ]);

       if($validate->fails()){
        return redirect()->back();
       }

        $check = DB::table('password_reset')->where('email',$id)->where('status',1)->first();
        if($check){

          $data=users::where('email',$id)->first();
          $data->password = Hash::make($request['password']);
          $data->save();

          $check = DB::table('password_reset')->where('email',$id)->delete();

          toastr()->success('Password Changed Successfully');
         return redirect()->route('login');

        }else{
          toastr()->error('Link has been expired!');
          return redirect()->route('login');
        }
        
        //deleet token from password reset table
       // DB::table('password_reset')->where('email',$id)->delete();
        
    }

    public function changePassword_form()
    {
      return view('frontend.user.change_password');
    }
    public function changePassword(Request $request)
    { 
      $request->validate([
        'current_password'      =>'required|min:6|max:20',
        'password'              =>'required|min:6|max:20',
        'confirmation_password' =>'required|same:password',
      ]);
     
    if(Hash::check($request->current_password, Auth::user()->password))
    {    
         $data=Auth::id();
         $data=users::where('id',Auth::id())->first();
         $data->password = Hash::make($request->password);
         $data->save();
         toastr()->success('Password changed successfully');
         return back();
        }
        else
        {
        toastr()->error('Current password is wrong');
        return redirect()->route('changepassword');
        }
    }
    public function accountSetting_form()
    { 
       $data=Auth::user();
      return view('frontend.user.account_setting',compact('data'));
    }
    public function accountSetting(Request $request)
    { 
     
       $request->validate([
        'image'     =>'image|mimes:jpeg,png,jpg,svg',
        'mobile_no' =>'digits_between:7,15|nullable',
        'address'   =>'min:5|max:300|nullable',
      ]);

        $data=users::findorFail(Auth::user()->id);

         $data->phone_no =$request->mobile_no;
         $data->address  =$request->address;

       if($image=$request->file('image')){  
         $newimage=rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('/image/users'), $newimage);
        
         $data->image = $newimage;
        }
          $data->save();
         toastr()->success('Account update successfully');
        return redirect()->back();


    }

}
