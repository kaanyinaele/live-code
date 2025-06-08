@extends('admin.master')
@section('content')
<section class="content-header">
   <h1>
      Update UserProfile
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li>
         <a href="{{route('dashboard')}}">
         <i class="fa fa-dashboard"></i> Home
         </a>
      </li>
      <li class="active">Update UserProfile</li>
   </ol>
</section>
<section class="content">
   <div class="box box-default">
      <div class="container-fluid">
         <div class="card card-default">
            <div class="card-header">
               <h4 class="card-title">Update UserProfile</h4>
            </div>
            <form method="POST" action="{{route('update/user',$data->id)}}" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="z">Name:</label>
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}"  autofocus placeholder="Admin name">
                           @error('name')
                           <span class="invalid-feedback" role="alert" style="color: red">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="pwd">phone no:</label>
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
                           <input id="female" type="radio" name="gender"  value="female" {{$data->gender =="female" ? 'checked' : '' }}/> female
                           </label>
                           <label>
                           <input id="male" type="radio" value="male" name="gender" {{$data->gender =="male" ? 'checked' : '' }} name="gender" >male
                           </label>
                        </div>
                       
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pwd">Email:</label>
                           <div>
                              <input type="email" class="form-control" value="{{$data->email}}" readonly />
                           </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                           <label>Address:</label>
                           <div>
                              <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="address" value="{{$data->address}}">
                           </div>
                           @error('address')
                           <span class="invalid-feedback" role="alert" style="color: red">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           @if(empty($data->image))
                            <label>Profile Image:</label>
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
                           @else
                           <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-10">
                                 <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" placeholder="select image">
                              </div>
                              <div class="col-md-2">
                                 <img src="{{asset('public/image/users/'.$data->image)}}" height="34" width="60px">
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
                     </div>
                  </div>
                  <div class="col-md-12">
                     <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-bottom: 20px;margin-left: 10px">UPDATE</button>
                  </div>
               </div>
               <!-- /.card-body -->
            </form>
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>
@endsection

