<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use Validator;
use Hash;
use Cookie;
use Auth;

class UserApiController extends CommonController{

    public function __construct(Request $request){
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        app()->setLocale($lang);
    }

    public function login(Request $request){
        $rules      =   [ 
                            "mobile_number"     =>  "required|regex:/^\+?[0-9]{7,14}$/",
                        ];
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        $messages   =   ["mobile_number.regex" => __('apiMessages.mobile_number_regex_validation')];
        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){ 
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_number');
            $res['response']    =   [ 
                                        "errors"    =>  $validator->errors(),
                                        "data"      =>  (object)[],
                                    ];
            return response($res);
        }
        $mobile_number  =   $request['mobile_number'];
        if(strpos($mobile_number, "+") === false){ $mobile_number = "+".$mobile_number; }
        $record     =   Users::where("mobile_number",$mobile_number)->where("role_id",2)->where("is_delete",0)->first();
        if(empty($record)){
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.mobile_number_not_exist');
            $res['response']    =   [ 
                                        "errors"    =>  ["mobile_number" => [__('apiMessages.mobile_number_not_exist')]],
                                        "data"      =>  (object)[],
                                    ];
            return response($res);
        }else{
            if($record->status == 0){
                $res['status']      =   0;
                $res['message']     =   __('apiMessages.user_status_inactive');
                $res['response']    =   [ 
                                            "errors"    =>  ["mobile_number" => [__('apiMessages.user_status_inactive')]],
                                            "data"      =>  (object)[],
                                        ];
                return response($res);
            }else{
                $otp    =   getOtp();
                $otp_time = date("Y-m-d H:i:s");
                twilioSms($otp,$mobile_number);
                Users::where("mobile_number",$mobile_number)->where("role_id",2)->update(["app_otp"=>$otp, "app_otp_time" => $otp_time]);
                $res['status']      =   1;
                $res['message']     =   __('apiMessages.otp_sent_successfully');
                $res['response']    =   [ 
                                            "errors"    =>  (object)[],
                                            "data"      =>  ["mobile_number" => $mobile_number] 
                                        ];
                return response($res);
            }
        }
    }

    public function verify_otp(Request $request){
        $rules      =   [ 
                            "mobile_number"     =>  "required|regex:/^\+?[0-9]{7,14}$/",
                            "otp"               =>  "required"
                        ];
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        $messages   =   ["mobile_number.regex" => __('apiMessages.mobile_number_regex_validation')];
        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){ 
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_number');
            $res['response']    =   [ 
                                        "errors"    =>  $validator->errors(),
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }
        $mobile_number  =   $request['mobile_number'];
        $otp            =   $request['otp'];
        if(strpos($mobile_number, "+") === false){ $mobile_number = "+".$mobile_number; }
        $record     =   Users::where("mobile_number",$mobile_number)->where("role_id",2)->where("is_delete",0)->first();
        if(empty($record)){
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.mobile_number_not_exist');
            $res['response']    =   [ 
                                        "errors"    =>  ["mobile_number" => [__('apiMessages.mobile_number_not_exist')]],
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }else{
            if($record->status == 0){
                $res['status']      =   0;
                $res['message']     =   __('apiMessages.user_status_inactive');
                $res['response']    =   [ 
                                            "errors"    =>  ["mobile_number" => [__('apiMessages.user_status_inactive')]],
                                            "data"      =>  (object)[] 
                                        ];
                return response($res);
            }else{
                if($record->app_otp != $otp){
                    $res['status']      =   0;
                    $res['message']     =   __('apiMessages.otp_not_match');
                    $res['response']    =   [ 
                                                "errors"    =>  ["otp" => [__('apiMessages.otp_not_match')]],
                                                "data"      =>  (object)[]
                                            ];
                    return response($res);
                }elseif ( ((strtotime(date("Y-m-d H:i:s")) - strtotime($record->app_otp_time)) / 60) > 15 ) {
                    $res['status']      =   0;
                    $res['message']     =   __('apiMessages.otp_expired');
                    $res['response']    =   [ 
                                                "errors"    =>  ["otp" => [__('apiMessages.otp_expired')]],
                                                "data"      =>  (object)[] 
                                            ];
                    return response($res);
                }else{
                    Users::where("mobile_number",$mobile_number)->where("role_id",2)->update(["app_otp"=>null, "app_otp_time" => null]);
                    $res['status']      =   1;
                    $res['message']     =   __('apiMessages.otp_verified_successfully');
                    $res['response']    =   [ 
                                                "errors"    =>  (object)[],
                                                "data"      =>  ["mobile_number" => $mobile_number, "user_data" => $record] 
                                            ];
                    return response($res);
                }
            }
        }
    }

    public function resend_otp(Request $request){
        $rules      =   [ 
                            "mobile_number"     =>  "required|regex:/^\+?[0-9]{7,14}$/",
                        ];
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        $messages   =   ["mobile_number.regex" => __('apiMessages.mobile_number_regex_validation')];
        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){ 
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_number');
            $res['response']    =   [ 
                                        "errors"    =>  $validator->errors(),
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }
        $mobile_number  =   $request['mobile_number'];
        if(strpos($mobile_number, "+") === false){ $mobile_number = "+".$mobile_number; }
        $record     =   Users::where("mobile_number",$mobile_number)->where("role_id",2)->where("is_delete",0)->first();
        if(empty($record)){
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.mobile_number_not_exist');
            $res['response']    =   [ 
                                        "errors"    =>  ["mobile_number" => [__('apiMessages.mobile_number_not_exist')]],
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }else{
            if($record->status == 0){
                $res['status']      =   0;
                $res['message']     =   __('apiMessages.user_status_inactive');
                $res['response']    =   [ 
                                            "errors"    =>  ["mobile_number" => [__('apiMessages.user_status_inactive')]],
                                            "data"      =>  (object)[] 
                                        ];
                return response($res);
            }else{
                $otp                        =   getOtp();
                $otp_time                   =   date("Y-m-d H:i:s");
                twilioSms($otp,$mobile_number);
                $record->app_otp         =   $otp;
                $record->app_otp_time    =   $otp_time;
                $record->save();
                $res['status']              =   1;
                $res['message']             =   __('apiMessages.otp_resend_msg');
                $res['response']            =   [ 
                                                    "errors"    =>  (object)[],
                                                    "data"      =>  ["mobile_number"=>$mobile_number] 
                                                ];
                return response($res); 
            }
        }
    }

    public function register(Request $request){
        $rules      =   [ 
                            "name"              =>  "required|min:3|max:255",
                            "email"             =>  "required|email|min:3|max:255",
                            "mobile_number"     =>  "required|regex:/^\+?[0-9]{7,14}$/",
                        ];
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        $messages   =   ["mobile_number.regex" => __('apiMessages.mobile_number_regex_validation')];
        $validator  =   Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){ 
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_number');
            $res['response']    =   [ 
                                        "errors"    =>  $validator->errors(),
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }
        $name           =   $request['name'];
        $email          =   $request['email'];
        $mobile_number  =   $request['mobile_number'];
        if(strpos($mobile_number, "+") === false){  $mobile_number = "+".$mobile_number; }
        $record     =   Users::where("mobile_number",$mobile_number)->where("role_id",2)->where("is_delete",0)->first();
        if(!empty($record)){
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.mobile_number_already_registered');
            $res['response']    =   [ 
                                        "errors"    =>  ["mobile_number" => [__('apiMessages.mobile_number_already_registered')]],
                                        "data"      =>  (object)[] 
                                    ];
            return response($res);
        }else{
            $recordEmail     =   Users::where("email",$email)->where("role_id",2)->where("is_delete",0)->first();
            if(!empty($recordEmail)){
                $res['status']      =   0;
                $res['message']     =   __('apiMessages.email_already_taken');
                $res['response']    =   [ 
                                            "errors"    =>  ["email" => [__('apiMessages.email_already_taken')]],
                                            "data"      =>  (object)[] 
                                        ];
                return response($res);
            }else{
                $otp                        =   getOtp();
                $otp_time                   =   date("Y-m-d H:i:s");
                twilioSms($otp,$mobile_number);
                $user_data                  =   new Users();
                $user_data->name            =   $name;
                $user_data->email           =   $email;
                $user_data->mobile_number   =   $mobile_number;
                $user_data->app_otp         =   $otp;
                $user_data->app_otp_time    =   $otp_time;
                $user_data->save();
                $res['status']              =   1;
                $res['message']             =   __('apiMessages.user_registered_successfully');
                $res['response']            =   [ 
                                                    "errors"    =>  (object)[],
                                                    "data"      =>  ["mobile_number"=>$mobile_number] 
                                                ];
                return response($res);              
            }
        }
    }
    
}
