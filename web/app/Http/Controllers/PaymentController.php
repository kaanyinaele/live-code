<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\PaymentCard;
use App\users;
use Auth;


class PaymentController extends Controller
{
    public function payment_form()
    {
    	return view('frontend.payment.payment_form');
    }
	public function paymenttSetting_form()
    {  
        $datas=PaymentCard::where('user_id',Auth::id())->where('is_delete',0)->get();
       
    	return view('frontend.payment.payment_setting',compact('datas')); 

    }
    public function addnew_card_form()
    {   
        $formattedMonthArray = array(
            "1" => "January", "2" => "February", "3" => "March", "4" => "April",
            "5" => "May", "6" => "June", "7" => "July", "8" => "August",
            "9" => "September", "10" => "October", "11" => "November", "12" => "December",
                );
        //find current year
         $year = date("Y");
    	return view('frontend.payment.addnew_card',compact('year','formattedMonthArray'));
    }
     public function addnew_card(Request $request)
    { 
        $request->validate([
            'cardholder_name' =>'required',
            'card_number'     =>'required',
            'expiry_year'     =>'required',
            'expiry_month'    =>'required',
        ]);
        $form_data = array(
            'cardholder_name'=> $request->cardholder_name,
            'card_number'    => $request->card_number,
            'expiry_year'    => $request->expiry_year,
            'expiry_month'   => $request->expiry_month,
            'user_id'        =>  Auth::id(),
          );
        $check_default=PaymentCard::where('user_id',Auth::id())->count();
        if($check_default == 0) $form_data['defalut_card'] =  1;

         
        PaymentCard::create($form_data);
        toastr()->success('Payment card add successfully');
        return redirect()->route('payment_setting');

    }
    public function card_defalut(Request $request,$id)
    {   
        // 1 = default card 0 = non default
        $data1=PaymentCard::where('user_id',Auth::id())->where('defalut_card',1)->first();  
        $data1->defalut_card =0;
        $data1->save();

       $data=PaymentCard::findorFail(base64_decode($id)); 
       $data->defalut_card =1;
       $data->save();   
       toastr()->success('This card made default successfully');
        return redirect()->route('payment_setting');
    }
    public function delete(Request $request,$id)
    {  
        $data=PaymentCard::findOrFail(base64_decode($id));
       $data->is_delete=1;
       $data->save();

       toastr()->success('Payment card delete Successfully');
       return redirect()->route('payment_setting');
    }
    public function edit(Request $request,$id)
    {   
        $formattedMonthArray = array(
            "1" => "January", "2" => "February", "3" => "March", "4" => "April",
            "5" => "May", "6" => "June", "7" => "July", "8" => "August",
            "9" => "September", "10" => "October", "11" => "November", "12" => "December",
                );
        $year = date("Y");
        $data=PaymentCard::findorFail(base64_decode($id)); 
        return view('frontend.payment.edit',compact('data','year','formattedMonthArray'));
    }

    public function update(Request $request,$id)
    { 
       $data=PaymentCard::findorFail(base64_decode($id)); 
       $data->card_number =$request->card_number;
       $data->cardholder_name =$request->cardholder_name;
       $data->expiry_month =$request->expiry_month;
       $data->expiry_year =$request->expiry_year;
       $data->save();   
       toastr()->success('Payment card update successfully');
        return redirect()->route('payment_setting');
    }

   

}