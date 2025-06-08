@extends('frontend.layout')
@section('content')
@include('frontend.tabs')
<section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Change Password</h4>
          </div>
          <div class="from-in-box m-auto">
            <form id="change_password" action="{{route('change_password')}}" method="POST">
              @csrf
              <div class="form-group">
                <input type="Passward" name="current_password"  class="form-control @error('current_error') is-invalid @enderror" placeholder="Current Passward">
                @error('current_password')
                <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="Passward" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="New Pasward">
                @error('password')
                <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="Passward" name="confirmation_password"  class="form-control @error('confirmation_password') is-invalid @enderror" placeholder="Confirm Passward">
                @error('confirmation_password')
                <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="Creat-button-up">
               <button type="submit" class="nav-link btn  btn-green" href="#">Submit</button>
              </div>
            </form>
        </div>
      </div>
    </div>
</section>
@endsection