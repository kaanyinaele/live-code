<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ServiceManagement;
use App\ServiceBooking;
use App\users;
use Input;
use App\BookingPrice;

class BookPriceController extends Controller
{
    public function getAjax()
	{
	    $id = $_GET['id']; //dd($id);
	    $price_data=BookingPrice::where('booking_id',$id)->get();
	    $html='';
	    // hear we store multiple tr
	    foreach($price_data as $row)
	    {    
	        $html = $html . 
	              '<tr>
	                 <td style="width:180px">' . $row->service_name . '</td>' .
	                 '<td>' . $row->cost . '</td>' .
	                 '<td>' . $row->quantity . '</td>' .
	                 '<td>' . $row->calculate_price . '</td>' .
	              '</tr>';
	    } 
	   return $html;
	}
}
