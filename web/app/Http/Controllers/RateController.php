<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\users;
use Auth;
use App\Rating;
use App\ServiceBooking;

class RateController extends Controller
{
   public function rate(Request $request)
    
    {	

       if($request->ajax()){
        // print_r($request->all());

        $form_data = array( 
            'review'              => $request->review,
            'rating'              => $request->rating,
            'user_id'             =>  Auth::id(),
            'provider_id'         => $request->provider_id,
            'servicebooking_id'   => $request->servicebooking_id,
            'service_id'          =>$request->service_id,
          );
        $data = Rating::create($form_data);

        // $form_data1 = array( 
        //     'rating_status'  => 1,
        //   );

        // $data1 = ServiceBooking::create($form_data1);


        return response()->json(['success'=>true]);
       }
    	
    }
}
       