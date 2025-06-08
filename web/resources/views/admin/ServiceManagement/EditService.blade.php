@extends('admin.master')
@section('content')
<?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
<section class="content-header">
  <h1>
        Update Service Category
   
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Update Service Category</li>
  </ol>
</section>
<section class="content">
  <div class="box bo-co">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <form action="{{route('update/service',base64_encode($data->id))}}" method="POST" enctype="multipart/form-data">
      @csrf
        
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" value="{{$page}}" name="hidden">
              <label> Service Category Name:</label>
              <input type="text" class="form-control" placeholder="Service name"  name="category_name"  value="{{$data->category_name}}">
                <span class="form-control-feedback"></span>
               <!--  <div class="help-block with-errors"></div>   -->
                  @error('category_name')
                    
                <span class="invalid-feedback" style="color: red">
                  <strong >{{ $message }}</strong>
                </span>
                @enderror
              </div>
           
             <!--  <div class="form-group">
                <label>Services Offered:</label>
                <input type="text" class="form-control" placeholder="Service Offered"  name="services_offered"  value="{{$data->services_offered}}">
                  <span class="form-control-feedback"></span>
                  <div class="help-block with-errors"></div>  
                  @error('services_offered')
                    
                  <span class="invalid-feedback" style="color: red">
                    <strong >{{ $message }}</strong>
                  </span>
                @enderror
                </div> -->
              <!--   <div class="form-group">
                  <label>Services Price:</label>
                  <input type="text" class="form-control" placeholder="Service Price" value="{{$data->price}}"  name="price" >
                    <span class="form-control-feedback"></span>
                      @error('price')
                        <span class="invalid-feedback" style="color: red">
                          <strong >{{ $message }}</strong>
                        </span>
                    @enderror
                  </div> -->
                  <div class="form-group">
                    <label>Service Image:</label>
                    <div class="row">
                     <div class="col-md-10">
                    <input type="file" name="image" class="form-control" placeholder="Upload image" value="{{$data->Image}}">
                    </div>
                     <div class="col-md-2">
                      <img src="{{asset('public/image/service/'.$data->image)}}" height="34px" width="70">
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
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Featured Image:</label>
                   <div class="row">
                     <div class="col-md-10">
                  <input type="file" name="featured_image" class="form-control" value="{{$data->featured_image}}" placeholder="Upload image">
                </div>
                   <div class="col-md-2">
                    <img src="{{asset('public/image/featured_image/'.$data->featured_image)}}" height="34px" width="70">
                   </div>
                  <span class="form-control-feedback"></span>
                  @error('featured_image')
                    <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>
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
                            <textarea placeholder="Place overview" class="textarea @error('service_overview') is-invalid @enderror" name="service_overview" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;">{{$data->service_overview}}</textarea>
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
                      <!-- <div class="form-group">
                        <label>Services Availability:</label>
                        <input type="text" class="form-control" placeholder="Service Availability"  name="Availability"  value="{{$data->Availability}}">
                          <span class="form-control-feedback"></span>
                            @error('Availability')
                                    <span class="invalid-feedback" style="color: red">
                                      <strong >{{ $message }}</strong>
                                    </span>
                          @enderror
              
                        </div> -->
                      
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-xs-8">
                        <div class="checkbox icheck"></div>
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