@extends('frontend.layout')
@section('content')
  <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Forgot Password</h4>
            <p>Please enter your email to recieve a verification code.</p>
          </div>
          <div class="from-in-box">
            <form method="GET" action="{{route('send_mail')}}" id="forget_password">
            @csrf
              <div class="form-group">
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">
                @error('email')
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