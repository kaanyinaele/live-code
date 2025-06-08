@extends('frontend.layout')
@section('content')
 <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Reset Password</h4>
            <p>Please type your new password</p>
          </div>
          <div class="from-in-box">
          <form action="{{route('reset_password',$reset_id) }}" method="POST" id="reset_password">
            @csrf
            <div class="form-group">
              <input type="Password" name="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password">
              @error('password')
              <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="Password" name="password_confirmation"  class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
              @error('password_confirmation')
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