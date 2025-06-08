<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CmsPage;
use Validator;
use Hash;
use Cookie;
use Auth;

class ApiController extends CommonController{

    public function __construct(Request $request){
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        app()->setLocale($lang);
    }

    public function cms_pages(Request $request){
        $rules      =   [ 
                            "slug"     =>  "required"
                        ];
        $lang       =   ($request['lang'])? $request['lang'] : 'en';
        $validator  =   Validator::make($request->all(),$rules);
        if($validator->fails()){ 
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_data');
            $res['response']    =   [ 
                                        "errors"    =>  $validator->errors(),
                                        "data"      =>  (object)[],
                                    ];
            return response($res);
        }
        $slug       =   $request['slug'];
        $record     =   CmsPage::where("slug",$slug)->where("status",1)->where("is_delete",0)->first();
        if(empty($record)){
            $res['status']      =   0;
            $res['message']     =   __('apiMessages.invalid_data');
            $res['response']    =   [ 
                                        "errors"    =>  (object)[],
                                        "data"      =>  (object)[],
                                    ];
            return response($res);
        }else{
            $data               =   new \stdClass;
            $data->id           =   $record->id;
            $data->title        =   (isset($record->{'title_'.$lang}))? $record->{'title_'.$lang} : null;
            $data->content      =   (isset($record->{'content_'.$lang}))? $record->{'content_'.$lang} : null;
            $res['status']      =   1;
            $res['message']     =   __('apiMessages.success');
            $res['response']    =   [ 
                                        "errors"    =>  (object)[],
                                        "data"      =>  $data,
                                    ];
            return response($res);
        }
    }
    
}
