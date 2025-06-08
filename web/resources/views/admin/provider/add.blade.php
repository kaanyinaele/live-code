@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Add Provider
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Provider</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="container-fluid">
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <form action="{{route('provider/add')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Enter Full Name:</label>
                    <input type="text" class="form-control" placeholder="Full Name" value="{{ old('name')}}" name="name" >
                    <span class="form-control-feedback"></span>
                   <!--  <div class="help-block with-errors"></div> -->
                    @error('name')
                    <span class="invalid-feedback" style="color: red">
                    <strong >{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  
                  <div class="form-group">
                    <label>Enter Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="help-block with-errors"></div>
                    @error('password')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="Confirm Password">
                    <span class="form-control-feedback"></span>
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Select Document :</label>
                    <input type="file" class="form-control @error('document') is-invalid @enderror" name="document" >
                    <div class="help-block with-errors"></div>
                    @error('document')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Street Name:</label>
                    <input type="text" name="street" class="form-control" value="{{ old('street')}}" placeholder="Street Name">
                    <span class="form-control-feedback"></span>
                    @error('street')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Enter Email:</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email')}}" placeholder="Email" />
                    <div class="help-block with-errors"></div>
                    @error('email')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter city:</label>
                    <input type="text"  class="form-control" value="{{ old('city')}}" placeholder="Enter city" name="city">
                    <span class="form-control-feedback"></span>
                    @error('city')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter Mobile Number:</label>
                    <input type="text" name="phone_no" class="form-control" value="{{ old('phone_no')}}" placeholder="Enter Mobile Number">
                    <span class="form-control-feedback"></span>
                    @error('phone_no')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter Area Address:</label>
                    <input type="text" name="area" class="form-control" value="{{ old('area')}}" placeholder="Enter Area Address">
                    <span class="form-control-feedback"></span>
                    @error('area')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Enter your business/skill category:</label>
                    <select class="selectpicker selectpickerForm  @error('skill_category') is-invalid @enderror" multiple="multiple" name="skill_category[]">
                      @foreach($data as $service)
                      <option value="{{$service->id}}">{{$service->category_name}}</option>
                      @endforeach
                    </select> 
                    <span class="form-control-feedback"></span>
                    @error('skill_category')
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
                <div class=" form-group col-xs-4">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<style type="text/css">
  .SumoSelect.sumo_subcategory { width: 100%; display: block; }
   .SumoSelect.sumo_skill_category { width: 100%; }
</style>
@endsection

@section('scripts')
<script> 
 //multiple selectbox
  setTimeout(function(){ 
    $('.selectpickerForm').SumoSelect({ okCancelInMulti: true });
      $('.selectpickerForm').css("height",0); 
  },100);
</script>

@endsection

