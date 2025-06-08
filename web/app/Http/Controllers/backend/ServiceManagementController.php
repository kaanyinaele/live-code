<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceManagement;
use validator;

class ServiceManagementController extends Controller
{
    public function AddService_Form()
    {
    	return view('admin.ServiceManagement.addservice_form');
    }

    public function AddService(Request $request)
    {   
    	$request->validate([
          'category_name' 		 => 'required|min:3|max:250',
          // 'services_offered'     =>'required',
          'image'                =>'required|image|mimes:jpeg,png,jpg,svg',
          'featured_image'        =>'required|image|mimes:jpeg,png,jpg,svg',
          'price'                => 'regex:/^(\d+(.\d{1,2})?)?$/|min:1|max:10|nullable',
          'service_overview'     =>'required|min:20|max:1300',
          // 'Availability'       =>'required',
        ]);
    	   $image = $request->file('image');
         $newimage=rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('/image/service'), $newimage); 

         $image1 = $request->file('featured_image');     
         $newimage1=rand() . '.' . $image1->getClientOriginalExtension();
         $image1->move(public_path('/image/featured_image'), $newimage1); 
         /*echo "<pre>";
                      print_r($newimage);
                       print_r($newimage1);
      echo "</pre>";
      die;*/
        $form_data = array(
            'category_name'     => $request->category_name,
           
            'service_overview'  =>$request->service_overview,
            'price'            => $request->price,
            'image'            => $newimage,
            'featured_image'   => $newimage1,
          );

         ServiceManagement::create($form_data);
         toastr()->success('Service Add sucessfully ');
        return redirect()->route('service/index');
         // return redirect()->back();
       
    	 
    }

    
    public function ServiceManagementIndex(Request $request)
	    {   
        $dynamic_pagination=10;
	    	$service=ServiceManagement::sortable('id','desc')->where('is_delete',0)->paginate($dynamic_pagination);
        $val=$request->search;
        $i = (request()->input('page', 1) - 1) * $dynamic_pagination;
	    	return view('admin.ServiceManagement.ServiceManagementIndex',compact('service','val','i'));
	    }
    
    public function ViewSerive($id)
	    {
	      $data=ServiceManagement::findorFail(base64_decode($id));
	      return view('admin.ServiceManagement.ViewService',compact('data'));
	    }

	 public function DeleteService($id,$page)
        {
            ServiceManagement::where('id',$id)->update(['is_delete'=>1]);
             toastr()->success('service delete Successfully');
            return redirect('admin/service?page='.$page);
        }
      public function EditService($id,$page_no)
        {
          $data=ServiceManagement::findorFail(base64_decode($id));
	      return view('admin.ServiceManagement.EditService',compact('data','page_no'));
        } 
        
         public function UpdateSerive(Request $request,$id)
         {
              $request->validate([
          'category_name' 		   => 'required',
          // 'services_offered'     =>'required',
          'price'                => 'regex:/^(\d+(.\d{1,2})?)?$/|min:1|max:10|nullable',
          'service_overview'	   =>'required|min:20|max:1300',
          'image'                =>'image|mimes:jpeg,png,jpg,svg',
          'featured_image'        =>'image|mimes:jpeg,png,jpg,svg',
            // 'Availability'      =>'required',
            ]);
            $data=ServiceManagement::findorFail(base64_decode($id));
            
            if(!empty($image=$request->file('image'))){
             $newimage=rand() . '.' . $image->getClientOriginalExtension();
             $image->move(public_path('/image/service/'), $newimage);
              $data->image =$newimage;
           }

            if(!empty($image1 = $request->file('featured_image'))){     
             $newimage1=rand() . '.' . $image1->getClientOriginalExtension();
             $image1->move(public_path('/image/featured_image/'), $newimage1);
               $data->featured_image       =$newimage1;
             } 


             $data->category_name    =  $request->category_name;
             // $data->services_offered   =   $request->services_offered;
             $data->category_name      =$request->category_name;
             $data->service_overview       =$request->service_overview;
             // $data->Availability             =$request->Availability;
             $data->price                = $request->price;
            
             $data->save();
             toastr()->success('service update Successfully');
             return redirect('admin/service?page='.$request->input('hidden'));
           
           
             
             
        }   
            
        public function CategoryStatus(Request $request,$id,$status)
        {  
        	if($status == 0 )
        	{
          $data=ServiceManagement::findorFail($id);
          $data->active_status = 1;
          $data->save();
          toastr()->success('service De-activate Successfully');
	        return redirect()->back();
          }

          else
          {
          $data=ServiceManagement::findorFail($id);
          $data->active_status = 0;
           $data->save();
	        toastr()->success('service Activate Successfully');
          return redirect()->back();
          }	
        } 

     public function SearchService(Request $request)
     { 
      $dynamic_pagination=10;
     	$service=ServiceManagement::where('category_name','LIKE','%'.$request->search.'%')->where('is_delete', 0)->paginate($dynamic_pagination);
      $val=$request->search;
      $i = (request()->input('page', 1) - 1) * $dynamic_pagination;
     	return view('admin.ServiceManagement.ServiceManagementIndex',compact('service','val','i'));

     }
   



}