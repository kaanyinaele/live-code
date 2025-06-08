<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\CmsPage;
use Redirect;
use Hash;
use Validator;
use Auth;
use Session;

class CmsPageController extends CommonController{

    protected $table        =   'cms_pages';
    protected $slug         =   'cms_page';
    protected $page_title   =   'CMS Page';
    
    public function __construct(){
        view()->share('table', $this->table);
        view()->share('slug', $this->slug);
        view()->share('page_title', $this->page_title);
    }

    public function index(){
        return view('backend.'.$this->slug.'.index');
    }

    public function indexAjax(Request $request){
        $draw           =   $request['draw'];
        $columns        =   $request['columns'];
        $order          =   $request['order'][0];
        $start          =   $request['start'];
        $length         =   $request['length'];
        $search         =   $request['search'];
        $search_form    =   ["title","status"];
        $table_columns  =   ['id','title','status','action'];
        $orderBy        =   $request['order'][0]['column'];
        $order          =   $request['order'][0]['dir'];
        $query          =   CmsPage::select("*");
        if(!empty($search_form)){
            foreach($search_form as $key => $value){
                // if(isset($request[$value]) && !empty($request[$value]))
                if($value == "status"){
                    if($request[$value] != 'all'){
                        $query->where($value,"$request[$value]");
                    }
                }else{
                    if(!empty($request[$value])){
                        $query->where($value,"like","%$request[$value]%");
                    }
                }
            }
        }
        $query->where("is_delete",0);
        $total_records  =   $query->count();
        $query->limit($length)->offset($start)->orderBy($table_columns[$orderBy],$order);
        $records        =   $query->get()->toArray();
        return view('backend.'.$this->slug.'.indexAjax',compact('records','total_records','draw','start'))->render();
    }

    public function view($id,Request $request){
        $record    =   CmsPage::where("id",base64_decode($id))->first();
        if(!empty($record)){
            return view('backend.'.$this->slug.'.view',compact('record'));
        }else{
            toastr()->error("Wrong Url");
            return redirect()->back();
        }
    }

    public function edit($id,Request $request){
        if($request->isMethod('post')){
            $messages   =   [
                'title_en.regex' => "The :attribute may only contain letters, numbers and spaces.",
            ];
            $validator = Validator::make($request->all(), [
                'title_en'     =>  'required|unique:'.$this->table.',title_en,'.base64_decode($id).'|min:4|max:250|regex:/^[a-zA-Z0-9\s]+$/',
                'title_ar'   =>  'required',
                'content_en'   =>  'required',
                'content_ar'   =>  'required',
            ],$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['title_en'] );
            if($has_emojis_old){ $emojy_errors["title"]   =  ["The title field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            $email_content          =   CmsPage::find(base64_decode($id));
            $email_content->title_en   =   $request['title_en'];
            $email_content->title_ar   =   $request['title_ar'];
            $email_content->content_en =   $request['content_en'];
             $email_content->content_ar   =   $request['content_ar'];
            $email_content->save();
            toastr()->success($this->page_title." updated successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            $record    =   CmsPage::where("id",base64_decode($id))->first();
            if(!empty($record)){
                return view('backend.'.$this->slug.'.edit',compact('record'));
            }else{
                toastr()->error("Wrong Url");
                return redirect()->back();
            }
        }
    }

    public static function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // trim
        $text = trim($text, '-');
        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // lowercase
        $text = strtolower($text);
        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    public function create(Request $request){
        if($request->isMethod('post')){
            $messages   =   [
                'title.regex' => "The :attribute may only contain letters, numbers and spaces.",
            ];
            $validator = Validator::make($request->all(), [
                'title'     =>  'required|unique:'.$this->table.'|min:4|max:250|regex:/^[a-zA-Z0-9\s]+$/',
                'content'   =>  'required',
            ],$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['title'] );
            if($has_emojis_old){ $emojy_errors["title"]   =  ["The title field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            $email_content          =   new CmsPage();
            $email_content->title   =   $request['title'];
            $email_content->slug    =   $this->slugify($request['title']);
            $email_content->content =   $request['content'];
            $email_content->save();
            toastr()->success($this->page_title." created successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            return view('backend.'.$this->slug.'.add');
        }
    }
    
    public function delete($id,Request $request){
        CmsPage::where("id",base64_decode($id))->update(["is_delete"=>1]);
        toastr()->success($this->page_title." deleted successfully");
        $redirect_url       =   url('admin').'/'.$this->slug;
        return redirect()->to($redirect_url);
    }
    
    public function status_update($id,$status,Request $request){
        CmsPage::where("id",base64_decode($id))->update(["status"=>$status]);
        toastr()->success($this->page_title." status updated successfully");
        $redirect_url       =   url('admin').'/'.$this->slug;
        return redirect()->to($redirect_url);
    }

}
