<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PaymentCard;
use App\users;
use Auth;
use Pay;

use Illuminate\Http\Request;

class PayController extends Controller
{
     public function payment(Request $request)
    {   

       if($request->ajax()){
        // print_r($request->all());

        $form_data = array( 
            'amount'         => $request->amount,
            // 'rating'         => $request->rating,
            'user_id'         =>  Auth::id(),
            // 'provider_id'    => $request->provider_id
          );

        $data = pay::create($form_data);

        return response()->json(['success'=>true]);
       }
        
    }
}
