<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php  echo GlobalTitle()->title; ?></title> 
     <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{asset('public/image/favicon/'.GlobalTitle()->favicon)}}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/admintheme/dist/css/AdminLTE.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/admintheme/plugins/iCheck/square/blue.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @toastr_css
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="{{route('admin.login')}}">
        <img src="{{asset('public/image/logo/'.$data->logo)}}" height="70px" width="190px"/> 
      </a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your sessionn</p>
        <form action="{{ route('adminlogin') }}" method="POST">
          @csrf
          <div class="form-group has-feedback">
            <input type="text" class="form-control @error('login') is-invalid @enderror" placeholder="Email/Username" name="login" value="{{ old('login')}}">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @error('login')
            <span class="invalid-feedback" role="alert" style="color: red">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @error('password')
            <span class="invalid-feedback" role="alert" style="color: red">
            <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                <a href="{{route('forgetpassword')}}">I forgot my password</a>
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- jQuery 3 -->
    <script src="{{asset('public/admintheme/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{asset('public/admintheme/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('public/admintheme/plugins/iCheck/icheck.min.js')}}"></script>
    @toastr_js
    @toastr_render
    @yield('scripts')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>
</html>

