@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Change Password
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Change Password</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <!-- left column -->
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Change Password</h3>
      </div>
      <form action="{{route('change/pass')}}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Enter old password" name="old_password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('old_password')
            <span class="invalid-feedback" role="alert"  style="color: red">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="new_password" placeholder="Enter new Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('new_password')
            <span class="invalid-feedback" role="alert" style="color: red">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <input type="password" class="form-control @error('Re-enter-password') is-invalid @enderror" name="confirm_password" placeholder="Enter Re-enter Password">
            <span class="glyphicon glyphicon-lock form-control-feedback" ></span>
            @error('confirm_password')
            <span class="invalid-feedback" role="alert" style="color: red">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</section>
@endsection

