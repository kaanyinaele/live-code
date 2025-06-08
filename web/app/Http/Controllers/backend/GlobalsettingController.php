<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Globalsetting;
use Session;

class GlobalsettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function EditPersonalinfo()
    { 
        $data=Globalsetting::findorFail(1);
        return view('admin.globalsetting.personalinfo_edit',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Globalsetting  $globalsetting
     * @return \Illuminate\Http\Response
     */
    public function UpdateSocaillinks(Request $request)
    {  
         Session::flash('gtab', 'tab_3'); 
        $request->validate([
            'facebook' =>'url|nullable',
            'instagram'=>'url|nullable',
            'twitter'  =>'url|nullable',
            'pinterest'=>'url|nullable',
            
         ]);
        $data=Globalsetting::findOrFail(1);

        $data->facebook   =   $request->facebook;
        $data->instagram   =   $request->instagram;
        $data->twitter  =   $request->twitter;
        $data->pinterest   =   $request->pinterest;
        $data->save();
        Session::flash('gtab', 'tab_3'); 
       toastr()->success('Infomation update successfully');
       return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Globalsetting  $globalsetting
     * @return \Illuminate\Http\Response
     */
    public function UpdateSiteinformation(Request $request)
    {   
        Session::flash('gtab', 'tab_2'); 
         $request->validate([
            'content'    =>'min:30|max:300',
            'title'      => 'min:2|max:20',
            'logo'       =>  'image|mimes:jpeg,png,jpg,gif,svg',
            'copyright'  => 'min:8|max:80',
            'favicon'    =>  'image|mimes:jpeg,png,jpg,gif,svg',
            'vat'        =>  'required|between:0,99.99|numeric',
         ]);
   
        $data=Globalsetting::findorFail(1);

        if(!empty($logo=$request->file('logo')))
        {   
            $newimage=rand().'.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('/image/logo'),$newimage);
            $data->title    =     $request->title;
            $data->content     =    $request->content;
            $data->copyright   =   $request->copyright;
            $data->logo             =   $newimage;
             $data->vat      =   $request->vat;
        }
        else
        {
            $data->title  =     $request->title;
            $data->content     =    $request->content;
            $data->copyright   =   $request->copyright;
            $data->vat      =   $request->vat;
        }
        if(!empty($favicon=$request->file('favicon')))
        { 
           $newimage=rand().'.'.$favicon->getClientOriginalExtension();
            $favicon->move(public_path('/image/favicon'),$newimage);    
             $data->favicon=$newimage;
        }  
        $data->save();
        Session::flash('gtab', 'tab_2'); 
       toastr()->success('Infomation update successfully..');

       return redirect()->back();
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Globalsetting  $globalsetting
     * @return \Illuminate\Http\Response
     */
    public function UpdatePersonalinfo(Request $request)
    {  

        $request->validate([
            'phone_no'               =>'digits:10',
            'email'                  =>'email|max:50|min:10',
            'address'                =>'max:100|min:3',
            'contact_person_name'    =>'max:50|min:3'

         ]);

       $data=Globalsetting::findOrFail(1);
        $data->phone_no  =     $request->phone_no;
        $data->email     =    $request->email;
        $data->address   =   $request->address;
        $data->contact_person_name= $request->contact_person_name;
        $data->save();

       toastr()->success('Infomation update successfully');
       return redirect()->route('globalsetting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Globalsetting  $globalsetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Globalsetting $globalsetting)
    {
        //
    }
}
