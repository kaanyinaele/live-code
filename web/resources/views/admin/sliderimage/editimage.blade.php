

@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Edit Slider Image
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
      <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Edit Slider Image</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
    <!--   <h3 class="box-title">Edit SliderImage</h3> -->
      <!-- /.box-header -->
      <form data-toggle="validator" action="{{route('update/sliderimage',$data->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Image Title:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Image Title" value="{{$data->title}}"  name="title" >
                <span class="form-control-feedback"></span>
                @error('title')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label>Image(resolution should be 1047*379 pixels):</label>
                <div class="row">
                <div class="col-md-10">
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="Upload image" value="{{$data->image}}" >
                </div>
                <div class="col-md-2">
                <img src="{{asset('public/image/slider/'.$data->image)}}" height="34" width="70px">
               </div>
                <span class="form-control-feedback"></span>
                @error('image')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Image Description:</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Image Description"  name="description" >{{$data->description}}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck"></div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary pull-right">Update</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection

