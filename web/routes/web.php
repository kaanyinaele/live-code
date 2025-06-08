<?php
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/','IndexController@Index')->middleware('prevent-back-history')->name('/');
Route::get('login','UserController@UserLoginForm')->name('login');
Route::post('login','UserController@login')->name('login');
Route::get('email_verification/{id}','UserController@email_varification')->name('email_verification');
Route::any('get-sub-category',"MyAppointmentController@get_sub_category")->name('get_sub_category');

//cms page frontend
Route::group(['middleware' => ['prevent-back-history']], function ()
 {
	Route::get('aboutus','Cms_faqController@aboutus')->name('aboutus');
	Route::get('contactus','Cms_faqController@contactus')->name('contactus');
	Route::get('faq','Cms_faqController@faq')->name('question-answer');
	Route::post('contactus','Cms_faqController@contact')->name('contact');
	Route::get('term-condition','Cms_faqController@term_condition')->name('term-condition');
	Route::get('privacy-policy','Cms_faqController@privacy_policy')->name('privacy-policy');
	Route::get('professionals','Cms_faqController@professionals')->name('professionals');
	Route::get('why-choose-ogaworkman','Cms_faqController@why_choose')->name('why-choose-ogaworkman');
	Route::get('download-app','Cms_faqController@download_app')->name('download-app');
	Route::get('how-does-it-work','Cms_faqController@howitwork')->name('how-does-it-work');
	Route::get('blog-list','Cms_faqController@blog_list')->name('blog-list');
	Route::get('blog-detail/{id}','Cms_faqController@blog_detail')->name('blog-detail');
});


Route::get('start-service/{id}','MyAppointmentController@start_service')->name('start-service');
Route::get('end-service/{id}','MyAppointmentController@end_service')->name('end-service');
//..................socialite
// Route::get('facebook', function () {

//     return view('frontend/user/facebook');

// });
//facebook
// Route::get('login/{provider}', 'FacebookController@redirectToProvider');
// Route::get('login/{provider}/callback', 'FacebookController@handleProviderCallback');
//twitter


Route::get('auth/{provider?}', 'FacebookController@redirectToFacebook');
Route::get('auth/{provider?}/callback', 'FacebookController@handleFacebookCallback');

//...........................................................................
Route::group(['middleware' => ['user_outer','web', 'prevent-back-history']], function () {
    //registration
	Route::get('registration','UserController@ShowRegistration')->name('registration');
	Route::post('registration','UserController@Registration')->name('registration');	
	//forget password
	Route::get('forgotpassword','UserController@forgetPassword_form')->name('forgotpassword');
	Route::get('resetpassword/{id}','UserController@resetPassword_form')->name('resetpassword');	
	Route::get('send_mail','UserController@CheckSendmail')->name('send_mail');
	//reset password view
	Route::post('reset/{id}','UserController@Reset')->name('reset_password');
});
//...........................................................................................
Route::group(['middleware' => ['user', 'prevent-back-history']], function () {
	Route::any('servicedetail/{id}','JobManagementController@service_detail')->name('servicedetail');
	Route::any('service-booking/{id}','JobManagementController@service_booking')->name('service-booking');
	//after price assign call this urls
	Route::any('service-booking_/{id}','MyAppointmentController@after_service_booking')->name('request/service-booking');
	Route::post('service-request/{id}','JobManagementController@service_booking')->name('servicerequest');

	Route::any('logout','UserController@logout')->name('logout');	
	// Route::get('rate-review','MyAppointmentController@rate_review')->name('rating');
	Route::any('rate','RateController@rate')->name('rate');

	Route::get('changepassword','UserController@changePassword_form')->name('changepassword');
	Route::post('change_password','UserController@changePassword')->name('change_password');
	Route::get('account-setting','UserController@accountSetting_form')->name('account_setting');
	Route::post('accountsetting','UserController@accountSetting')->name('accountsetting');
	Route::get('payment_setting','PaymentController@paymenttSetting_form')->name('payment_setting');
	Route::get('payment','PaymentController@payment_form')->name('payment');
	Route::get('payment-card/addcard','PaymentController@addnew_card_form')->name('addcard');
	Route::post('addcard','PaymentController@addnew_card')->name('add-card');
	Route::get('payment-card/card-defalut/{id}','PaymentController@card_defalut')->name('card-defalut');
	Route::get('appointments','MyAppointmentController@my_appointments')->name('appointments');
	Route::get('payment-card/delete/{id}','PaymentController@delete')->name('delete');
	Route::get('payment-card/edit/{id}','PaymentController@edit')->name('edit');
	Route::post('update/{id}','PaymentController@update')->name('update');	
	//payment
	Route::post('payment','PayController@payment')->name('payment');	

	Route::get('appointments/ajax/{status}', array(
		    'as' => 'appointments.status', 
		    'uses' => 'MyAppointmentController@getItemStatus'
		))->where('status', '[0-9]');
	//get booking id in larvel for shoe price data to user
	Route::get('price-data/{id}', 'BookPriceController@getAjax');

	Route::get('upcoming-request/detail/{id}','MyAppointmentController@upcoming_request_detail')->name('upcoming-request/detail');
    Route::get('provider_profile/{id}','MyAppointmentController@provider_profile_form')->name('provider_profile');
	Route::get('booking/cancel/{id}','MyAppointmentController@booking_cancel')->name('booking/cancel');
});
	
	/* ------------------- back end user routes---------------------------------------------------*/
	Route::get('/admin/login','backend\AdminController@LoginForm')->name('admin.login');
	Route::get('admin','backend\AdminController@LoginForm')->name('admin');
	Route::post('adminlogin','backend\AdminController@adminLogin')->name('adminlogin');
	//forgat password.....................................................................
Route::group(['prefix'=>'admin','middleware' => ['outer']], function () {
	//forget password
	Route::get('forgetpassword','backend\AdminController@ForgetPassword')->name('forgetpassword');
	Route::get('sendmail','backend\AdminController@CheckSendmail')->name('sendmail');
	//reset password view
	Route::get('resetpassword/{id}','backend\AdminController@ResetPassword')->name('resetpassword');
	Route::post('reset/{id}','backend\AdminController@Reset')->name('reset');
});

Route::group(['prefix'=>'admin','middleware' => ['admin', 'prevent-back-history']], function () {
	Route::post('adminlogout','backend\AdminController@adminlogout')->name('adminlogout');
	Route::get('dashboard','backend\AdminController@dashboard')->name('dashboard');
	//providers
	Route::Get('provider','backend\Admin_ProviderController@provider_list')->name('provider');
	Route::any('provider/add','backend\Admin_ProviderController@provider_add_form')->name('provider/add');
	Route::Get('provider/status/{id}/{status}','backend\Admin_ProviderController@provider_Status')->name('provider/status');

	Route::post('provider/add','backend\Admin_ProviderController@provider_add')->name('provider/add');
	Route::any('provider/delete/{id}/{page}','backend\Admin_ProviderController@delete_provider')->name('provider/delete');
	Route::get('provider/view/{id}','backend\Admin_ProviderController@view_provider')->name('provider/view');
	Route::get('provider/edit/{id}/{page}','backend\Admin_ProviderController@provider_edit')->name('provider/edit');
	Route::post('provider/update/{id}','backend\Admin_ProviderController@provider_update')->name('provider/update');
	Route::post('provider','backend\Admin_ProviderController@search_provider')->name('provider/search');

	//awating provider
	Route::Get('awaiting-provider','backend\Admin_ProviderController@awaiting_provider_list')->name('awaiting-provider');
	Route::Get('awaiting-provider/accept/{id}','backend\Admin_ProviderController@request_accept')->name('awaiting-provider/accept');
	Route::Get('awaiting-provider/reject/{id}','backend\Admin_ProviderController@request_reject')->name('awaiting-provider/reject');
	Route::get('awaiting-provider/view/{id}','backend\Admin_ProviderController@awaiting_view_provider')->name('awaiting-provider/view');
	Route::post('awaiting-provider','backend\Admin_ProviderController@awaiting_provider_search')->name('awaiting-provider/search');
	//admin profile
	Route::get('profile','backend\AdminController@EditProfileForm')->name('edit/profile');
	Route::post('update/profile/{id}','backend\AdminController@UpdatepProfile')->name('update/profile');
	Route::get('user','backend\AdminController@UserList')->name('users');

	Route::any('delete/user/{id}/{page}','backend\AdminController@DeleteUser')->name('delete/user');
	Route::get('users/status/{id}/{status}','backend\AdminController@UserStatus')->name('users/status');
	
	Route::get('view/appointment/{id}','backend\AdminController@view_appointment')->name('view/appointment');
	Route::post('user','backend\AdminController@SearchUser')->name('user_search');
	//change password admin
	Route::post('change/pass','backend\AdminController@ChangePassword')->name('change/pass');
	//add user
	Route::get('user/add','backend\AdminController@AddUserForm')->name('add/user');
	Route::post('add/registration','backend\AdminController@addregistration')->name('add/registration');
	//update user
	Route::get('user/edit/{id}/{page}','backend\AdminController@UpdateUserForm')->name('edit/user');
	Route::post('update/user/{id}','backend\AdminController@UpdateUser')->name('update/user');
	 //view/user
	Route::get('user/view/{id}','backend\AdminController@ViewUserForm')->name('view/user');

	//service module management service/management
	Route::get('add/services','backend\ServiceManagementController@AddService_Form')->name('add/services');
	Route::post('add/service','backend\ServiceManagementController@AddService')->name('add/service');
	Route::get('service','backend\ServiceManagementController@ServiceManagementIndex')->name('service/index');
	Route::post('service','backend\ServiceManagementController@SearchService')->name('service/index');
	Route::get('service/view/{id}','backend\ServiceManagementController@ViewSerive')->name('view/service');
	Route::post('delete/service/{id}/{page}','backend\ServiceManagementController@DeleteService')->name('delete/service');
	Route::get('service/edit/{id}/{page}','backend\ServiceManagementController@EditService')->name('edit/service');
	Route::post('update/service/{id}','backend\ServiceManagementController@UpdateSerive')->name('update/service');
	Route::get('category/status/{id}/{status}','backend\ServiceManagementController@CategoryStatus')->name('category/status');
	//sub category
	Route::get('sub-category/add','backend\SubCategoryController@add_form')->name('sub-category/add');
	Route::post('sub-category/add','backend\SubCategoryController@Add')->name('sub-category/add');
	Route::get('sub-category','backend\SubCategoryController@Index')->name('sub-category');
	Route::post('sub-category','backend\SubCategoryController@search')->name('sub-category');
	Route::get('sub-category/edit/{id}/{page}','backend\SubCategoryController@Edit')->name('sub-category/edit');
	Route::get('sub-category/view/{id}','backend\SubCategoryController@view')->name('sub-category/view');
	Route::post('sub-category/update/{id}','backend\SubCategoryController@update')->name('sub-category/update');
	Route::post('sub-category/delete/{id}/{page}','backend\SubCategoryController@Delete')->name('sub-category/delete');
	Route::get('sub-category/status/{id}/{status}','backend\SubCategoryController@Status')->name('sub-category/status');
	//location
	Route::get('location','backend\LocationController@index')->name('location');
	Route::get('location/add','backend\LocationController@add_form')->name('location/add');
	Route::post('location/add','backend\LocationController@add')->name('add');
	Route::get('location/status/{id}/{status}','backend\LocationController@Status')->name('location/status');
	Route::post('location/delete/{id}/{page}','backend\LocationController@delete')->name('location/delete');
	Route::get('location/edit/{id}/{page}','backend\LocationController@edit')->name('location/edit');
	Route::post('location/edit/{id}','backend\LocationController@update')->name('location/update');
	Route::post('location','backend\LocationController@search')->name('search');
	//..slideriamge
	Route::get('sliderimage','backend\SliderimageController@index_Sliderimage')->name('sliderimage');
	Route::post('sliderimage','backend\SliderimageController@Search_Sliderimage')->name('sliderimage ');
	Route::any('sliderimage/add','backend\SliderimageController@Addform_Sliderimage')->name('sliderimage/add');
	Route::post('add_sliderimage','backend\SliderimageController@Add_Sliderimage')->name('add_sliderimage');
	Route::post('delete/sliderimage/{id}','backend\SliderimageController@Delete_Sliderimage')->name('delete/sliderimage');
	Route::get('sliderimage/edit/{id}','backend\SliderimageController@EditSliderimage')->name('edit/sliderimage');
	Route::post('update/sliderimage/{id}','backend\SliderimageController@UpdateSliderimage')->name('update/sliderimage');
	Route::get('sliderimage_status/{id}/{status}','backend\SliderimageController@Sliderimage_Status')->name('sliderimage_status');
	//cms page
	Route::get('cmspage','backend\CmspageController@CmspageIndex')->name('cmspage');
	Route::get('cmspage/view/{id}','backend\CmspageController@CmspageView')->name('cms/view');
	Route::get('cmspage/edit/{id}','backend\CmspageController@CmspageEdit')->name('cmspage/edit');
	Route::post('cmspage/update/{id}','backend\CmspageController@CmspageUpdate')->name('cmspage/update');
	//faq
	Route::get('faq','backend\FaqController@FaqIndex')->name('faq');
	//search
	Route::post('faq','backend\FaqController@FaqSearch')->name('faq');
	Route::get('faq/add','backend\FaqController@Faq_Addform')->name('faq/add');
	Route::post('faq/add','backend\FaqController@Faqadd')->name('faq/add');

	Route::get('faq/edit/{id}/{page}','backend\FaqController@FaqEdit')->name('faq/edit');
	Route::get('faq/view/{id}','backend\FaqController@Faqview')->name('faq/view');
	Route::post('faq/update/{id}','backend\FaqController@Faqupdate')->name('faq/update');
	Route::post('faq/delete/{id}/{page}','backend\FaqController@FaqDelete')->name('faq/delete');
	Route::get('faq/status/{id}/{status}','backend\FaqController@FaqStatus')->name('faq/status');
	//blog
	Route::get('blog','backend\BlogController@index')->name('blog');
	Route::post('blog','backend\BlogController@search')->name('blog_search');
	Route::get('blog/add','backend\BlogController@add_form')->name('blog/add');
	Route::post('blog/add','backend\BlogController@add')->name('blog_add');
	Route::get('blog/edit/{id}/{page}','backend\BlogController@edit')->name('blog/edit');
	Route::get('blog/view/{id}','backend\BlogController@view')->name('blog/view');
	Route::post('blog/update/{id}','backend\BlogController@update')->name('blog_update');
	Route::post('blog/delete/{id}/{page}','backend\BlogController@delete')->name('blog/delete');
	Route::get('blog/status/{id}/{status}','backend\BlogController@status')->name('blog/status');
	Route::post('ckeditor/upload','backend\BlogController@upload')->name('ckeditor.upload');
	// Route::post('ckeditor/upload', 'CkeditorController@upload')->name('ckeditor.upload');

	//emailtemplate
	Route::get('emailtemplate','backend\EmailtemplateController@IndexEmailTemplate')->name('emailtemplate');
	Route::get('emailtemplate/view/{id}','backend\EmailtemplateController@ViewEmailTemplate')->name('emailtemplate/view');
	Route::get('emailtemplate/edit/{id}','backend\EmailtemplateController@EditEmailTemplate')->name('emailtemplate/edit');
	Route::post('emailtemplate/update/{id}','backend\EmailtemplateController@UpdateEmailTemplate')->name('emailtemplate/update');
	//global setting
	Route::get('globalsetting','backend\GlobalsettingController@EditPersonalinfo')->name('globalsetting');
	Route::post('globalsetting/update/{id}','backend\GlobalsettingController@UpdatePersonalinfo')->name('globalsetting/update');
	Route::post('siteinformation/update','backend\GlobalsettingController@UpdateSiteinformation')->name('siteinformation/update');
	Route::post('socaillinks/update','backend\GlobalsettingController@UpdateSocaillinks')->name('socaillinks/update');
	Route::post('paymentmode/update','backend\GlobalsettingController@paymentmode')->name('paymentmode/update');
	//query-support
	Route::get('enquiry','backend\EnquiryController@index')->name('enquiry');
	Route::post('enquiry','backend\EnquiryController@search')->name('enquiry');
	Route::get('enquiry/reply/{id}','backend\EnquiryController@enquiry_reply')->name('enquiry/reply');
	Route::post('enquiry/reply/{id}','backend\EnquiryController@enquiry_reply_store')->name('enquiry/reply');
	Route::get('enquiry/view/{id}','backend\EnquiryController@enquiry_view')->name('enquiry/view');
	//booking 
	Route::get('booking','backend\BookingController@index')->name('booking');
	Route::post('booking','backend\BookingController@search')->name('booking');
	Route::get('booking/view/{id}','backend\BookingController@view')->name('booking/view');
	Route::post('booking/select-provider','backend\BookingController@select_provider')->name('booking/select-provider');

    
	// and request booking
	Route::get('service-request','backend\RequestBookingController@index')->name('service-request');
	Route::post('service-request','backend\RequestBookingController@search')->name('service-request');
	Route::get('service-request/view/{id}','backend\RequestBookingController@view')->name('service-request/view');
	Route::post('service-request/send-price','backend\RequestBookingController@send_price')->name('service-request/send-price');

	//report
	Route::get('report-user','backend\ReportController@user_report')->name('report-user');
	Route::any('report-user','backend\ReportController@user_search')->name('report-usersearch');

	Route::get('report-provider','backend\ReportController@provider_report')->name('report-provider');
	Route::get('report-booking','backend\ReportController@booking_report')->name('report-booking');
	Route::post('report-booking','backend\ReportController@booking_search')->name('report-bookingsearch');
	Route::post('report-provider','backend\ReportController@provider_search')->name('report-providersearch');
	Route::post('report-user','backend\ReportController@user_search')->name('report-usersearch');

	// Route::get('download/csv','backend\ReportController@download_csv')->name('download/csv');
	// Route::get('dynamic_pdf/pdf', 'backend\ReportController@pdf')->name('dynamic_pdf/pdf');
	

	
});






// Route::get('send_message', function(){
// 	$to_email = '+917014594477';
// 	$mediaUrl = url('/')."/public/invoices/invoice-154.pdf";

// 	//dd($mediaUrl);

// 	 $sid  =   'AC960da78f26f781219c33c5094b39796f'; // self Account
//     $token  =   'd7f13ef83f305c2391631535c2a4fb85'; //live
//     $from   =   'whatsapp:+14155238886';
//     $to   =   'whatsapp:+917014594477';
//     $body   =   'Here is your invoice!';
//     $uri  =   'https://api.twilio.com/2010-04-01/Accounts/'.$sid.'/Messages.json';
  
//     $auth   =   $sid . ':' . $token;
//     // post string (phone number format= +15554443333 ), case matters
//     $fields =
//     '&To=' .  urlencode( $to ) .
//     '&From=' . urlencode( $from ) .
//     '&Body=' . urlencode( $body ) .
//     '&MediaUrl=' . urlencode($mediaUrl);
//     // start cURL
//     $res  =   curl_init();
//     // set cURL options
//     curl_setopt( $res, CURLOPT_URL, $uri );
//     curl_setopt( $res, CURLOPT_POST, 3 ); // number of fields
//     curl_setopt( $res, CURLOPT_POSTFIELDS, $fields );
//     curl_setopt( $res, CURLOPT_USERPWD, $auth ); // authenticate
//     curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); // don't echo
//     // send cURL
//     $result =   curl_exec( $res );
//     $result =   json_encode($result);


//     return $result;	
// });







