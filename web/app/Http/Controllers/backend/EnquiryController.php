<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contactus;
use App\Emailtemplate;
use Mail;
class EnquiryController extends Controller
{
    public function index()
    {	
    	$enquiry=Contactus::sortable('id','desc')->paginate(10);
    	 $i = (request()->input('page', 1) - 1) *  10;
    	return view('admin.enquiry.index',compact('enquiry','i'));
    }
    public function enquiry_reply($id)
    {	
    	$data=Contactus::findorFail(base64_decode($id));
    	return view('admin.enquiry.reply',compact('data'));
    }
    public function Search(Request $request)
	{   $dynamic_pagination=10;
		$enquiry=Contactus::where('name','LIKE','%'.$request->search.'%')->paginate( $dynamic_pagination);
		$val=$request->search;
		$i = (request()->input('page', 1) - 1) *  $dynamic_pagination;
        return view('admin.enquiry.index',compact('enquiry','i','val'));
    }
    public function enquiry_reply_store(Request $request,$id)
    {
    	$request->validate([
    		'reply' =>'required',
    	]);
    	$data= contactus::findOrFail(base64_decode($id));	
    	$data->reply =$request->reply;
    	$data->reply_status =1;
        $data->save();
         $link = $request->reply ;

         $user = contactus::where('id',base64_decode($id))->first();
         $name =$user->name;
         $email=$user->email;
         $EmailTemplates = Emailtemplate::where('slug', 'Enquiry-reply')->first();
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
          $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'));
        });
    	toastr()->success("Message successfully send");
    	return redirect()->route('enquiry');
    }
    public function enquiry_view($id)
    {	
    	$data=Contactus::findorFail(base64_decode($id));
    	 return view('admin.enquiry.view',compact('data'));
    }

}
