@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Add Service Category
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Service category</li>
  </ol>
</section>
 <section class="content">
      <div class="box box-default bo-co">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        <form  action="{{route('add/service')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label>Service category Name:</label>
                <input type="text" class="form-control" placeholder="Service name" value="{{old('category_name')}}" name="category_name">
                 <span class="form-control-feedback"></span>
                  @error('category_name')
                    <span class="invalid-feedback" style="color: red">
                        <strong >{{ $message }}</strong>
                    </span>
                @enderror
              </div>
             
               <div class="form-group">
                <label>Service Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Upload image">
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
             <!--  <div class="form-group">
                 <label>Services Price:</label>
                <input type="text" class="form-control" placeholder="Service Price" value="{{old('price')}}" name="price"  >
                  @error('price')
                    <span class="invalid-feedback" style="color: red">
                        <strong >{{ $message }}</strong>
                    </span>
                @enderror
              </div> -->
              
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
        </div>
        <div class="row">
         <div class="col-md-12">
         <label>Services Overview:</label>
          <div class="box form-group">
            <div class="form-group">
              <h3 class="box-title">
              </h3>
            </div>
            <div class="box-body pad">
                <textarea placeholder="Place overview" class="textarea @error('service_overview') is-invalid @enderror" name="service_overview" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                <span class="form-control-feedback"></span>
                 @error('service_overview')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
            </div>
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
</section>
@endsection