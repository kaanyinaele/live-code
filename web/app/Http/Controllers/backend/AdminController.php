<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\ServiceBooking;
use App\Globalsetting;
use Auth;
use Mail;
use Validator, DateTimeZone;
use App\Emailtemplate;
use Hash,input,DB;
use DataTables;

class AdminController extends Controller
{   
  public function LoginForm()
  {  
    if(Auth::check() && Auth::user()->role == '0')
    return redirect()->route('dashboard'); 
    else
    $data=Globalsetting::where('id',1)->first();
    //dd($data);
    return view('admin.adminlogin',compact('data'));
   }

  public function adminLogin(Request $request)
  {    
  	$this->validate($request, [
          'login'    => 'required|min:3|max:50', 
          'password' => 'required'
    ]);
     $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' : 'name';  
    $request->merge([
        $login_type => $request->input('login'),
        'role' => 1
    ]);   
    if(Auth::attempt($request->only($login_type,'password'))){
      return redirect()->route('dashboard');
    
    }else{
       toastr()->error('Username and password does not match.');
      return redirect()->route('admin.login');
    }
	}
 
 	public function adminlogout()
	{ 
		Auth::logout();
	  return redirect()->route('admin.login');
	}

  public function dashboard()
	{
      //try
      $users = users::select(\DB::raw("COUNT(*) as count"))
      ->where('role',1)
      ->whereYear('created_at', date('Y'))
      ->groupBy(\DB::raw("Month(created_at)"))
      ->pluck('count');

      $provider = users::select(\DB::raw("COUNT(*) as count"))
      ->where('role',2)
      ->whereYear('created_at', date('Y'))
      ->groupBy(\DB::raw("Month(created_at)"))
      ->pluck('count');
      //try
        /** Users Chart Work Start **/
        // $all_user_chart_data    =   [];
        // $user_chart_data        =   [];

        // $current_year           =   date("Y");
        // for($i=1; $i<=12; $i++) {
        //     $month              =   ($i<10)? "0".$i : $i;
        //     $users_count        =   users::where("status",0)->where("is_delete",0)->where("role",1)->whereYear('created_at', $current_year)->whereMonth('created_at', $month)->count();
        //     $provider_count     =   users::where("status",0)->where("is_delete",0)->where("role",2)->whereYear('created_at', $current_year)->whereMonth('created_at', $month)->count();
           
        //     array_push($all_user_chart_data, (object)[ "y" => $current_year.'-'.$month, "users" => $users_count,"provider" => $provider_count ]);
        // }
        // $all_user_chart_data    =   json_encode($all_user_chart_data);
          
      $countuser=users::where('is_delete',0)->where('role',1)->count();
      $total_booking=ServiceBooking::where('status',5)->count();
      $approved_provider=users::where('is_delete',0)->where('role',2)->where('is_approved',1)->count();
      $awaiting_provider=users::where('is_delete',0)->where('role',2)->where('is_approved',0)->count();
      return view('admin.dashboard',compact('countuser','total_booking','approved_provider','awaiting_provider','users','provider'));
	}

  public function ForgetPassword()
  {
    $data=Globalsetting::where('id',1)->first();
    return view('admin.forgetpassword',compact('data'));
  }

  function CheckSendmail(Request $request)
  {  
    $this->validate($request, [
    'email'   => 'required|email|max:50'
    ]);
    $email=$request->email;
    // $user = users::where('email', '=', $mail);
    $user = users::where('email',$email)->first();
    if (is_null($user))
    {   
      toastr()->error('email does not exists');
      return back();
    }
    else
    {  
      $token= mt_rand(1000000, 9999999);  
       $link = "<a href='".url('admin/resetpassword/'.$token)."'> Click hear to reset password</a>";
      //dd($link);
       $name =$user->name;
       $EmailTemplates = Emailtemplate::where('slug', 'Forgot-password')->first();
       $message = str_replace(array('{name}','{link}'), array($name,$link), $EmailTemplates->message); 
       $subject   = $EmailTemplates->subject;
       $to_name =  $user->name;
       $to_email = $email;
       $data   =   array();
       $data['msg']=$message;
       Mail::send('admin.emailtemplate.email', $data, function($message) use ($to_name, $to_email,$subject) 
       {
        $message->to($to_email, $to_name)
        ->subject($subject);
        $message->from(env('MAIL_USERNAME'));
      });
       $form_data = array(
        'token'    =>   $token,
        'email'  =>   $request->email,
        'status' => 1,
        'created_at' => date("Y-m-d H:i:s")
      );
      $pass=DB::table('password_reset')->where('email', $user->email)->insert($form_data);
       toastr()->success('Email Sent. Check your inbox.');
      return redirect()->back();
    }
  }

  public function ResetPassword($id)
  {   
   $data=Globalsetting::where('id',1)->first();
    //for reset password
   $check = DB::table('password_reset')->where('token',$id)->where('status',1)->first();

   if(!empty($check))
    {
      $reset_id = $check->email;
      $currentDate = strtotime($check->created_at); 
      $futureDate = strtotime("+5 minutes",$currentDate);
      $futureDate = date("Y-m-d H:i:s", $futureDate);
      if(date("Y-m-d H:i:s") <= $futureDate){
        return view('admin.resetpassword',compact('reset_id','data'));
      }
      else{
           toastr()->error('This link for reset password is expired, please try again!');
          return redirect()->route('admin.login');
      }
    }
    else{
          toastr()->error('Wrong Url');
          return redirect()->route('admin.login');
    }
  }
  public function Reset(Request $request,$id)
  {   
   $validate = Validator::make($request->all(), [
       'password'              => 'required|min:6|confirmed|max:50',
       'password_confirmation' => 'required|same:password',
    ]);
   if($validate->fails()){
    return redirect()->back();
   }
    $check = DB::table('password_reset')->where('email',$id)->where('status',1)->first();
    if($check){
      $data=users::where('email',$id)->where('role',0)->first();
      $data->password = Hash::make($request['password']);
      $data->save();
      //deleet token from password reset table
      DB::table('password_reset')->where('email',$id)->delete();
      toastr()->success('Password Successfully Change');
      return redirect()->route('admin.login');
    }else{
      toastr()->error('Link has been expired!');
      return redirect()->route('admin.login');
    }
     
  }
        //admin profile
  public function EditProfileForm()
  { 
    $data=users::where('id',Auth::user()->id)->first();
    return view('admin.EditProfileForm',compact('data'));
  }
     //admin profile   
  public function UpdatepProfile(Request $request)
  {
   $request->validate([
    'address'  =>  'min:3|max:250',
    'phone_no' => 'required|digits_between:7,15',
    'name'     =>'required|min:3|max:50',
    'image'    => 'image|mimes:jpeg,png,jpg,svg',
  ]);

  $data1=Auth::user()->id;
  $data=users::findorFail($data1);

  if(!empty($image=$request->file('image')))
  {
   $newimage=rand() . '.' . $image->getClientOriginalExtension();
   $image->move(public_path('/image/users'), $newimage);
  
   $data->name = $request->name;
   $data->phone_no =$request->phone_no;
   $data->address =$request->address;
   $data->gender =$request->gender;
   $data->image = $newimage;
   $data->save();
   toastr()->success('Profile update Successfully');
  return redirect()-> route('edit/profile');
  }
  else
  {
    $data->name = $request->name;
     $data->phone_no =$request->phone_no;
     $data->address =$request->address;
     $data->gender =$request->gender;
    //  $data->image = $newimage;
     $data->save();
    toastr()->success('Profile update Successfully');
    return redirect()-> route('edit/profile');
  }
}
        
public function UserList(Request $request)
{   
  $dynamic_pagination=10;
  $i = (request()->input('page', 1) - 1) * $dynamic_pagination;
  $users=users::where('is_delete', 0)->where('role', 1)->sortable('id', 'desc')->paginate(10);
  return view('admin.user.UserList',compact('users','i'));
}
 public function view_appointment($id)
 {
  $i = (request()->input('page', 1) - 1) * 10;
  $datas=ServiceBooking::where('user_id',base64_decode($id))->sortable('created_at', 'desc')->paginate(10);
  return view('admin.user.view_appointment',compact('datas','i'));
   }

public function UserStatus(Request $request,$id,$status)
{  
  if($status == 0 )
  {
  $data=users::findorFail($id);
  $data->status = 1;
  $data->save();
  toastr()->success('User De-activate Successfully');
  return redirect()->back();
  }
  else
  {
  $data=users::findorFail($id);
  $data->status = 0;
   $data->save();
  toastr()->success('User Activate Successfully');
  return redirect()->back();
  } 
} 

 public function SearchUser(Request $request)
 {   
    $to=$request->to;
    $from=$request->from;
    $val=$request->search;

    if(!empty($from && $to)){ 
     $this->validate($request,[
      'to' => 'date|after_or_equal:from',
     'from' => 'date',
    ]); }

    $users=users::where('role', 1)->where('is_delete', 0);  

    if(!empty($request->search))
    {
      /*$provider = $provider->where('name','LIKE','%'.$val.'%')
                    ->orWhere('email','LIKE','%'.$val.'%')
                    ->orWhere('city','LIKE','%'.$val.'%')
                    ->orWhere('skill_category','LIKE','%'.$val.'%')
                    ->orWhere('phone_no','LIKE','%'.$val.'%')
                    ->orWhere('created_at','LIKE','%'.$val.'%');
      */
      $columns = array('name', 'email', 'zip_code', 'created_at', 'phone_no');
      $users->where(function($q) use($columns, $val){
        foreach($columns as $search) {
           $q->orWhere($search, 'like', '%' . $val . '%');
        }
      });
    }
    if($from && $to){
      $users = $users->whereBetween('created_at', [$from, $to]);
    }elseif($from){
      $users = $users->where('created_at',$from);
    }elseif($to){
      $users = $users->where('created_at',$from);
    }
    $users= $users->paginate(10);
    $i = (request()->input('page', 1) - 1) * 10;
    return view('admin.user.UserList',compact('users','to','from','val','i'));
}
     
     
public function user_filter(Request $request)
{   
  $request->validate([
    'to'  =>  'required|date',
    'from'    =>  'required|date'
  ]);
  $dynamic_pagination=10;
  $to=$request->to;
  $from=$request->from;
  $users=users::whereBetween('created_at', [$from, $to])->where('role', 1)->where('is_delete', 0)->paginate($dynamic_pagination);
  return view('admin.user.UserList',compact('users','to','from'));
}

public function DeleteUser($id,$page)
{
  $users=users::where('id',$id)->update(['is_delete'=>1]);
  toastr()->success('User delete Successfully');
  //return redirect()->route('users');
  return redirect('admin/user?page='.$page);
}

public function ChangePassword(Request $request)
{  
  $request->validate([
  'old_password' => 'required|min:6|max:50',
  'new_password'    => 'required|min:6|max:50',
  'confirm_password' => 'required|same:new_password',
  ]);
  $data1=Auth::user()->id;
  if(Hash::check($request->old_password, Auth::user()->password))
  { 
   $data=users::where('id',$data1)->first();
   $data->password = Hash::make($request->new_password);
   $data->save();
   toastr()->success('Password Successfully change');
   return redirect()->route('edit/profile');
  }
  else
  {
  toastr()->error('Current password is wrong');
  return redirect()->route('edit/profile');
  }
     
}
    
public function AddUserForm()
{   
  return view('admin.user.AddUser');
}

public function addregistration(Request $request)
{  
 
  $this->validate(request(), [
  'name'             =>'required|min:3|max:250',
  'email'            =>'required|email|unique:users|min:3|max:50',
  'password'         =>'required|string|min:6|max:50',
  'confirm_password' =>'required|same:password',
  'phone_no'         =>'required|digits_between:7,15',
  'image'            =>'image|mimes:jpeg,png,jpg,svg',
  'zip_code'         =>'digits_between:3,12|nullable',
  // 'address'          =>'min:5|max:250'
  ]);
  $form_data = array(
  'name'    =>   $request['name'],
  'email'  =>   $request['email'],
  'password'     =>Hash::make($request['password']),
  'phone_no'     => $request['phone_no'],
  // 'address'      => $request['address'],
  'zip_code'      =>$request['zip_code'],
  'account_activate'	=>'1',
  );

  if(!empty($image=$request->file('image'))){
  $newimage=rand() . '.' . $image->getClientOriginalExtension();
  $image->move(public_path('/image/users'), $newimage);
  $form_data['image']=$newimage;
  }
  users::create($form_data);
  toastr()->success('User Add successfully');
  return redirect()->route('users');
}
public function UpdateUserForm($id,$page_no)
{  
  //dd($page_no);
  $data=users::findorFail(base64_decode($id));
  return view('admin.user.UpdateUserForm',compact('data','page_no'));
}
         //user profile  update 
public function UpdateUser(Request $request,$id)
{  
   
  $request->validate([
    'phone_no' => 'required|digits_between:7,15',
    // 'address'  =>  'min:5|max:300',
    'zip_code'         =>'digits_between:3,12|nullable',
    'name'     =>'required|min:3|max:250',
    'image'    => 'image|mimes:jpeg,png,jpg,gif,svg', 
  ]);
 $data=users::findorFail($id);
 $data->name = $request->name;
 $data->phone_no =$request->phone_no;
 // $data->address =$request->address;
 $data->zip_code =$request->zip_code;

 if(!empty($image=$request->file('image')))
 {
 $newimage=rand() . '.' . $image->getClientOriginalExtension();
 $image->move(public_path('/image/users'), $newimage);
 $data->image = $newimage;
 }
 $data->save();
 toastr()->success('User update successfully');
 // hear we get hidden feild value from edit form(current page no)
 return redirect('admin/user?page='.$request->input('hidden'));
}
     
public function ViewUserForm($id)
{   
  $data=users::findorFail(base64_decode($id));
  return view('admin.user.viewuser',compact('data'));
}

}
