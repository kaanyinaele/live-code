<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\users;
use App\ServiceManagement;
use Auth ,Hash,input;

class Admin_ProviderController extends Controller
{
    public function provider_list()
    {	
      $i = (request()->input('page', 1) - 1) * 10;
    	$provider = users::where('is_delete', 0)->where('role', 2)->where('is_approved',1)->sortable('id', 'desc')->paginate(10);
      return view('admin.provider.index',compact('provider','i'));
    }
	
    public function provider_add_form()
    {	
    	//get service cataegory for skill
    	$data=ServiceManagement::where('is_delete',0)->where('active_status',0)->get();
      return view('admin.provider.add',compact('data'));
    }
	  public function provider_add(Request $request)
    {
      $this->validate(request(), [
      'name'             =>'required|min:3|max:250',
      'email'            =>'required|email|unique:users|min:3|max:250',
      'password'         =>'required|string|min:6|max:50',
      'confirm_password' =>'required|same:password',
      'phone_no'         =>'required|digits_between:7,15',
       // 'document'        =>'nullable|mimes:jpeg,png,jpg,svg,doc,docx,pdf',
       'city'            =>'required|min:3|max:50',
       'street'          =>'required|min:3|max:50',
       'area'            =>'required|min:3|max:300',
       'skill_category'  =>'required'
      ]);
     $form_data = array(
      'name'          	=>$request['name'],
      'email'        	  =>$request['email'],
      'password'     	  =>Hash::make($request['password']),
      'phone_no'     	  => $request['phone_no'],
      'city'          	=>$request['city'],
      // 'document'     	  =>$request['document'],
        'skill_category'=>$request['skill_category'],
        'area'          =>$request['area'],
        'street'        =>$request['street'],
        'role'         	=>2,
        'is_approved'   =>1,
      );
     
      $skills = $request->input('skill_category');
      $form_data['skill_category']=implode(',', $skills);

     if(!empty($image=$request->file('document'))){
       $newimage=rand() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('/image/provider_document/'), $newimage);
      $form_data['document']=$newimage;
      }
       users::create($form_data);
       toastr()->success('Provider Add successfully');
      return redirect()->route('provider');
    }
    public function delete_provider($id,$page)
    {
        $users=users::where('id',$id)->update(['is_delete'=>1]);
        toastr()->success('provider delete Successfully');
        return redirect('admin/provider?page='.$page);
    }
    public function view_provider($id)
    {   
        $data=users::findorFail(base64_decode($id));
      return view('admin.provider.view',compact('data'));
    }
    public function provider_edit($id,$page_no)
    { 
      $data=users::findorFail(base64_decode($id));
      $skill_cat= ServiceManagement::where('is_delete',0)->where('active_status',0)->get();
    
      return view('admin.provider.edit',compact('data','skill_cat','page_no'));
    }
    public function provider_Update(Request $request,$id)
    {  
      $request->validate([
      'phone_no'       => 'required|digits_between:7,15',
      'city'           =>'required|min:3|max:200',
      'name'           =>'required|min:3|max:50',
      // 'document'       => 'image|mimes:jpeg,png,jpg,gif,svg',
      'overview'       =>'min:3|max:500|nullable',
      'street'          =>'required|min:3|max:50',
       'area'            =>'required|min:3|max:300',
      // 'skill_category' 
      ]);
      $data=users::findorFail(base64_decode($id));
      $data->name = $request->name;
      $data->phone_no =$request->phone_no;
      // $data->address =$request->address;
      $data->city =$request->city;
      $data->overview =$request->overview;
      $data->area         =$request->area;
      $data->street        =$request->street;
      if(!empty( $skills = $request->input('skill_category'))){
       $data->skill_category=implode(',', $skills);
      }
      // if(!empty($image=$request->file('document')))
      // {
      //    $newimage=rand() . '.' . $image->getClientOriginalExtension();
      //    $image->move(public_path('/image/provider_document'), $newimage);
      //    $data->document = $newimage;
      // }
      if(!empty($image1=$request->file('provider_profile')))
      {
         $newimage1=rand() . '.' . $image1->getClientOriginalExtension();
         $image1->move(public_path('/image/provider_profile'), $newimage1);
         $data->image = $newimage1;
      }
     $data->save();
     toastr()->success('Provider update successfully');
     return redirect('admin/provider?page='.$request->input('hidden'));
    }
    public function provider_Status(Request $request,$id,$status)
    {  
      if($status == 0 )
      {
      $data=users::findorFail($id);
      $data->status = 1;
      $data->save();
      toastr()->success('Provider De-activate Successfully');
      return redirect()->back();
      }
      else
      {
      $data=users::findorFail($id);
      $data->status = 0;
       $data->save();
      toastr()->success('Provider Activate Successfully');
      return redirect()->back(); 
      } 
    } 

    public function Search_Provider(Request $request)
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
        $columns = array('name', 'email', 'city', 'skill_category', 'phone_no','created_at','area','street');
        $provider->where(function($q) use($columns, $val){
          foreach($columns as $search) {
             $q->orWhere($search, 'like', '%' . $val . '%');
          }
        });
      }
      if($from && $to){
        $provider = $provider->whereBetween('created_at', [$from, $to]);
      }elseif($from){

        $provider = $provider->whereDate('created_at',$from);
      }elseif($to){
        $provider = $provider->whereDate('created_at',$to);
      }
        $provider= $provider->paginate(10);
        $i = (request()->input('page', 1) - 1) * 10;
      return view('admin.provider.index',compact('provider','to','from','val','i'));
    }
    //.........................Awating provider.......................................

    public function awaiting_provider_list()
    { 
      $i = (request()->input('page', 1) - 1) * 10;
      $provider = users::where('is_delete', 0)->where('role', 2)->where('is_approved',0)->sortable('id', 'desc')->paginate(10);
      return view('admin.awaiting_provider.index',compact('provider','i'));
    }

    public function awaiting_provider_search(Request $request)
    { 
       $to=$request->to;
       $from=$request->from;
       $val=$request->search;

       if(!empty($from && $to)){ 
       $this->validate($request,[
        'to' => 'date|after_or_equal:from',
       'from' => 'date',
      ]); }
      $provider=users::where('role', 2)->where('is_delete', 0)->where('is_approved',0);  
      if(!empty($request->search))
      {
        $columns = array('name', 'email', 'city', 'skill_category', 'phone_no','created_at');
        $provider->where(function($q) use($columns, $val){
          foreach($columns as $search) {
             $q->orWhere($search, 'like', '%' . $val . '%');
          }
        });
      }
      if($from && $to){
        $provider = $provider->whereBetween('created_at', [$from, $to]);
      }elseif($from){

        $provider = $provider->whereDate('created_at',$from);
      }elseif($to){
        $provider = $provider->whereDate('created_at',$to);
      }
        $provider= $provider->paginate(10);
        $i = (request()->input('page', 1) - 1) * 10;
      return view('admin.awaiting_provider.index',compact('provider','to','from','val','i'));
    }

    public function request_accept(Request $request ,$id)
    { 
      $data=users::findorFail(base64_decode($id)); 
      $data->is_approved = 1;
      $data->save();
      toastr()->success('Request accept Successfully');
      return redirect()->back();
   }
   public function request_reject(Request $request ,$id)
    { 
      $data=users::findorFail(base64_decode($id)); 
      $data->is_approved= 2;
      $data->save();
      toastr()->success('Request reject Successfully');
      return redirect()->back();
    }

    public function awaiting_view_provider($id)
    {   
        $data=users::findorFail(base64_decode($id));
      return view('admin.awaiting_provider.view',compact('data'));
    }
  
}