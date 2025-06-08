<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { return view('welcome'); });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('view:clear');
    $exitCode = Artisan::call('config:cache');
    return '<h1>Cache cleared</h1>';
});
Route::group([ "prefix" => "admin", "namespace" => "backend", "middleware" => ["prevent_back_history"] ], function(){
    Route::group([ "middleware" => ["adminlogout"] ], function(){
        Route::any('login', 'HomeController@login');
        Route::any('forgot_password', 'HomeController@forgot_password');
        Route::any('reset_password/{slug}', 'HomeController@reset_password');
    });
    Route::any('logout', 'HomeController@logout');
    Route::group([ "middleware" => ["adminlogin"] ], function(){

        /** Admin Dashboard Work Start **/
        Route::get('/', 'HomeController@index');
        Route::any('/profile_update', 'HomeController@profile_update');
        Route::post('/change_password', 'HomeController@change_password');
        Route::any('/global_settings', 'HomeController@global_settings');
        /** Admin Dashboard Work End **/

        /** Users Work Start **/
        Route::group([ "prefix" => "user"], function(){
            Route::get('/', 'UserController@index');
            Route::post('indexAjax', 'UserController@indexAjax');
            Route::any('create', 'UserController@create');
            Route::any('edit/{id}', 'UserController@edit');
            Route::get('view/{id}', 'UserController@view');
            Route::get('status_update/{id}/{status}', 'UserController@status_update');
            Route::post('status_update_all/{status}', 'UserController@status_update_all');
            Route::get('delete/{id}', 'UserController@delete');
            Route::post('delete_all', 'UserController@delete_all');
            Route::post('export/{type}', 'UserController@export');
        });


        /** Users Work End **/


          /** Drivers Work Start **/
        Route::group([ "prefix" => "driver"], function(){
            Route::get('/', 'DriverController@index');
            Route::post('indexAjax', 'DriverController@indexAjax');
            Route::any('create', 'DriverController@create');
            Route::any('edit/{id}', 'DriverController@edit');
            Route::get('view/{id}', 'DriverController@view');
            Route::get('status_update/{id}/{status}', 'DriverController@status_update');
            Route::post('status_update_all/{status}', 'DriverController@status_update_all');
            Route::get('delete/{id}', 'DriverController@delete');
            Route::post('delete_all', 'DriverController@delete_all');
            Route::post('export/{type}', 'DriverController@export');
        });

    
        /** Drivers Work End **/

        /** Sub Admins Work Start **/
        Route::group([ "prefix" => "sub_admin"], function(){
            Route::get('/', 'SubAdminController@index');
            Route::post('indexAjax', 'SubAdminController@indexAjax');
            Route::any('create', 'SubAdminController@create');
            Route::any('edit/{id}', 'SubAdminController@edit');
            Route::get('view/{id}', 'SubAdminController@view');
            Route::get('status_update/{id}/{status}', 'SubAdminController@status_update');
            Route::post('status_update_all/{status}', 'SubAdminController@status_update_all');
            Route::get('delete/{id}', 'SubAdminController@delete');
            Route::post('delete_all', 'SubAdminController@delete_all');
            Route::post('export/{type}', 'SubAdminController@export');
        });
        /** Sub Admins Work End **/
        
        /** CMS Page Work Start **/
        Route::group([ "prefix" => "cms_page"], function(){
            Route::get('/', 'CmsPageController@index');
            Route::post('indexAjax', 'CmsPageController@indexAjax');
            Route::any('create', 'CmsPageController@create');
            Route::any('edit/{id}', 'CmsPageController@edit');
            Route::get('view/{id}', 'CmsPageController@view');
            Route::get('delete/{id}', 'CmsPageController@delete');
            Route::get('status_update/{id}/{status}', 'CmsPageController@status_update');
        });
        /** CMS Page Work End **/

        /** Email Template Work Start **/
        Route::group([ "prefix" => "email_template"], function(){
            Route::get('/', 'EmailTemplateController@index');
            Route::post('indexAjax', 'EmailTemplateController@indexAjax');
            Route::any('create', 'EmailTemplateController@create');
            Route::any('edit/{id}', 'EmailTemplateController@edit');
            Route::get('view/{id}', 'EmailTemplateController@view');
            Route::get('delete/{id}', 'EmailTemplateController@delete');
            Route::get('status_update/{id}/{status}', 'EmailTemplateController@status_update');
        });
        /** Email Template Work End **/

        /** FAQ Work Start **/
        Route::group([ "prefix" => "faq"], function(){
            Route::get('/', 'FaqController@index');
            Route::post('indexAjax', 'FaqController@indexAjax');
            Route::any('create', 'FaqController@create');
            Route::any('edit/{id}', 'FaqController@edit');
            Route::get('view/{id}', 'FaqController@view');
            Route::get('delete/{id}', 'FaqController@delete');
            Route::get('status_update/{id}/{status}', 'FaqController@status_update');
        });
        /** FAQ Work End **/


        /** Blog Work Start **/
        Route::group([ "prefix" => "blog"], function(){
            Route::get('/', 'BlogController@index');
            Route::post('indexAjax', 'BlogController@indexAjax');
            Route::any('create', 'BlogController@create');
            Route::any('edit/{id}', 'BlogController@edit');
            Route::get('view/{id}', 'BlogController@view');
            Route::get('delete/{id}', 'BlogController@delete');
            Route::get('status_update/{id}/{status}', 'BlogController@status_update');
        });
        /** Blog Work End **/


        /** Email Template Work Start **/
        Route::group([ "prefix" => "support_enquiry"], function(){
            Route::get('/', 'SupportEnquiryController@index');
            Route::post('indexAjax', 'SupportEnquiryController@indexAjax');
            Route::any('create', 'SupportEnquiryController@create');
            Route::any('edit/{id}', 'SupportEnquiryController@edit');
            Route::get('view/{id}', 'SupportEnquiryController@view');
            Route::get('delete/{id}', 'SupportEnquiryController@delete');
            Route::get('status_update/{id}/{status}', 'SupportEnquiryController@status_update');
            Route::post('reply/{id}', 'SupportEnquiryController@reply');
        });
        /** Email Template Work End **/

        /** Email Template Work Start **/
        Route::group([ "prefix" => "enquiry"], function(){
            Route::get('/', 'EnquiryController@index');
            Route::post('indexAjax', 'EnquiryController@indexAjax');
            Route::any('create', 'EnquiryController@create');
            Route::any('edit/{id}', 'EnquiryController@edit');
            Route::get('view/{id}', 'EnquiryController@view');
            Route::get('delete/{id}', 'EnquiryController@delete');
            Route::get('status_update/{id}/{status}', 'EnquiryController@status_update');
            Route::post('reply/{id}', 'EnquiryController@reply');
        });
        /** Email Template Work End **/



         /** Testimonial Work Start **/
        Route::group([ "prefix" => "testimonial"], function(){
            Route::get('/', 'TestimonialController@index');
            Route::post('indexAjax', 'TestimonialController@indexAjax');
            Route::any('create', 'TestimonialController@create');
            Route::any('edit/{id}', 'TestimonialController@edit');
            Route::get('view/{id}', 'TestimonialController@view');
            Route::get('delete/{id}', 'TestimonialController@delete');
            Route::get('status_update/{id}/{status}', 'TestimonialController@status_update');
        });
        /** Testimonial Work End **/


             /** Banner Work Start **/
        Route::group([ "prefix" => "banner"], function(){
            Route::get('/', 'BannerController@index');
            Route::post('indexAjax', 'BannerController@indexAjax');
            Route::any('create', 'BannerController@create');
            Route::any('edit/{id}', 'BannerController@edit');
            Route::get('view/{id}', 'BannerController@view');
            Route::get('delete/{id}', 'BannerController@delete');
            Route::get('status_update/{id}/{status}', 'BannerController@status_update');
        });
        /** Banner Work End **/

              /** Banner Work Start **/
        Route::group([ "prefix" => "how-it-work"], function(){
            Route::get('/', 'WorkController@index')->name('how-it-work');
            Route::any('create', 'WorkController@create')->name('how-it-work-add');
            Route::any('edit/{id}', 'WorkController@edit')->name('how-it-work-edit');
            Route::get('view/{id}', 'WorkController@view')->name('how-it-work-view');
        });
        /** Banner Work End **/


             /** Master (Device Type) Work Start **/
        Route::group([ "prefix" => "devicetype"], function(){
            Route::get('/', 'DevicetypeController@index');
            Route::post('indexAjax', 'DevicetypeController@indexAjax');
            Route::any('create', 'DevicetypeController@create');
            Route::any('edit/{id}', 'DevicetypeController@edit');

           
        });
        /** Master (Device Type) Work End **/


            /** Master (Brands) Work Start **/
        Route::group([ "prefix" => "brands"], function(){
            Route::get('/', 'BrandController@index');
            Route::post('indexAjax', 'BrandController@indexAjax');
            Route::any('create', 'BrandController@create');
            Route::any('edit/{id}', 'BrandController@edit');
            Route::get('delete/{id}', 'BrandController@delete');
           
        });
        /** Master (Brands) Work End **/




         /** Master (series) Work Start **/
        Route::group([ "prefix" => "series"], function(){
            Route::get('/', 'SeriesController@index');
            Route::post('indexAjax', 'SeriesController@indexAjax');
            Route::any('create', 'SeriesController@create');
            Route::any('edit/{id}', 'SeriesController@edit');
            Route::any('/devicetype/brands', 'SeriesController@device_brands');
        });

       
        /** Master (series) Work End **/


         /** Master (modals) Work Start **/
        Route::group([ "prefix" => "modals"], function(){
            Route::get('/', 'ModalController@index');
            Route::post('indexAjax', 'ModalController@indexAjax');
            Route::any('create', 'ModalController@create');
            Route::any('edit/{id}', 'ModalController@edit');
            Route::any('/devicetype/brands', 'SeriesController@device_brands');
            Route::any('/devicetype/brands/series', 'ModalController@device_brands_series');
            Route::get('delete/{id}', 'ModalController@delete');
        });


        /** Master (modals-variants) Work Start **/
        Route::group([ "prefix" => "modal-variants"], function(){
            Route::get('/', 'VariantController@index');
            Route::any('create', 'VariantController@create')->name('variant-create');
            Route::any('edit/{id}', 'VariantController@edit')->name('variant-edit');
            Route::get('delete/{id}', 'VariantController@delete')->name('variant-delete');
            Route::any('get-series-record-by-id/{id}', 'QuestionController@GetSeriesRecord');
            Route::any('get-brand-record-by-id/{id}', 'QuestionController@GetBrandRecord');
            Route::any('get-model-record-by-id/{id}', 'QuestionController@GetModelRecord');
        });

        Route::group([ "prefix" => "question"], function(){
            Route::any('/', 'QuestionController@index')->name('question-list');
            Route::post('indexAjax', 'QuestionController@indexAjax');
            Route::any('create', 'QuestionController@create')->name('question-create');
            Route::any('edit/{id}', 'QuestionController@edit')->name('question-edit');
            Route::get('delete/{id}', 'QuestionController@delete')->name('question-delete');
            Route::any('/devicetype/brands', 'SeriesController@device_brands');
            Route::any('/devicetype/brands/series', 'ModalController@device_brands_series');
            Route::get('view/{id}', 'QuestionController@view')->name('question-view');
            Route::any('get-series-record-by-id/{id}', 'QuestionController@GetSeriesRecord');
            Route::any('get-brand-record-by-id/{id}', 'QuestionController@GetBrandRecord');
            Route::any('get-model-record-by-id/{id}', 'QuestionController@GetModelRecord');
        });

        /** Master (modals-variants) Work Start **/
        Route::group([ "prefix" => "sell-now-enquiry"], function(){
            Route::get('/', 'SellNowEnquiryController@index')->name('sell-now-enquiry');
            Route::get('delete/{id}', 'SellNowEnquiryController@delete')->name('sell-now-enquiry-delete');
            Route::get('view/{id}', 'SellNowEnquiryController@view')->name('sell-now-enquiry-view');
        });


           /** Partner Work Start **/
        Route::group([ "prefix" => "partner"], function(){
            Route::get('/', 'PartnerController@index');
            Route::post('indexAjax', 'PartnerController@indexAjax');
            Route::any('create', 'PartnerController@create');
            Route::any('edit/{id}', 'PartnerController@edit');
            Route::get('delete/{id}', 'PartnerController@delete');
           
        });
        /** Partner Work End **/
    });
});

Route::group([ "namespace" => "frontend", "middleware" => ["prevent_back_history"] ], function(){
    //Route::get('/', function(){ return view('frontend/home'); });
    Route::get('/', 'HomeController@index');
    /** CMS Pages Work Start **/
    Route::any('/blogs', 'BlogController@bloglist')->name('blog-list');
    Route::any('/blog-detail/{id}/{slug}', 'BlogController@blogdetail')->name('blog-detail');
    Route::any('/contact_us', 'CmsPagesController@contact_us')->name('contact-us');
    Route::get('/privacy_policy', 'CmsPagesController@privacy_policy');
    Route::get('/careers', 'CmsPagesController@careers');
    Route::any('/help_support', 'CmsPagesController@help_support');
    Route::get('/accessibility', 'CmsPagesController@accessibility');
    Route::get('/terms_conditions', 'CmsPagesController@terms_conditions');
    Route::get('/aboutus', 'CmsPagesController@aboutus');
      Route::get('/faq', 'CmsPagesController@faq');
    /** CMS Pages Work End **/



   /** Sell Module Work Start **/
    Route::group([ "prefix" => "sellnow"], function(){
        Route::get('/', 'SellController@index')->name('sellnow');
        Route::get('brands/{id}', 'SellController@brandslist')->name('brand-list');
        Route::any('brands/series/{id}', 'SellController@serieslist')->name('series-list');
        Route::any('brands/series/model/{id}', 'SellController@modellist')->name('model-list');
        Route::any('brands/series/model/variant/{id}', 'SellController@variantlist')->name('variant-list');
        Route::any('summary-of-sell-mobile/{id}', 'SellController@Summary')->name('summary-of-sell-mobile');
        Route::any('question-answer-for-device/{id}', 'SellController@Question')->name('question-answer');
        Route::any('sell-now-enquiry', 'SellController@SellNowEnquiry')->name('sell-now-enquiry');

      }); 
    /** Sell Module Work End **/


    /** Auth Module Work Start **/

    Route::post('users/login', 'UserController@login');
    Route::post('users/register', 'UserController@register');
    Route::post('users/otpverify', 'UserController@verification');
    Route::any('users/profile', 'UserController@profile')->name('users-profile-update');
   // Route::post('users/profile', 'UserController@profileupdate');
    Route::get('users/logout', 'UserController@logout');


    /** Auth Module Work End **/


});



Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});


// Route::get('/', function () { return view('welcome'); });