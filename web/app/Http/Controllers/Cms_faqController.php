<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Faq;
use App\Cmspage;
use App\Globalsetting;
use App\Contactus;
use App\Blog;
class Cms_faqController extends Controller
{
   public function aboutus()
   { 
   	$about=Cmspage::where('slug','About-us')->first();
   	return view('frontend.cms.aboutus',compact('about'));
   } 
   public function contactus()
   {
   	$contact=Cmspage::where('slug','Contact-us')->first();
   	$global=Globalsetting::first(); 
   	return view('frontend.cms.contactus',compact('contact','global'));
   } 
   public function faq()
   {
   	$faq=Faq::where('status',0)->where('is_delete',0)->get();
   	return view('frontend.cms.faq',compact('faq'));
   } 
   //submit query
   public function contact(Request $request)
   {
   	  $request->validate([
        'name' => 'required|min:3|max:50',
        'email' =>'required|email|min:5|max:50',
        'message' =>'required|min:3|max:5000',
      ]);

      $data=array(
		'name'=>$request->name,
        'email' =>$request->email,
		'message'=>$request->message,
    	);
    	Contactus::create($data);
        toastr()->success('message send sucessfully ');
    	return redirect()->back();
   } 
    public function privacy_policy()
   {
    $data=Cmspage::where('slug','Privacy-policy')->first();
   	return view('frontend.cms.privacy-policy',compact('data'));
   } 
   public function term_condition()
   {
   	$data=Cmspage::where('slug','Term-Condition')->first();
   	return view('frontend.cms.term-condition',compact('data'));
   } 
   public function download_app()
   {
    //$data=Cmspage::where('slug','Term-Condition')->first();
    return view('frontend.cms.app_download');
   } 
   public function professionals()
   {
    $data=Cmspage::where('slug','Ogaworkman-Professionals')->first();
    return view('frontend.cms.Professionals',compact('data'));
   } 
   public function why_choose()
   {
    $data=Cmspage::where('slug','Why_Choose')->first();
    return view('frontend.cms.why_ogaworkman',compact('data'));
   }
   public function howitwork()
   {
    $data=Cmspage::where('slug','howitwork')->first();
    return view('frontend.cms.howitwork',compact('data'));
   }
   //blog 
   public function blog_list()
   {
    $datas=Blog::orderBy('id','desc')->where('is_delete',0)->where('status',0)->get(); 
    return view('frontend.cms.blog_list',compact('datas'));
   }
   public function blog_detail($id)
   {
    $data=Blog::where('id',base64_decode($id))->first();
    return view('frontend.cms.blog_detail',compact('data'));
   }

}
