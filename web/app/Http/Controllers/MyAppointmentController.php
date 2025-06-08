<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ServiceBooking;
use App\Subcategory;
use App\ServiceAcknowledgement;
use Auth, View, Input,DB;


class MyAppointmentController extends Controller
{
    public function my_appointments()
    {
        // all request  
        $total_all_request=ServiceBooking::where('user_id',Auth::id())->whereIn('status', [1,0])->count();
    	$total_Upcoming_booking=ServiceBooking::where('user_id',Auth::id())->where('status',4)->join('service_acknowledgements',"service_booking.id","=","service_acknowledgements.service_booking_id")
                            ->where('service_acknowledgements.service_status',0)
                            ->select('service_booking.*') 
                            ->count();
    	$total_cancel=ServiceBooking::where('user_id',Auth::id())->where('status',3)->count();
    	$total_booked=ServiceBooking::where('user_id',Auth::id())->where('status',5)->count();
        // $total_current_booking=ServiceBooking::where('user_id',Auth::id())->where('status',6)->count();
        $total_current_booking=ServiceBooking::where('user_id',Auth::id())
                            ->join('service_acknowledgements',"service_booking.id","=","service_acknowledgements.service_booking_id")
                            ->whereIn('service_acknowledgements.service_status',[1,2,3])
                            ->select('service_booking.*') 
                            ->count();
        
    	return view('frontend.my_appointments.my_appointments',compact('total_Upcoming_booking','total_all_request','total_cancel','total_booked','total_current_booking'));
    }

    public function getItemStatus($type){ 
        //dd($type);
    	if($type == 7){
    		$data = ServiceBooking::where('user_id',Auth::id())->whereIn('status',[0,1]);
		}else if($type == 6){ 
    	   $data=ServiceBooking::where('user_id',Auth::id())
                            ->join('service_acknowledgements',"service_booking.id","=","service_acknowledgements.service_booking_id")
                            ->whereIn('service_acknowledgements.service_status',[1,2,3])
                            ->select('service_booking.*'); 
        }
        else if($type == 4){ 
          $data=ServiceBooking::where('user_id',Auth::id())->whereIn('status',[4])
                            ->join('service_acknowledgements',"service_booking.id","=","service_acknowledgements.service_booking_id")
                            ->where('service_acknowledgements.service_status',[0])
                            ->select('service_booking.*'); 
        }
        else{
           $data = ServiceBooking::where('user_id',Auth::id())->where('status',$type);            
        } 
        $data = $data->orderBy('id','desc')->paginate(10); 
        $view = View::make('frontend.my_appointments.my_appointlist')->with(['datas'=>$data,'type'=>$type]);
        echo $view;
        exit;
    }

    public function rate_review()
    {
    	return view('frontend.my_appointments.Review_Rate');
    }
    public function  booking_cancel($id)
    {   
    	$data=ServiceBooking::findOrfail(base64_decode($id));
    	$data->status= 3;
    	$data->save();
    	toastr()->success('Service cancel Successfully');
    	return redirect()->route('appointments');
    }
    //book request service in request section in appointment
    public function after_service_booking($id)
    {   
    	$data=ServiceBooking::findOrfail(base64_decode($id));
    	$data->status= 0;
    	$data->save();
    	toastr()->success('service book Successfully');
    	return redirect()->route('appointments');
    }
    public function upcoming_request_detail($id)
    {	
    	$data=ServiceBooking::findOrfail(base64_decode($id));
    	$ack=ServiceAcknowledgement::where('service_booking_id',base64_decode($id))->first(); 
       
        // $dt = date("m/d/Y"); 
        // $date=explode('-',date('m/d/Y - m/d/Y', strtotime($data->date)) );
        // $date1=$date[0];
        // $date2=$date[1];
        // if($dt >= $date1 || $dt <= $date2)
        //     $is_date=1;
        // else
        //     $is_date=0;
    	return view('frontend.job_management.upcoming_request_detail',compact('data','ack'));
    }
    public function provider_profile_form($id)
    {   $data=ServiceBooking::findOrfail(base64_decode($id)); 
        return view('frontend.provider_oza.provider_profile',compact('data')); 
    }
   //select sub category from ajex
    public function get_sub_category(Request $request)
    {   
        $id = $request->id;
        $sub_category = Subcategory::where('parent_category',$id)->where('is_delete',0)->where('status',0)->get();
        return response()->json($sub_category );

    }
    
    public function start_service(Request $request,$id)
    {   
        $data=ServiceAcknowledgement::findOrfail(base64_decode($id));
        $curTime = new \DateTime();
        $data->service_status= 2;
        $data->ack_start=$curTime->format("Y-m-d H:i:s");
        $data->save();

        //find user name for app notification
        $finduser=service_booking_data($data->service_booking_id); 
        $find_user=$finduser->user_id; 
        $user_name=user($find_user); 

        //finf service name for app notification
         $findservice=service_booking_data($data->service_booking_id); 
         $service_nm=show_cat_name($findservice->service_id); 

        $find_servicebooking_id=service_booking_data($data->service_booking_id);
        $user_data= user($find_servicebooking_id->assign_provider); 

        sendNotification($user_data->notification_token
            ,"Start confirmation"
            ,$user_name->name."user has confirmed start of ".$service_nm,
            ['type'=>1,'data'=>$data],1,$user_data->id);

        toastr()->success('Service start Successfully');
        return redirect()->route('appointments'); 
    }
    
     public function end_service(Request $request,$id)
    {  
        $data=ServiceAcknowledgement::findOrfail(base64_decode($id));
        $curTime = new \DateTime();
        $data->ack_end=$curTime->format("Y-m-d H:i:s");
        $data->service_status= 4;
        $data->save();

        // hear we change status of service booking in bookingsevic table
        $data1=service_booking_data($data->service_booking_id);
        $data1->status= 5;
        $data1->save();

        //find user name for app notification
        $finduser=service_booking_data($data->service_booking_id); 
        $find_user=$finduser->user_id; 
        $user_name=user($find_user); 

        //finf service name for app notification
         $findservice=service_booking_data($data->service_booking_id); 
         $service_nm=show_cat_name($findservice->service_id); 

        $find_servicebooking_id=service_booking_data($data->service_booking_id);
        $user_data= user($find_servicebooking_id->assign_provider); 
        sendNotification($user_data->notification_token,"End confirmation",$user_name->name." has confirmed end of ".$service_nm,['type'=>1,'data'=>$data],1,
            $user_data->id);
        toastr()->success('Service end Successfully');
        return redirect()->route('appointments');

    }

}
