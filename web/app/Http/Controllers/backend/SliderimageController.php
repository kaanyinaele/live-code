<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sliderimage;
class SliderimageController extends Controller
{
    public function index_Sliderimage()
    {    $dynamic_pagination=10;
    	$image=Sliderimage::orderBy('id','desc')->where('is_delete',0)->paginate( $dynamic_pagination);
         $i = (request()->input('page', 1) - 1) *  $dynamic_pagination;
    	return view('admin.sliderimage.index_slider',compact('image','i'));
    }
    public function Search_Sliderimage(Request $request)
    {    $dynamic_pagination=10;
        $image=Sliderimage::where('title','LIKE','%'.$request->search.'%')->where('is_delete',0)->paginate( $dynamic_pagination);
         $val=$request->search;
         $i = (request()->input('page', 1) - 1) *  $dynamic_pagination;
        return view('admin.sliderimage.index_slider',compact('image','i','val'));
    }
    public function Addform_Sliderimage()
    {  
         $count_slider=Sliderimage::where('status',0)->where('is_delete',0)->count();
         //dd( $count_slider);
        if($count_slider >= 5){
            toastr()->error('You can not add banner image more than 5 ');
            return redirect()->back();
        }
        
        else{
             return view('admin.sliderimage.add_sliderimage',compact('image'));
        }
    }

     public function Add_Sliderimage(Request $request)
    {	
    	 $request->validate([
            //'title' => 'min:3|max:50|nullable',
            'image' =>'required|mimes:jpeg,png,jpg,svg',
            'description' =>'nullable|min:10|max:330',
         ]);

    	$image=$request->file('image');
         $newimage=rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('/image/slider'), $newimage);

    	$data=array(
    		'title'=>$request->title,
            'description' =>$request->description,
    		'image'=>$newimage,

    	);
    	Sliderimage::create($data);
        toastr()->success('Slider image add sucessfully ');
    	return redirect()->route('sliderimage');
    }

    public function Delete_Sliderimage($id)
    {

	    Sliderimage::where('id',$id)->update(['is_delete'=>1]);
         toastr()->success('Slider image delete successfully ');
	    return redirect()->back();
    }


    public function EditSliderimage($id)
    {   
       
    	$data=Sliderimage::findorFail(base64_decode($id));
	    return view('admin.sliderimage.editimage',compact('data'));
    }

    public function UpdateSliderimage(Request $request,$id)
    {   
         $request->validate([
            'title' => 'nullable|min:3|max:50',
            'image' =>'image|mimes:jpeg,png,jpg,svg',
            'description' =>'nullable|min:10|max:330',
         ]);

    	$data=Sliderimage::findOrFail($id);
    	
    	if(!empty($image=$request->file('image')))
    	{
         $newimage=rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('/image/slider'), $newimage);

         $data->title =$request->title;
         $data->image =$newimage;
         $data->description =$request->description;
         $data->save(); 
         toastr()->success('Slider image update sucessfully ');
         return redirect()->route('sliderimage');
        
        }
        else
        {
         $data->title =$request->title;
         $data->description =$request->description;
         $data->save();	
         toastr()->success('Slider image update sucessfully ');
         return redirect()->route('sliderimage');
        }
    	
    }

    public function Sliderimage_Status(Request $request,$id,$status)
    {

            if($status == 0 )
            {
          $data=Sliderimage::findorFail($id);
          $data->status = 1;
           $data->save();
           toastr()->success('SliderImage de-activate Successfully');
          return redirect()->back();
          }

          else
          {
                
          $data=Sliderimage::findorFail($id);
          $data->status = 0;
           $data->save();
            toastr()->success('SliderImage activate Successfully');
          return redirect()->back();
         }
    }

}