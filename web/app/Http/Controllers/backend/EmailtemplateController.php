<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Emailtemplate;

class EmailtemplateController extends Controller
{   
	public function IndexEmailTemplate()
    {
    	$email=Emailtemplate::all();
    	return view('admin.emailtemplate.emailtemplate_index',compact('email'));
    }

    public function ViewEmailTemplate($id)
    {
    	$data=Emailtemplate::FindorFail(base64_decode($id));	
    	//dd($data);
    	return view('admin.emailtemplate.emailtemplate_view',compact('data'));
    }

    public function EditEmailTemplate($id)
    {
    	$data=Emailtemplate::FindorFail(base64_decode($id));
    	return view('admin.emailtemplate.emailtemplate_edit',compact('data'));
    }

    public function UpdateEmailTemplate(Request $request,$id)
    {   
        $request->validate([
           'title'   =>'required|min:3|max:250',
           'subject' =>'required|min:3|max:250',
           'message' => 'required|min:10|max:2000',
        ]);
    	$data=Emailtemplate::FindorFail($id);
    	$data->title =$request->title;
    	$data->subject =$request->subject;
    	$data->message =$request->message;
    	$data->save();
    	
        toastr()->success('Emailtemplate Successfully update ');
        return redirect()->route('emailtemplate');
       
    }


}
