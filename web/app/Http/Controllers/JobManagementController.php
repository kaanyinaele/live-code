<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\ServiceBooking;
use Auth;
use App\users;
class JobManagementController extends Controller
{
    public function job_management()
    {
    	return view('frontend.job_management.job_management');
    }
    public function service_detail(Request $request,$id)
    {   
        //selected sub category
        //$subcategory = $request['subcategory'];
        $subcategory =implode( "," ,(array)$request->subcategory );
        if(Auth::check() && Auth::user()->role == 1)
        $data=users::where('id',Auth::user()->id)->first(); 

        $service_id=base64_decode($id);
        $service=ServiceManagement::where('id',$service_id)->where('active_status',0)->where('is_delete',0)->first();

    	return view('frontend.job_management.service_detail',compact('service_id','service','subcategory','data'));
    }
    public function servicedetail_withoutprice()
    {
    	return view('frontend.job_management.service_detail_withoutprice');
    }
    public function service_booking(Request $request,$id)
    { 
        $request->validate([
        'date'                      => 'required',
        'time'                      => 'required',
        'additional_information'    => 'required|min:3|max:300',
        'image'                     => 'nullable|image|mimes:jpeg,png,jpg,svg',
        'address'                   => 'required',
        'mobile_no'                 =>'required|digits_between:7,15',
        'whatsapp_no'               =>'required|digits_between:7,15',

        // 'payment_type'              =>'required',
        ]); 
        $subcategory =implode( "," ,(array)$request->subcategory);
        $data=array(
            'date'                   => $request->date,
            'time'                   => $request->time,
            'additional_information' => $request->additional_information,
            'user_id'                => Auth::id(),
            'service_id'             => base64_decode($id),
            'address'                => $request->address,
             'mobile_no'             => $request->mobile_no,
            'whatsapp_no'            => $request->whatsapp_no,
            'sub_category'           => $subcategory,
        ); 
         $datas=ServiceManagement::where('id',base64_decode($id))->value('price'); 
         if(!empty($datas)) { 
         $data['price'] = $datas; 
         }
         //if service going for request booking ..._status will 0 
        if(!empty($payment_type = $request->payment_type)){
            $data['payment_type'] =$request->payment_type;
             $data['status']='0';
        }
        if(!empty($image=$request->file('image'))){  
        $newimage=rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/image/book_service'), $newimage);
        $data['image'] = $newimage;
        } 
        if(empty($image=$request->file('image'))){  
        $data['image'] = NULL;
        } 
        // echo '<pre>'; print_r($data); die;
        ServiceBooking::create($data);
        toastr()->success('Service booked sucessfully');
        return redirect()->route('appointments');
        
    }
    

}
