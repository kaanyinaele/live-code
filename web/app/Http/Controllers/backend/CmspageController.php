<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Cmspage;

class CmspageController extends Controller
{
    public function CmspageIndex()
    {
    	$cms=Cmspage::all();
    	return view('admin.cmspage.cms_index',compact('cms'));
    }
    public function CmspageEdit($id)
    {   
    	$cms=Cmspage::findorFail(base64_decode($id));
    	// dd($cms);
    	return view('admin.cmspage.editcms_page',compact('cms'));
    	
    }
    public function CmspageUpdate(Request $request ,$id)
    {    

        $request->validate([
           'title'      =>'required|min:3|max:50',
           'description'=>'required|min:10'
        ]);
    	$cms=Cmspage::findorFail($id);
    	$cms->title =$request->title;
    	$cms->description = $request->description;
    	$cms->save();
        toastr()->success('Cms page update successfully');
        return redirect()->route('cmspage');		
    }

     public function CmspageView($id)
    {   
        $cms=Cmspage::findorFail(base64_decode($id));
        // dd($cms);
        return view('admin.cmspage.viewcms_page',compact('cms'));
        
    }
}	
