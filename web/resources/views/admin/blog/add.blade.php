@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
       Blog Add
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Blog</li>
      </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <form method="POST"  action="{{route('blog_add')}}" enctype="multipart/form-data">
      @csrf
      <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Enter Title</label>
            <textarea name="title" class="form-control @error('question') is-invalid @enderror" placeholder="Enter title" rows="2" />{{ old('title')}}</textarea>
             <span class="form-control-feedback"></span>
            @error('title')
            <span class="invalid-feedback" style="color: red">
              <strong >{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        </div>

        <div class="row">
        <div class="col-md-12">
          <label>Enter Description</label>
          <div class="box form-group">
            <div class="form-group">
              <h3 class="box-title">
              </h3>
            </div>
            <textarea placeholder="Place your description" name="description">{{ old('description')}}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
                </span>
               @enderror
             <!-- <div id="editor">
                thia is text area
             </div> -->
           <!--  <div class="box-body pad">
              <textarea placeholder="Place your description" class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;">{{ old('description')}}</textarea>
               
            </div> -->
          </div>
        </div>
      </div>

            <div class="row">
             <div class="col-md-6">
             <div class="form-group">
                <label>featured Image:</label>
                <input type="file" name="featured_image" class="form-control" placeholder="Upload image">
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
                <span class="form-control-feedback"></span>
                @error('image')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
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
<!--  <script>
        InlineEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> -->
@endsection