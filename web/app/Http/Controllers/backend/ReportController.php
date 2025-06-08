<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\ServiceBooking;
use App\users;
use Input,Mail;
use App\BookingPrice;
use PDF,DB;
use Response;


class ReportController extends Controller
{
    public function user_report()
	{ 
		$i = (request()->input('page', 1) - 1) * 10;
		$datas=users::where('is_delete', 0)->where('role', 1)->get();
		return view('admin.report.user_report',compact('datas','i'));
	}
	

	public function provider_report()
	{   
		$i = (request()->input('page', 1) - 1) * 10;
		$datas=users::where('is_delete', 0)->where('role', 2)->get();
		return view('admin.report.provider_report',compact('datas','i'));
	}

	public function booking_report()
	{   
		$i = (request()->input('page', 1) - 1) *  10; 
		$datas=ServiceBooking::orderby('updated_at','desc')->whereIn('status',[4,1,5,3,6])->get();
		// $datas=ServiceBooking::sortable('updated_at','desc')->whereIn('status',[4,1,5,3,6])->get();
		return view('admin.report.booking_report',compact('datas','i'));
	}

	public function provider_search(Request $request)
	{
	   $to=$request->to;
       $from=$request->from;
       $val=$request->search;

      if(!empty($from && $to)){ 
       $this->validate($request,[
        'to' => 'date|after_or_equal:from',
       'from' => 'date',
      ]); }

      $provider=users::where('role', 2)->where('is_delete', 0)->where('is_approved',1);  
      if(!empty($request->search))
      {
        $columns = array('name', 'email', 'address', 'skill_category', 'phone_no','created_at');
        $provider->where(function($q) use($columns, $val){
          foreach($columns as $search) {
             $q->orWhere($search, 'like', '%' . $val . '%');
          }
        });
      }
      if($from && $to){
        $datas = $provider->whereBetween('created_at', [$from, $to]);
      }elseif($from){

        $datas = $provider->whereDate('created_at',$from);
      }elseif($to){
        $datas = $provider->whereDate('created_at',$to);
      }
        $datas= $provider->get();
        $i = (request()->input('page', 1) - 1) * 10;
      return view('admin.report.provider_report',compact('datas','to','from','val','i'));
	}

	public function user_search(Request $request)
	{
	   $to=$request->to;
       $from=$request->from;
       $val=$request->search;

      if(!empty($from && $to)){ 
       $this->validate($request,[
        'to' => 'date|after_or_equal:from',
        'from' => 'date',
      ]); }

      $user=users::where('role', 1)->where('is_delete', 0);
      if(!empty($request->search))
      {
        $columns = array('name', 'email', 'address', 'skill_category', 'phone_no','created_at');
        $user->where(function($q) use($columns, $val){
          foreach($columns as $search) {
             $q->orWhere($search, 'like', '%' . $val . '%');
          }
        });
      }
      if($from && $to){
        $datas = $user->whereBetween('created_at', [$from, $to]);
      }elseif($from){

        $datas = $user->whereDate('created_at',$from);
      }elseif($to){
        $datas = $user->whereDate('created_at',$to);
      }
        $datas= $user->get();
        $i = (request()->input('page', 1) - 1) * 10;
      return view('admin.report.user_report',compact('datas','to','val','from','i'));
	}

	public function booking_search(Request $request)
	{
	   $to=$request->to;
       $from=$request->from;
       $val=$request->search;

      if(!empty($from && $to)){ 
       $this->validate($request,[
        'to' => 'date|after_or_equal:from',
       'from' => 'date',
      ]); }

      $booking=ServiceBooking::whereIn('status', [1,3,5,6,0]);  
      if(!empty($request->search))
      {
        $columns = array('address','whatsapp_no','mobile_no', 'address','created_at');
        $booking->where(function($q) use($columns, $val){
          foreach($columns as $search) {
             $q->orWhere($search, 'like', '%' . $val . '%');
          }
        });
      }
      if($from && $to){
        $datas = $booking->whereBetween('created_at', [$from, $to]);
      }elseif($from){

        $datas = $booking->whereDate('created_at',$from);
      }elseif($to){
        $datas = $booking->whereDate('created_at',$to);
      }
        $datas= $booking->get();
        $i = (request()->input('page', 1) - 1) * 10;
      return view('admin.report.booking_report',compact('datas','to','val','from','i'));
	}

    // function index(Request $request)
    // {
    //    $to= $request->to;
    //    $from= $request->from;
    //    $val= $request->search;

    //   if(!empty($from && $to)){ 
    //    $this->validate($request,[
    //     'to' => 'date|after_or_equal:from',
    //     'from' => 'date',
    //   ]); }

    //   $user=users::where('role', 1)->where('is_delete', 0);
     
    //   if(!empty($request->search))
    //   {
    //     $columns = array('name', 'email', 'address', 'skill_category', 'phone_no','created_at');
    //     $user->where(function($q) use($columns, $val){
    //       foreach($columns as $search) {
    //         $q->orWhere($search, 'like', '%' . $val . '%');
    //       }
    //     });
    //   }

    //   if($from && $to){
    //     $datas = $user->whereBetween('created_at', [$from, $to]);
    //   }elseif($from){

    //   $datas = $user->whereDate('created_at',$from);
    //   }elseif($to){
    //     $datas = $user->whereDate('created_at',$to);
    //   }

    //   $i = (request()->input('page', 1) - 1) * 10;

    //   $datass = $this->get_customer_data(); 
    //   $datas = $datass['paginate_data'];
      
    //   return view('admin.report.user_report',compact('datas','i','val','to','from'));
    // }

 //    function get_customer_data()
 //    {
 //       $cus_data=users::where('is_delete', 0)->where('role', 1)->sortable('id', 'desc');
     
 //       $all_data = $cus_data->get();
 //       //$paginate_data = $cus_data->paginate(20);

 //       $data = array();

 //       $data['customer_data'] = $all_data;

 //       //$data['paginate_data'] = $paginate_data;
 //       return $data;
 //    }
	// function pdf()
 //    { 
 //     $pdf = \App::make('dompdf.wrapper');
 //     $pdf->loadHTML($this->convert_customer_data_to_html());
 //     return $pdf->stream();
 //    }

 //    function convert_customer_data_to_html()
 //    {
 //     $customer_datas = $this->get_customer_data();

 //     $customer_data = $customer_datas['customer_data'];
 //     $s_no =0;
 //     $output = '
 //     <h6 align="center">Customer Data</h3>
 //     <table width="100%" style="border-collapse: collapse; border: 0px;">
 //      <tr>
 //      <th style="border: 1px solid; padding:12px;" width="20%">S.no</th>
 //     <th style="border: 1px solid; padding:12px;" width="20%">Full Name</th>
 //     <th style="border: 1px solid; padding:12px;" width="30%">Address</th>
 //     <th style="border: 1px solid; padding:12px;" width="15%">Email</th>
 //     <th style="border: 1px solid; padding:12px;" width="15%">Phone Number</th>
 //     <th style="border: 1px solid; padding:12px;" width="20%">Registration Date</th>
 //   </tr>
 //     '
     
 //     ;  
 //     foreach($customer_data as $customer)
 //     {
     	
 //      $output .= '
 //      <tr>
 //      <td style="border: 1px solid; padding:12px;">'.++$s_no.'</td>
 //       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
 //       <td style="border: 1px solid; padding:12px;">'.$customer->address.'</td>
 //       <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
 //       <td style="border: 1px solid; padding:12px;">'.$customer->phone_no.'</td>
 //       <td style="border: 1px solid; padding:12px;">'.$customer->created_at.'</td>

 //      </tr>
 //      ';
 //     }
 //     $output .= '</table>';
 //     return $output;
 //    }
}
