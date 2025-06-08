@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Add Sider Image
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add slider image</li>
  </ol>
</section>
<section class="content" style="margin-bottom:-44px">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
      <form data-toggle="validator" action="{{route('add_sliderimage')}}" method="POST" enctype="multipart/form-data" id="slider_image">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Image Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Image Title" value="{{old('title')}}" name="title" >
                <span class="form-control-feedback"></span>
                @error('title')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Image(resolution should be 1047*379 pixels):</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Upload slider image">
                <span class="form-control-feedback"></span>
                @error('image')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Image Description:</label>
                <textarea style="height: 106px;"  class="form-control @error('description') is-invalid @enderror" placeholder="Image Description"  name="description" >{{old('description')}}</textarea>
                @error('description')
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
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection

