<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\ServiceBooking;
use App\users;
USE App\ServiceAcknowledgement;

class BookingController extends Controller
{
    public function index()
    {  
    	$booking=ServiceBooking::sortable('id','desc')->where('status','0')->orwhere('status','4')->orwhere('status','3')->paginate(10);
    	$provider=users::where('is_delete',0)->where('status',0)->where('role',2)->get();
    	$i = (request()->input('page', 1) - 1) *  10;
    	return view('admin.booking.index',compact('provider','booking','i'));
    }
    public function Search(Request $request)
     {   
      $booking=ServiceBooking::where('date','LIKE','%'.$request->search.'%')->where('status', 0)->orwhere('status','4')->orwhere('status','4')->paginate( 10);
      $provider=users::where('is_delete',0)->where('status',0)->where('role',2)->get();
      $val=$request->search;
      $i = (request()->input('page', 1) - 1) *  10;
      return view('admin.booking.index',compact('provider','booking','i','val'));
     }
    public function view($id)
    {  
		$data=ServiceBooking::findorFail(base64_decode($id)); 
		$provider=users::where('is_delete',0)->where('status',0)->where('role',2)->get();
	   return view('admin.booking.view',compact('data','provider'));
    }

    public function select_provider(Request $request)
    { 
    	$data=ServiceBooking::findorFail($request->hdn);
    	$data->assign_provider = $request->assign_provider;
      $data->status = 4;
  		$data->save();	

      $acknowledgement_data=array(
        'service_booking_id' => $request->hdn,
      );
      ServiceAcknowledgement::create($acknowledgement_data);
      
      $service_nm=show_cat_name($data->service_id);  
      $user_data= user($data->assign_provider); 
      $provider_booking_data  = ServiceBooking::where("service_booking.id",$data->id)->whereNotIn('status', [3,5])
                ->join('service_acknowledgements','service_acknowledgements.service_booking_id','=','service_booking.id')
                ->select('service_booking.*','service_acknowledgements.start_at_provider', 'service_acknowledgements.end_at_provider', 'service_acknowledgements.ack_start', 'ack_end', 'service_acknowledgements.service_status')
                ->first();

      $customer_data = users::where("id",$provider_booking_data->user_id)->select('id','name','notification_token')->first();

      if(!empty($provider_booking_data)){
          $provider_booking_data->start_date = explode("-",$provider_booking_data->date);
          $provider_booking_data->start_time = explode("-",$provider_booking_data->time);
          $provider_booking_data->user_details = $customer_data ;  
      }
      
      sendNotification($user_data->notification_token
            ,"Service Assigned"
            ,"You have been assigned a service ".$service_nm,
            ['type'=>2,'data'=>$provider_booking_data],2,$user_data->id);

      // Code by Kumar Divya
      // Send notification to the customer
      if($customer_data->notification_token) {
          sendNotificationToCustomer(
              $customer_data,
              'Provider assigned' ,
              $user_data->name.' has been assigned for your service '.$service_nm,
              ['service_booking_id'=>$provider_booking_data->id], 
              6
          );  
      }

      toastr()->success('Assiged provider Successfully');
  		return redirect()->route('booking');

    }
    


}
