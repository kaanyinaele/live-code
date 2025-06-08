<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(array("middleware"=>"cors"),function(){
	//Customer routes
	Route::group(array("namespace"=>"AppController",'prefix'=>'customer'),function(){
		Route::post("customer_login","CustomerController@customer_login");
		Route::post("signup_verification","CustomerController@signup_verification");
		Route::post("customer_signup","CustomerController@customer_signup");
		Route::post("customer_resend_otp","CustomerController@customer_resend_otp");
		Route::post("customer_forgot_password","CustomerController@customer_forgot_password");
		Route::post("customer_check_forgot_password","CustomerController@customer_check_forgot_password");
		Route::post("customer_reset_password","CustomerController@customer_reset_password");
		Route::post("customer_data","CustomerController@customer_data");
		Route::post("customer_all_category_data","CustomerController@customer_all_category_data");
		Route::post("customer_category_data","CustomerController@customer_category_data");
		Route::post("customer_category_detail","CustomerController@customer_category_detail");
		Route::post("customer_service_booking","CustomerController@customer_service_booking");
		Route::post("customer_profile_update","CustomerController@customer_profile_update");
		Route::post("customer_profile_details","CustomerController@customer_profile_details");
		Route::post("customerImageUpload","CustomerController@customerImageUpload");
		Route::post("facebook_login","CustomerController@facebookLogin");
		Route::post("twitter_login","CustomerController@twitterLogin");
		Route::post("change_password","CustomerController@changePassword");
		Route::post("customer_bookings","CustomerController@customerBookings");
		Route::post("service_booking_detail","CustomerController@serviceBookingDetail");
		Route::post("confirm_start_end_service","CustomerController@confirmStartEndService");
		Route::post("book_or_cancel_service","CustomerController@bookOrCancelService");
		Route::post("notifications","CustomerController@notifications");
		Route::post("notifications_mark_read","CustomerController@notificationsMarkRead");
		Route::post("faq","CustomerController@faq");
		Route::post("transaction","CustomerController@transaction");
		Route::post("add_update_card","CustomerController@addUpdateCard");
		Route::post("payment_card","CustomerController@paymentCard");
		Route::post("set_default_payment_card","CustomerController@setDefaultPaymentCard");
		Route::post("delete_payment_card","CustomerController@deletePaymentCard");
		Route::post("payment_card_detail","CustomerController@paymentCardDetail");
		Route::post("logout","CustomerController@logout");
		Route::post("charge_paypal","CustomerController@chargePaypal");
	});


	//Provider routes
	Route::group(array("namespace"=>"AppController"),function(){
		Route::post("provider_login","ProviderController@provider_login");
		Route::post("provider_signup","ProviderController@provider_signup");
		Route::post("provider_signup_verification","ProviderController@provider_signup_verification");
		Route::post("provider_resend_otp","ProviderController@provider_resend_otp");
		Route::post("provider_data","ProviderController@provider_data");
		Route::post("provider_forgot_password","ProviderController@provider_forgot_password");
		Route::post("provider_check_forgot_password","ProviderController@provider_check_forgot_password");
		Route::post("provider_reset_password","ProviderController@provider_reset_password");
		Route::post("provider_get_all_caterory","ProviderController@provider_get_all_caterory");
		Route::post("provider_booking_details","ProviderController@provider_booking_details");
		Route::post("provider_userImageUpload","ProviderController@provider_userImageUpload");
		Route::post("provider_profile_update","ProviderController@provider_profile_update");
		Route::post("provider_terms_and_conditions","ProviderController@termsAndConditions");
		Route::post("provider_change_password","ProviderController@providerChangePassword");
		Route::post("provider_logout","ProviderController@providerLogout");
		Route::post("start_end_service","ProviderController@startEndService");
		Route::post("test_notification","ProviderController@testNotification");
		Route::post("provider_finished_service_data","ProviderController@finishedServiceData");
		Route::post("provider_notifications","ProviderController@providerNotifications");
		Route::post("provider_notifications_mark_read","ProviderController@providerNotificationsMarkRead");
	});

	// Route::group(array("namespace"=>"AppController"),function(){
	// 	Route::post("customer_login","CustomerController@customer_login");
	// 	Route::post("signup_verification","CustomerController@signup_verification");
	// 	Route::post("customer_signup","CustomerController@customer_signup");
	// 	Route::post("customer_resend_otp","CustomerController@customer_resend_otp");
	// 	Route::post("customer_forgot_password","CustomerController@customer_forgot_password");
	// 	Route::post("customer_check_forgot_password","CustomerController@customer_check_forgot_password");
	// 	Route::post("customer_reset_password","CustomerController@customer_reset_password");
	// 	Route::post("customer_data","CustomerController@customer_data");
	// 	Route::post("customer_all_category_data","CustomerController@customer_all_category_data");
	// 	Route::post("customer_category_data","CustomerController@customer_category_data");
	// 	Route::post("customer_category_detail","CustomerController@customer_category_detail");
	// 	Route::post("customer_service_booking","CustomerController@customer_service_booking");
	// 	Route::post("customer_profile_update","CustomerController@customer_profile_update");
	// 	Route::post("customer_profile_details","CustomerController@customer_profile_details");
	// 	Route::post("customerImageUpload","CustomerController@customerImageUpload");
		
	// 	/*Provide Route Start Here*/
	// 	Route::post("provider_login","ProviderController@provider_login");
	// 	Route::post("provider_signup","ProviderController@provider_signup");
	// 	Route::post("provider_signup_verification","ProviderController@provider_signup_verification");
	// 	Route::post("provider_resend_otp","ProviderController@provider_resend_otp");
	// 	Route::post("provider_data","ProviderController@provider_data");
	// 	Route::post("provider_forgot_password","ProviderController@provider_forgot_password");
	// 	Route::post("provider_check_forgot_password","ProviderController@provider_check_forgot_password");
	// 	Route::post("provider_reset_password","ProviderController@provider_reset_password");
	// 	Route::post("provider_get_all_caterory","ProviderController@provider_get_all_caterory");
	// 	Route::post("provider_booking_details","ProviderController@provider_booking_details");
	// 	Route::post("provider_userImageUpload","ProviderController@provider_userImageUpload");
	// 	Route::post("provider_profile_update","ProviderController@provider_profile_update");
	// 	Route::post("provider_terms_and_conditions","ProviderController@termsAndConditions");
	// 	Route::post("provider_change_password","ProviderController@providerChangePassword");
	// 	Route::post("provider_logout","ProviderController@providerLogout");
	// 	Route::post("start_end_service","ProviderController@startEndService");
	// 	Route::post("test_notification","ProviderController@testNotification");
	// 	Route::post("provider_finished_service_data","ProviderController@finishedServiceData");
	// 	Route::post("provider_notifications","ProviderController@providerNotifications");
	// 	Route::post("provider_notifications_mark_read","ProviderController@providerNotificationsMarkRead");
	// 	/*Provide Route End Here*/
	//});
});
