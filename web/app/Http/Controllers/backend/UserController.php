<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Http\Request;
use App\Models\Users;
use Redirect;
use Hash;
use Validator;
use Auth;
use Session;
use Excel;

class UserController extends CommonController{

    protected $table        =   'users';
    protected $slug         =   'user';
    protected $page_title   =   'User';
    protected $role_id      =   2;
    
    public function __construct(){
        view()->share('table', $this->table);
        view()->share('slug', $this->slug);
        view()->share('page_title', $this->page_title);
    }

    public function index(){
        Users::where("role_id",$this->role_id)->update(["admin_seen"=>1]);
        return view('backend.'.$this->slug.'.index');
    }

    public function indexAjax(Request $request){
        $draw           =   $request['draw'];
        $columns        =   $request['columns'];
        $order          =   $request['order'][0];
        $start          =   $request['start'];
        $length         =   $request['length'];
        $search         =   $request['search'];
        $search_form    =   ["name","email","mobile_number","status"];
        $table_columns  =   ['checkbox','id','image','name','email','mobile_number','status','action'];
        $orderBy        =   $request['order'][0]['column'];
        $order          =   $request['order'][0]['dir'];
        $query          =   Users::select("*");
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
        $query->where("role_id",$this->role_id);
        $total_records  =   $query->count();
        $query->limit($length)->offset($start)->orderBy($table_columns[$orderBy],$order);
        $records        =   $query->get()->toArray();
        return view('backend.'.$this->slug.'.indexAjax',compact('records','total_records','draw','start'))->render();
    }

    public function view($id,Request $request){
        $record    =   Users::where("id",base64_decode($id))->first();
        if(!empty($record)){
            return view('backend.'.$this->slug.'.view',compact('record'));
        }else{
            toastr()->error("Wrong Url");
            return redirect()->back();
        }
    }

    public function edit($id,Request $request){
        if($request->isMethod('post')){
            $messages = [
                'password.same' => "Password and Confirm password didn't match.",
                'password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
                'first_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'last_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'mobile_number.regex' => "The :attribute may only contain numbers with country code as prefix.",
            ];
            $rules = [
                'first_name'        =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'last_name'         =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'email'             =>  'required|unique:'.$this->table.',email,'.base64_decode($id).'|min:6|max:250',
                // 'mobile_number'             =>  'required|unique:'.$this->table.',mobile_number,'.base64_decode($id).'|numeric|digits_between:7,15',
                'mobile_number'             =>  'required|min:6|max:13|unique:'.$this->table.',mobile_number,'.base64_decode($id).'|regex:/^(\+[0-9]*)$/',
                'image'             =>  'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:100000',
            ];
            if(!empty($request['password'])){
                $rules['password']  =   'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/';
                $rules['confirm_password']  =   'required|same:password|min:6|max:55';
            }
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['first_name'] );
            if($has_emojis_old){ $emojy_errors["first_name"]   =  ["The first name field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['last_name'] );
            if($has_emojis_old){ $emojy_errors["last_name"]   =  ["The last name field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['password'] );
            if($has_emojis_old){ $emojy_errors["password"]   =  ["The password field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['confirm_password'] );
            if($has_emojis_old){ $emojy_errors["confirm_password"]   =  ["The confirm password field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            $user_data              =   Users::find(base64_decode($id));
            $user_data->first_name  =   $request['first_name'];
            $user_data->last_name   =   $request['last_name'];
            $user_data->name        =   $request['first_name']." ".$request['last_name'];
            $username               =   $request['first_name']." ".$request['last_name'];
            $user_data->email       =   $request['email'];
            $user_data->mobile_number      =   ($request['mobile_number'])? $request['mobile_number'] : null;
            $user_data->role_id     =   $this->role_id;
            if(!empty($request['password'])){
                $user_data->password=   Hash::make($request['password']);
            }
            if ($request->hasFile('image')) {
                if($user_data->image){
                    // $image_url  =   url('/public/uploads/user_images').'/'.$user_data->image;
                    $image_url  =   public_path('/uploads/user_images').'/'.$user_data->image;
                    unlink($image_url);
                }
                $image          =   $request->file('image');
                $name           =   time().'.'.$image->getClientOriginalExtension();
                $destinationPath=   public_path('/uploads/user_images');
                $image->move($destinationPath, $name);
                $user_data->image   =   $name;
            }
            $user_data->save();

            /* Password update Email Send Work Start */

            if(!empty($request['password'])){
            $url        =   url('login');
            $content    =   array("user_name" => $username, "role" => "User", "url"=>$url, "email" => $request['email'], "password" => $request['password']);
            
            $options    =   [
                "to_name"   =>  $username,
                "to_email"  =>  $request['email'],
            ];
            $this->mail_send('admin-update-password-for-user',$subject=array(),$content,$options);
            }
            /* Password update Email Send Work End */

            toastr()->success($this->page_title." updated successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            $record    =   Users::where("id",base64_decode($id))->first();
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
            $messages = [
                'password.same' => "Password and Confirm password didn't match.",
                'password.regex' => "Your password must be more than 6 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.",
                'first_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'last_name.regex' => "The :attribute may only contain letters, numbers and spaces.",
                'mobile_number.regex' => "The :attribute may only contain numbers with country code as prefix."
            ];
            $rules = [
                'first_name'        =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'last_name'         =>  'required|min:3|max:55|regex:/^[a-zA-Z0-9\s]+$/',
                'email'             =>  'required|unique:'.$this->table.'|min:6|max:250',
                // 'mobile_number'            =>  'required|unique:'.$this->table.'|numeric|digits_between:7,15',
                'mobile_number'             =>  'required|min:6|max:13|unique:'.$this->table.'|regex:/^(\+[0-9]*)$/',
                'image'             =>  'mimes:jpeg,jpg,png,gif,JPEG,JPG,PNG,GIF|max:100000',
                'password'          =>  'required|min:6|max:55|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                'confirm_password'  =>  'required|same:password|min:6|max:55',
            ];
            $validator = Validator::make($request->all(),$rules,$messages);
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }
            /* Emoji Block Work Start */
            $emojy_errors   =   [];
            $has_emojis_old =   has_emojis_old( $request['first_name'] );
            if($has_emojis_old){ $emojy_errors["first_name"]   =  ["The first name field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['last_name'] );
            if($has_emojis_old){ $emojy_errors["last_name"]   =  ["The last name field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['password'] );
            if($has_emojis_old){ $emojy_errors["password"]   =  ["The password field should not contain emojis"];  }
            $has_emojis_old =   has_emojis_old( $request['confirm_password'] );
            if($has_emojis_old){ $emojy_errors["confirm_password"]   =  ["The confirm password field should not contain emojis"];  }
            if(!empty($emojy_errors)){
                return redirect()->back()->withInput()->withErrors($emojy_errors);
            }
            /* Emoji Block Work End */
            $user_data              =   new Users();
            $user_data->first_name  =   $request['first_name'];
            $user_data->last_name   =   $request['last_name'];
            $username               =   $request['first_name']." ".$request['last_name'];
            $user_data->name        =   $username;
            $user_data->email       =   $request['email'];
            $user_data->mobile_number      =   ($request['mobile_number'])? $request['mobile_number'] : null;
            $user_data->role_id     =   $this->role_id;
            $user_data->password    =   Hash::make($request['password']);
            if ($request->hasFile('image')) {
                $image          =   $request->file('image');
                $name           =   time().'.'.$image->getClientOriginalExtension();
                $destinationPath=   public_path('/uploads/user_images');
                $image->move($destinationPath, $name);
                $user_data->image   =   $name;
            }
            $user_data->save();
            $user_id        =   $user_data->id;
            /* Registration Email Send Work Start */
            $url        =   url('login');
            $content    =   array("username" => $username, "role" => "User", "url"=>$url, "email" => $request['email'], "password" => $request['password']);
            $options    =   [
                "to_name"   =>  $username,
                "to_email"  =>  $request['email'],
            ];
            $this->mail_send('admin-new-user-registration',$subject=array(),$content,$options);
            /*
            $otp    =   getOtp();
            Users::where("id",$user_id)->update( [ "email_otp" => $otp, "email_otp_status" => 1 ] );
            $content    =   array("username" => $username, "otp" => $otp);
            $options    =   [
                                "to_name"   =>  $username,
                                "to_email"  =>  $request['email'],
            ];
            $this->mail_send('user-register-by-admin',$subject=array(),$content,$options);
            */
            /* Registration Email Send Work End */
            toastr()->success($this->page_title." created successfully");
            $redirect_url       =   url('admin').'/'.$this->slug;
            return redirect()->to($redirect_url);
        }else{
            return view('backend.'.$this->slug.'.add');
        }
    }
    
    public function status_update($id,$status,Request $request){
        Users::where("id",base64_decode($id))->update(["status"=>$status]);

        /** Account Status Update to User Start **/
        $mail_status        =   ($status == 1)? "Activated" : "Deactivated";
        accountStatusUpdate(base64_decode($id),$mail_status);
        /** Account Status Update to User End **/
        
        toastr()->success($this->page_title." status updated successfully");
        $redirect_url       =   url('admin').'/'.$this->slug;
        return redirect()->to($redirect_url);
    }

    public function status_update_all($status,Request $request){
        $ids        =   (array)json_decode($request['ids']);
        if(!empty($ids)){
            Users::whereIn("id",$ids)->update(['status'=>$status]);
            /** Account Status Update to User Start **/
            foreach($ids as $user_id){
                $mail_status        =   ($status == 1)? "Activated" : "Deactivated";
                accountStatusUpdate($user_id,$mail_status);
            }
            /** Account Status Update to User End **/
            toastr()->success("Selected ".$this->page_title." status updated successfully");
            $returnUrl  =   url('admin').'/'.$this->slug;
            return redirect()->to($returnUrl);
        }else{
            toastr()->error("Wrong Url!!");
            return redirect()->back();
        }
    }
    
    public function delete($id,Request $request){
        $user_data  =   Users::where("id",base64_decode($id))->first();
        $update_data    =   [
            'email'     =>  null,
            'mobile_number'    =>  null,
            'facebook_id'    =>  null,
            'old_email' =>  $user_data->email,
            'old_number'=>  $user_data->mobile_number,
            'old_facebook_id'=>  $user_data->facebook_id,
            'is_delete' =>  1,
        ];
        /** Account Status Update to User Start **/
        $mail_status        =   "Deleted";
        accountStatusUpdate(base64_decode($id),$mail_status);
        /** Account Status Update to User End **/
        Users::where("id",base64_decode($id))->update($update_data);
        toastr()->success($this->page_title." deleted successfully");
        $redirect_url       =   url('admin').'/'.$this->slug;
        return redirect()->to($redirect_url);
    }

    public function delete_all(Request $request){
        $ids        =   (array)json_decode($request['ids']);
        if(!empty($ids)){
            // Users::whereIn("id",$ids)->update(['is_delete'=>1]);
            $selected_users     =   Users::whereIn("id",$ids)->get();
            foreach($selected_users as $users){
                $update_data    =   [
                    'email'     =>  null,
                    'mobile_number'    =>  null,
                    'facebook_id'    =>  null,
                    'old_email' =>  $users->email,
                    'old_number'=>  $users->mobile_number,
                    'old_facebook_id'=>  $users->facebook_id,
                    'is_delete' =>  1,
                ];
                /** Account Status Update to User Start **/
                $mail_status        =   "Deleted";
                accountStatusUpdate($users->id,$mail_status);
                /** Account Status Update to User End **/
                Users::where("id",$users->id)->update($update_data);
            }
            toastr()->success("Selected ".$this->page_title." deleted successfully");
            $returnUrl  =   url('admin').'/'.$this->slug;
            return redirect()->to($returnUrl);
        }else{
            toastr()->error("Wrong Url!!");
            return redirect()->back();
        }
    }

    public function export($type,Request $request){
        $ids        =   (array)json_decode($request['ids']);
        $query      =   Users::where("status",1)->where("is_delete",0)->where("role_id",$this->role_id);
        if(!empty($ids)){
            $query->whereIn("id",$ids);
        }
        $records    =   $query->get();
        // Initialize the array which will be passed into the Excel
        // generator.
        $exportArray = []; 
        // Define the Excel spreadsheet headers
        $exportArray[] = ['SNO', 'Name','Email','Mobile Number'];
        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        $counter                    =   1;
        foreach ($records->toArray() as $record) {
            $exportData['sno']      =   $counter;
            $exportData['name']     =   $record['name'];
            $exportData['email']    =   $record['email'];
            $exportData['mobile_number']   =   $record['mobile_number'];
            $exportArray[]          =   $exportData;
            $counter++;
        }
        $filename                   =   'users';
        if($type == "csv"){
            $csv_file               =   $filename . ".csv";
            header("Content-Type: text/csv");
            header("Content-Disposition: attachment; filename=\"$csv_file\"");
            $fh = fopen( 'php://output', 'w' );
            $is_coloumn = true;
            if(!empty($exportArray)){
                foreach($exportArray as $record){
                    // if($is_coloumn){
                        fputcsv($fh, $record);
                        $is_coloumn = false;
                    // }
                }
                fclose($fh);
            }
            exit;
        }else if($type == "xlsx"){
            // Generate and return the spreadsheet
            /*
            Excel::create('payments', function($excel) use ($exportArray) {
                // Set the spreadsheet title, creator, and description
                $excel->setTitle('Payments');
                $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
                $excel->setDescription('payments file');
                // Build the spreadsheet, passing in the payments array
                $excel->sheet('sheet1', function($sheet) use ($exportArray) {
                    $sheet->fromArray($exportArray, null, 'A1', false, false);
                });
            })->download('xlsx');
            */
            // prd($exportArray);
            // ob_clean();
            return Excel::download($records, $filename.'.xlsx');
        }else{
            toastr()->error("Wrong Url!!");
            return redirect()->back();
        }
    }

}
