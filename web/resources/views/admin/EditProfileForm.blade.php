@extends('admin.master')
@section('content')

<section class="content-header">
  <h3>
        Edit AdminProfile
    <small></small>
  </h3>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Edit Admin Profile</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="container-fluid">
          <div class="card card-default">
            <div class="box-header with-border" style="margin-bottom: 12px">
              <h3 class="box-title">Admin Profile</h3>
            </div>
            <!-- /.card-header -->
          <form method="POST" action="{{route('update/profile',$data->id)}}" enctype="multipart/form-data">
          @csrf
          
              <div class="card-body">
                <div class="form-group">
                  <label for="z">Admin Name:</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}"  autofocus placeholder="Admin name">
                         @error('name')
                          
                    <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                    </span>
                          @enderror
                  
                  </div>
                  <div class="form-group">
                    <label for="pwd">Phone No:</label>
                    <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{$data->phone_no}}"  placeholder="phone no">
                    @error('phone_no')
                    
                      <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  
                    </div>
                    <div class="form-group">
                      <label for="pwd">Gender:</label>
                      <label>
                        <input id="female" type="radio" name="gender"  value="female" {{$data->gender =="female" ? 'checked' : '' }}/>Female
                      </label>
                      <label>
                        <input id="male" type="radio"  name="gender" value="male" {{$data->gender =="male" ? 'checked' : '' }}/>Male
                        </label>
                      </div>
                      <div class="form-group">
                        <label for="pwd">Admin Email:</label>
                        <div>
                          <input type="email" class="form-control" value="{{$data->email}}" readonly/>
                        </div>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Address:</label>
                        <div>
                          <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"   placeholder="address" value="{{$data->address}}">
                          </div>
                          @error('address')
                    
                          <span class="invalid-feedback" role="alert" style="color: red">
                            <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                
                        </div>
                        <div class="form-group">
                          <label>Profile Image:</label>
                          <div>
                            @if(!empty($data->image))
                            <div class="row">
                           <div class="col-md-10">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="select image">
                            </div>

                             <div class="col-md-2">
                            <img src="{{asset('public/image/users/'.$data->image)}}" height="34px" width="70px"/> 
                            </div>
                            
                            @error('image')
                            <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          @else
                          <div class="row">
                           <div class="col-md-12">
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="select image">
                            </div>

                            @error('image')
                            <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          @endif

                          </div>
                        </div>
                          <div class="box-footer">
                            <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-top:10px;">Update</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="box box-primary">
                  <div class="container-fluid">
                    <div class="card card-default">
                      
                      <div class="box-header with-border" style="margin-bottom: 12px">
                        <h3 class="box-title">Change Password</h3>
                      </div>

                      <form action="{{route('change/pass')}}" method="POST">
                       @csrf
        
                        <div class="form-group">
                          <label>Current Password:</label>
                          <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Enter current password" name="old_password">
                            <span class="form-control-feedback"></span>
                            @error('old_password')
                            <span class="invalid-feedback" role="alert"  style="color: red">
                              <strong>{{ $message="The current password field is required."}}</strong>
                            </span>
                             @enderror
        
                          </div>
                          <div class="form-group">
                            <label>New Password:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" placeholder="Enter new Password">
                              <span class="form-control-feedback"></span>
                              @error('new_password')
          
                              <span class="invalid-feedback" role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                              </span>
                               @enderror
       
                            </div>
                            <div class="form-group">
                              <label>Confirm Password:</label>
                              <input type="password" class="form-control @error('Re-enter-password') is-invalid @enderror" name="confirm_password" placeholder="Enter confirm password">
                                <span class="form-control-feedback" ></span>
                                @error('confirm_password')
          
                                <span class="invalid-feedback" role="alert" style="color: red">
                                  <strong>{{ $message }}</strong>
                                </span>
                                @enderror
    
                              </div>
                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
@endsection