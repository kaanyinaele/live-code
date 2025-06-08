<?php
namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategory;
use App\ServiceManagement;

class SubCategoryController extends Controller
{
    public function add_form()
    {
    	$data = ServiceManagement::select('category_name','id')->where('active_status',0)->where('is_delete',0)->get();
    	return view('admin.sub-category.add',compact('data'));
    }
    public function add(Request $request)
    {
    	$request->validate([
            'sub_category'    => 'required|min:3|max:100',
            'parent_category' => 'required',
         ]);
    	$data=array(
    		'sub_category'=>$request->sub_category,
    		'parent_category'=>$request->parent_category,
    	);
    	Subcategory::create($data);
        toastr()->success('Sub-category add sucessfully ');
    	return redirect()->route('sub-category');	
         // return redirect()->back();
    	
    }
    public function Index()
    {
       $datas=Subcategory::where('is_delete',0)->sortable('id', 'desc')->paginate( 10);
       $i = (request()->input('page', 1) - 1) *  10;
       return view('admin.sub-category.index',compact('datas','i'));
    }
    public function Search(Request $request)
	{  
		$datas=Subcategory::where('sub_category','LIKE','%'.$request->search.'%')->orwhere('parent_category','LIKE','%'.$request->search.'%')->paginate(10);
		$val=$request->search;
		$i = (request()->input('page', 1) - 1) *  10;
        return view('admin.sub-category.index',compact('datas','i','val'));
    }
    public function View($id)
    { 
    $data=Subcategory::findOrFail(base64_decode($id));
    return view('admin.faq.view',compact('data'));
    }
    public function edit($id,$page_no)
    {
       $data=Subcategory::findOrFail(base64_decode($id));
       $data1 = ServiceManagement::select('category_name','id')->where('active_status',0)->where('is_delete',0)->get();
       return view('admin.sub-category.edit',compact('data','data1','page_no'));
    }

   public function update(Request $request ,$id)
   {  
     $request->validate([
      'sub_category' => 'required|min:3|max:100',
      'parent_category'   => 'required',
     ]);

   $data=Subcategory::findOrFail($id);
   $data->sub_category=$request->sub_category;
   $data->parent_category =$request->parent_category;
   $data->save();
    toastr()->success('Sub-category update sucessfully');
     return redirect('admin/sub-category?page='.$request->input('hidden'));
   }
   
   public function Delete($id,$page)
   {

       $data=Subcategory::findOrFail($id);
       $data->is_delete=1;
       $data->save();
       toastr()->success('Sub-category delete Successfully');
        return redirect('admin/sub-category?page='.$page);
   }

  public function Status(Request $request ,$id,$status)
  {  
      $data=Subcategory::findorFail($id);
      if($status==0)
      {
        $data->status = 1;
        $data->save();
         toastr()->success('Sub-category de-activate Successfully');
        return redirect()->back();
      }
      else
      {
          $data->status= 0;
          $data->save();
          toastr()->success('Sub-category Activate Successfully');
          return redirect()->back();
      }
  }
}
