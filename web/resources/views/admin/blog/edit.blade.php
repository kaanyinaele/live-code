@extends('admin.master')
@section('content')
<section class="content-header">
  <?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
  <h1>
   Blog Edit
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Blog Edit</li>
  </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <form method="POST"  action="{{route('blog_update',$data->id)}}" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <input type="hidden" value="{{$page}}" name="hidden">
            <label>Enter Title</label>
           <textarea name="title" class="form-control @error('question') is-invalid @enderror" placeholder="Enter title" rows="2" />{{ $data->title}}</textarea>
           <span class="form-control-feedback"></span>
           @error('title')
            <span class="invalid-feedback" style="color: red">
              <strong >{{ $message }}</strong>
            </span>
           @enderror
          </div>
          <label>Enter Description</label>
          <div class="box form-group">
            <div class="form-group">
              <h3 class="box-title">
              </h3>
            </div>
            <div class="box-body pad">
              <!-- <textarea placeholder="Place your description" class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;">{{ $data->description}}</textarea> -->
               <textarea placeholder="Place your description" name="description">{{ $data->description}}</textarea>
               @error('description')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
            </div>
            <div class="row">
             <div class="col-md-6">
             <div class="form-group">
                <label>featured Image:</label>
                <input type="file" name="featured_image" class="form-control" placeholder="Upload image">
                <image src="{{asset('public/image/blog_featured/'.$data->featured_image)}}" height="50px" width="50px">
                <span class="form-control-feedback"></span>
                @error('featured_image')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
            </div>
             <div class="col-md-6">
              <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Upload image">
                <image src="{{asset('public/image/blog_image/'.$data->image)}}" height="50px" width="50px">
                <span class="form-control-feedback"></span>
                @error('image')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
          </div>

          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
 </section>

@endsection
@section('scripts')
 <script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@endsection