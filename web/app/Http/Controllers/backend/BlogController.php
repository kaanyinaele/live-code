<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
	public function Index()
   { 
     $datas=Blog::where('is_delete',0)->sortable('id', 'desc')->paginate(10);
     $i = (request()->input('page', 1) - 1) * 10;
     return view('admin.blog.index',compact('datas','i'));
   }
   public function search(Request $request)
   {   
      $dynamic_pagination=10; 
      $datas=Blog::where('title','LIKE','%'.$request->search.'%')->where('is_delete', 0)->paginate( $dynamic_pagination);
      $val=$request->search;
      $i = (request()->input('page', 1) - 1) *  $dynamic_pagination;
      return view('admin.blog.index',compact('datas','val','i'));

    }
   public function add_form()
   {
    return view('admin.blog.add');
   }
   public function view($id)
   { 
    $data=Blog::findOrFail(base64_decode($id));
    return view('admin.blog.view',compact('data'));
   }
   public function add(Request $request)
   { 
      $request->validate([
      'title'          => 'required|min:3|max:200',
      'description'    => 'required|min:20|max:2000',
      'featured_image' => 'required|image|mimes:jpeg,png,jpg,svg',
      'image'          => 'required|image|mimes:jpeg,png,jpg,svg',
     ]);
       $form_data=array(
        'title'       => $request->title,
        'description' => $request->description,
      );
      if(!empty($image=$request->file('image'))){
       $newimage=rand() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('/image/blog_image/'), $newimage);
      $form_data['image']=$newimage;
      }
       if(!empty($image1=$request->file('featured_image'))){
       $newimage1=rand() . '.' . $image1->getClientOriginalExtension();
       $image1->move(public_path('/image/blog_featured/'), $newimage1);
      $form_data['featured_image']=$newimage1;
      }
     
      Blog::create($form_data);
      toastr()->success('Blog Add sucessfully');
      return redirect()->route('blog');
   }

   public function edit($id,$page_no)
   {

     $data=Blog::findOrFail(base64_decode($id));
     return view('admin.blog.edit',compact('data','page_no'));

   }

   public function update(Request $request ,$id)
   {  
     $request->validate([
      'title'          => 'required|min:3|max:200',
      'description'    => 'required|min:20',
      'featured_image' => 'image|mimes:jpeg,png,jpg,svg',
      'image'          => 'image|mimes:jpeg,png,jpg,svg',
     ]);
     $data=Blog::findOrFail($id);
     $data->title=$request->title;
     $data->description =$request->description;
     if(!empty($image=$request->file('image'))){
       $newimage=rand() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('/image/blog_image/'), $newimage);
        $data->image =$newimage;
     }

     if(!empty($image1 = $request->file('featured_image'))){     
       $newimage1=rand() . '.' . $image1->getClientOriginalExtension();
       $image1->move(public_path('/image/blog_featured/'), $newimage1);
         $data->featured_image       =$newimage1;
      } 
     $data->save();
     toastr()->success('Blog update sucessfully');
     return redirect('admin/blog?page='.$request->input('hidden'));
   }
   
   public function delete($id,$page)
   {
     $data=Blog::findOrFail($id);
     $data->is_delete=1;
     $data->save();
     toastr()->success('Blog delete Successfully');
     return redirect('admin/blog?page='.$page);
   }

  public function status(Request $request ,$id,$status)
  {  
      $data=Blog::findorFail($id);
      if($status==0)
      {
        $data->status = 1;
        $data->save();
         toastr()->success('Blog de-activate Successfully');
        return redirect()->back();
      }
      else
      {
          $data->status= 0;
          $data->save();
          toastr()->success('Blog Activate Successfully');
          return redirect()->back();
      }
  }
   public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
        
            $request->file('upload')->move(public_path('images'), $fileName);
   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('public/images/'.$fileName); 
            $msg = 'Image uploaded successfully'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
      }

    
}
