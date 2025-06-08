<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index()
    {
     $datas=Location::where('is_delete',0)->sortable('id', 'desc')->paginate(10);
     $i = (request()->input('page', 1) - 1) * 10;
     return view('admin.location.index',compact('datas','i'));
    }
    public function add_form()
    {
    return view('admin.location.add');
    }
    public function add(Request $request)
    { 
      $request->validate([
     'name' => 'required|min:3|max:200',
      ]);
      $data=array(
            'name'=> $request->name,
      );
      Location::create($data);
      toastr()->success('Location Add sucessfully');
      return redirect()->route('location');
    }
    public function edit($id,$page_no)
    {
     $data=Location::findOrFail(base64_decode($id));
     return view('admin.location.edit',compact('data','page_no'));

    }

    public function update(Request $request ,$id)
    {  
     $request->validate([
      'name' => 'required|min:3|max:100',
     ]);
     $data=Location::findOrFail($id);
     $data->name=$request->name;
     $data->save();
     toastr()->success('Location update sucessfully');
     return redirect('admin/location?page='.$request->input('hidden'));
   }
   
   public function delete($id,$page)
   {
     $data=Location::findOrFail($id);
     $data->is_delete=1;
     $data->save();
     toastr()->success('Location delete Successfully');
     return redirect('admin/location?page='.$page);
   }

  public function status(Request $request ,$id,$status)
  {  
      $data=Location::findorFail($id);
      if($status==0)
      {
        $data->status = 1;
        $data->save();
         toastr()->success('Location de-activate Successfully');
        return redirect()->back();
      }
      else
      {
          $data->status= 0;
          $data->save();
          toastr()->success('Location Activate Successfully');
          return redirect()->back();
      }
  }
  public function search(Request $request)
   {   
      $datas=Location::where('name','LIKE','%'.$request->search.'%')->where('is_delete', 0)->paginate(10);
      $val=$request->search;
      $i = (request()->input('page', 1) - 1) *  10;
      return view('admin.location.index',compact('datas','val','i'));

    }

}
