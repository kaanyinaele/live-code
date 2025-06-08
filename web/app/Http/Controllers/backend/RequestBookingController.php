<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\ServiceBooking;
use App\users;
use Input,Mail;
use App\BookingPrice;
use PDF;

class RequestBookingController extends Controller
{   
	  public function index()
    {  
     //status for find  booked or request service
    	$booking=ServiceBooking::sortable('id','desc')->where('status','1')->orwhere('status','0')->orwhere('status','3')->orwhere('status','4')->paginate(10);
      $i = (request()->input('page', 1) - 1) *  10;
    	return view('admin.request_booking.index',compact('booking','i'));
    }
    public function Search(Request $request)
     {   
      $booking=ServiceBooking::where('date','LIKE','%'.$request->search.'%')->where('status', 1)->orwhere('status','0')->orwhere('status','3')->orwhere('status','4')->paginate( 10);
      $val=$request->search;
      $i = (request()->input('page', 1) - 1) *  10;
      return view('admin.request_booking.index',compact('booking','i','val'));
     }
    public function view($id)
    {  
		 $data=ServiceBooking::findorFail(base64_decode($id)); 
		 //$provider=users::where('is_delete',0)->where('status',0)->where('role',2)->get();
	   return view('admin.request_booking.view',compact('data'));
    }

    public function send_price(Request $request)
    {  
   //dd($request->all());
      $count= count($request->service); 
      for($i=0; $i<$count-1; $i++)
      { 
        $store = new BookingPrice;
        $store->service_name     = $request->service[$i];
        $store->quantity         = $request->quantity[$i];
        $store->cost             =$request->cost[$i];
        $store->calculate_price  =$request->calculate_price[$i];
        $store->booking_id       = $request->hdn;
        $store->vat              = $request->vat;
        $store->discount         = $request->discount;
        $store->save();
      }
      $data_price=ServiceBooking::findorFail($request->hdn); 
      $data_price->price = $request->total;
      $data_price->save();

       //send invoice to gmail
       $print_data  = BookingPrice::where('booking_id',$request->hdn)->get(); 
       $print_data1 = ServiceBooking::where('id',$request->hdn)->value('price'); 
       $address     = ServiceBooking::where('id',$request->hdn)->value('address');
       $service_book= ServiceBooking::where('id',$request->hdn)->first(); 
      // echo "<pre>";print_r($service_book); die();
       $data=$data_price->user_id;
       $to_email=user($data)->email;
       $to_name=user($data)->name;
       $user_alldata=user($data);
       $subject="Invoice from ogaworkman";
       $blade_value = array('print_data'=>$print_data ,'print_data1' => $print_data1,
        'to_name' => $to_name, 'to_email'=>$to_email,'address'=>$address,'user_alldata'=>$user_alldata , 'service_book_id'=>$service_book->id);
       $service_book_id = $service_book->id;

       $invoiceFile = "invoice-".$service_book->id.".pdf";
       $invoicePath = public_path("invoices/".$invoiceFile);
       // PDF::loadView('admin.request_booking.invoice', compact('print_data','print_data1', 'to_name', 'to_email','address','user_alldata', 'service_book_id'))->setPaper('a4')->save($invoicePath);
       // $html = \View::make('admin.request_booking.invoice', $blade_value)->render();
       
       PDF::loadView('admin.request_booking.invoice', $blade_value)->setPaper('a4')->save($invoicePath);
       // PDF::loadHtml($html)->setPaper('a4','portrait')->save($invoicePath);
       $mediaUrl =  url('/')."/public/invoices/".$invoiceFile;      

       Mail::send('admin.request_booking.invoice', $blade_value, function($message) use ($to_email, $to_name,$subject) 
       {
        $message->to($to_email, $to_name)
        ->subject($subject);
        $message->from(env('MAIL_USERNAME','testingbydev@gmail.com'),env('MAIL_NAME'));

      });

      // Code by Kumar Divya. Send notification to the customer.
      if($user_alldata->notification_token) {
          sendNotificationToCustomer(
              $user_alldata,
              'Price received' ,
              'Price has been updated for your service '.booking_service($service_book->service_id),
              ['service_booking_id'=>$service_book_id], 
              5
          );  
      }

      //whtapp send invoice.....whatsapp_no
      $user_mob=$service_book->whatsapp_no;
      Whatsapp_invoice($to_email, $mediaUrl);

      toastr()->success('Invoice Sent');
      return redirect()->route('service-request');
      
    }
    
}

