<?php
use App\Globalsetting;
use App\users;
use App\ServiceManagement;
use App\Subcategory;
use App\BookingPrice;
use App\ServiceBooking;
use App\Location;
use App\Notification;
use App\ServiceAcknowledgement;

function GlobalTitle(){
	$global = Globalsetting::where('id',1)->first();
	if(!empty($global)){
	return ($global);
	}else{
		return "N/A";
	}
}
function profile_image(){
	$global = users::where('id',Auth::id())->first();
	if(!empty($global)){
	return ($global);
	}else{
		return "N/A";
	}
}
//show in header
function location()
{
	$location= Location::where('is_delete',0)->where('status',0)->get();
	if(!empty($location)){
	return ($location);
	}else{
		return "N/A";
	}
}
function service(){
	$service = ServiceManagement::where('is_delete',0)->where('active_status',0)->get();
	if(!empty($service)){
	return ($service);
	}else{
		return "N/A";
	}
}
function show_cat_name($id){
	$cat_data = ServiceManagement::where('id',$id)->where('is_delete',0)->where('active_status',0)->value('category_name');
	return $cat_data;
}
//for booking index
function booking_service($id){
	$service = ServiceManagement::where('id',$id)->value('category_name');
	return $service;
}
function user_name($id){
	$name = users::where('id',$id)->value('name');
	return $name;
}
// display provider name for assgn provider by admin 
function provider_(){
	$name = users::where('role',2)->where('is_approved',1)->where('is_approved',1)->where('is_delete',0)->where('status',0)->get();
	return $name;
}
function provider_name($id){
	$name = users::where('id',$id)->value('name'); 
	return $name;
}


//.......................................................................................backend
function service_name($id){ 
	$service_name = ServiceManagement::where('id',$id)->value('category_name');
	return $service_name;
}
function currency()
{
	$currency='₦';
	return $currency;
}
// function provider($id){
// 	$provider = users::where('id',$id)->first(); 
// 	return $provider;
// }
//all user provider admin
function user($id){
	$user = users::where('id',$id)->first(); 
	return $user;
}
function user_image($id){
	$user_image = users::where('id',$id)->value('image'); 
	return $user_image;
}

//upcoimg request deatail
function booking($id){ 
	$booking = ServiceManagement::where('id',$id)->first(); 
	return $booking;
}
function getOtp($digit = 4){
    if($digit==6){
        return rand(111111,999999);
        // return 123456;
    }else{
        return rand(1111,9999);
        // return 1234;
    }
}
function sub_category($id){ 
	$sub_category = Subcategory::where('parent_category',$id)->where('is_delete',0)->where('status',0)->get();
	return $sub_category;
}
function category_all($id){ 
	$category_all = ServiceManagement::where('id',$id)->first(); 
	return $category_all;
}


 //admin fetch price data from booking price table
function price_data($id)
 {
 	$price_data=BookingPrice::where('booking_id',$id)->get();
 	return $price_data;
 }
 //display all  selected subcategoryfrom booking table
 function book_subcategory($id)
 {
 	$sub_category=Subcategory::where('id',$id)->value('sub_category');
 	return $sub_category;
 }
// function show_cat_name($id){
// 	$cat_data = ServiceManagement::where('id',$id)->where('is_delete',0)->where('active_status',0)->value('category_name');
// 	return $cat_data;
// }
// endNotification($user_data->notification_token,"Start confirmation",$user_name->name."user has confirmed start of ".$service_nm,['type'=>1,'data'=>$data]); 

function sendNotification($token,$title,$message,$data,$type,$user_id){  
    $title = array("en" => $title );
    $content = array("en" => $message);
    
    $fields = array(
        'app_id' => "6520e0d2-08e7-44b5-add0-a38f20f383f7",
        'include_player_ids' => array($token),
        'data' => $data,
        'contents' => $content,
        'headings' => $title
    );
    
    $fields = json_encode($fields);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $datas = json_encode($data['data'],true); 
   
    $data_form=array(
        'type'    => $type,
        'user_id' => $user_id,
        'message' => $message,
        'data'    => $datas,
        'title'   => $title['en'],
      );
    Notification::create($data_form);
}


function sendNotificationToCustomer($user,$title,$message,$data,$type) {  
    $title = array("en" => $title );
    $content = array("en" => $message);
    
    $fields = array(
        'app_id' => "4317a148-257e-4eb1-9262-3f4751406aaa",
        'include_player_ids' => array($user->notification_token),
        'data' => ['type'=>$type, 'data'=>$data ],
        'contents' => $content,
        'headings' => $title
    );

    $fields = json_encode($fields);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);

    $datas = json_encode($data,true); 
   
    $data_form=array(
        'type'    => $type,
        'user_id' => $user->id,
        'message' => $message,
        'data'    => $datas,
        'title'   => $title['en'],
    );
    Notification::create($data_form);
}

// Used in apis
function getServiceBookingDetail($booking_id) {
    $booking_data= ServiceBooking::find($booking_id);
    if(!empty($booking_data)) {
        if(!empty($booking_data->user_id)) {
            $booking_data["customer"] = users::find($booking_data->user_id,['id','name','email','phone_no']);
        }

        if(!empty($booking_data->assign_provider)) {
            $booking_data["provider"] = users::find($booking_data->assign_provider,['id','name','email','phone_no']);
        }

        if(!empty($booking_data->service_id)){
            $booking_data["service"] = ServiceManagement::find($booking_data->service_id);
            $booking_data["service_sub_category"] = Subcategory::where('parent_category',$booking_data->service_id)->get();
        }

        $booking_data['service_acknowledgement']=ServiceAcknowledgement::where('service_booking_id',$booking_data->id)->first();

        $booking_data['booking_price']=BookingPrice::where('booking_id',$booking_data->id)->get();
    }
    return $booking_data;
}

function Whatsapp_invoice($user_mob,$mediaUrl)
 {
 //$user_mob = '+917014594477';
	$sid  =   'AC960da78f26f781219c33c5094b39796f'; // self Account
    $token  =   'd7f13ef83f305c2391631535c2a4fb85'; //live
    $from   =   'whatsapp:+14155238886';
    $to   =   'whatsapp:+917014594477';
    $body   =   'Here is your invoice!';
    $uri  =   'https://api.twilio.com/2010-04-01/Accounts/'.$sid.'/Messages.json';
  
    $auth   =   $sid . ':' . $token;
    // post string (phone number format= +15554443333 ), case matters
    $fields =
    '&To=' .  urlencode( $to ) .
    '&From=' . urlencode( $from ) .
    '&Body=' . urlencode( $body ) .
    '&MediaUrl=' . urlencode($mediaUrl);
    // start cURL
    $res  =   curl_init();
    // set cURL options
    curl_setopt( $res, CURLOPT_URL, $uri );
    curl_setopt( $res, CURLOPT_POST, 3 ); // number of fields
    curl_setopt( $res, CURLOPT_POSTFIELDS, $fields );
    curl_setopt( $res, CURLOPT_USERPWD, $auth ); // authenticate
    curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); // don't echo
    // send cURL
    $result =   curl_exec( $res );
    $result =   json_encode($result);


    return $result;
}

function service_booking_data($id)
 {
 	$service_booking_data=ServiceBooking::where('id',$id)->first();
 	return $service_booking_data;
 }
 //titification
function total_booking($id)
 {
    $total_booking=ServiceBooking::where('user_id',$id)->where('status',5)->count();
    return $total_booking;
 }
  
?>