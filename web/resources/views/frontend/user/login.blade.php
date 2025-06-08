@extends('frontend.layout')
@section('content')
    <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Welcome Back,</h4>
            <p>Please login to your account</p>
          </div>
          <form action="{{ route('login') }}" method="POST" id="login" >
            @csrf
            <div class="from-in-box">
              <div class="form-group ">
                <input type="email" name="email" id="email"  class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autocomplete="off" value="{!! Cookie::get('remembered-email') !!}">
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>   
                @enderror
              </div>

              <div class="form-group  has-feedback">
                <input type="Password" name="passwd"  id="password"  class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{!! Cookie::get('remembered-password') !!}" autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
                  </span>
                  @enderror
              </div>
              <div class="d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="Accept" name="remember_me" 
                    @if (Cookie::get('remembered-checkbox') !== null)  checked  @endif />
                   <label class="custom-control-label" for="Accept">Remember Me</label>
                </div>
                <div class="forgot-link"><a href="{{route('forgotpassword')}}">Forgot Password?</a></div>
              </div>
              <div class="Creat-button-up">
                 <button type="submit" class="nav-link btn  btn-green" href="#">Login</button>
              </div>
              <div class="log-with d-flex"><p>Or you can login with</p><span></span></div>
              <div class="social-icons">
                <a href="{{ url('auth/facebook') }}" ><span><img src="{{asset('public/image/sociallink/facebook.png')}}" style="height: 40px;width: 40px"></span></a>

                <a href="{{ url('/auth/twitter') }}" target="_blank"><span><img src="{{asset('public/image/sociallink/twitter.png')}}" style="height: 40px;width: 40px"></span></a>

                 <a href="{{ url('/auth/google') }}" target="_blank"><span><img src="{{asset('public/image/sociallink/google.png')}}" style="height: 40px;width: 40px"></span></a>
              <!--   <a href="{{ url('/auth/facebook') }}" target="_blank" ><span><img src="{{asset('public/image/sociallink/instagram.png')}}" style="height: 40px;width: 40px"></span></a> -->
              </div>
               <div class="have-account">
               <span>Don’t have an account?<a href="{{route('registration')}}">Sign Up</a></span>
             </div>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection