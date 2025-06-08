
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php  echo GlobalTitle()->title; ?></title> 
  <?php  $logo = GlobalTitle(); ?>
  <link rel="shortcut icon" type="image/png" sizes="16x16" href="{{asset('public/image/favicon/'.$logo->favicon)}}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admintheme/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/admintheme/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/admintheme/ower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/admintheme/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/admintheme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/admintheme/dist/css/custome/style.css')}}">

 <!--  datable -->


@toastr_css
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!-- //multiple selectbox -->
   <link rel="stylesheet" type="text/css" href="{{ url('public/common/sumoselect/sumoselect.min.css') }}">
 <!-- report table-->
<!-- 
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->

  <!-- jQuery 3 -->
<script src="{{asset('public/admintheme/bower_components/jquery/dist/jquery.min.js')}}"></script>


</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="{{route('dashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>o</b>gaworkman</span> -->
      <!-- logo for regular state and mobile devices -->
      <?php $data=GlobalTitle();?>
      <span class="logo-lg"> <img src="{{asset('public/image/logo/'.$data->logo)}}" /></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="margin-right: 13px">
              <?php $data=profile_image();?>
              @if(!empty($data->image))
              
              <img src="{{asset('public/image/users/'. Auth::user()->image)}}" class="user-image img-circle"  height="25px" width="25px" style="margin-right: 7px">
          
              <span class="hidden-xs">{{Auth::user()->name}}</span>
              @else
              <img src="{{asset('public/dummy.jpg')}}" height="18px" width="22px">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
              @endif
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                @if(!empty($data->image))
                <img src="{{asset('public/image/users/'. Auth::user()->image)}}" class="img-circle" height="25px" width="25px">
                 @else
                <img src="{{asset('public/dummy.jpg')}}" height="16px" width="17px">
                @endif
                <p>
                  {{Auth::user()->name}}
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{route('edit/profile')}}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                <form method="post" action="{{route('adminlogout')}}" style="margin-top:0px">
                @csrf
                <button type="submit" name="logout" class="btn btn-primary" onclick="return confirm('Are you sure you want to logout ?')">Logout</button>
              </form> 
                </div>
              </li>
            </ul>
          </li>
         </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    @include('admin.sidebar')
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
 
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
    <!-- <a href="https://ogaworkman.com">OgaWorkman</a>. -->
    <strong>{{GlobalTitle()->copyright}}</strong> 
  </footer>
</div>
<!-- ./wrapper -->



<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admintheme/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/admintheme/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{asset('public/admintheme/bower_components/raphael/raphael.min.js')}}"></script>
<!-- <script src="{{asset('admintheme/bower_components/morris.js/morris.min.jsv')}}"></script> -->
<!-- Sparkline -->
<script src="{{asset('public/admintheme/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('public/admintheme/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/admintheme/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/admintheme/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/admintheme/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('public/admintheme/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{asset('public/admintheme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('public/admintheme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{asset('public/admintheme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/admintheme/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admintheme/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admintheme/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admintheme/dist/js/demo.js')}}"></script>
<!-- <script src="/vendors/formvalidation/dist/js/FormValidation.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
<script src="{{asset('public/admintheme/dist/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('public/frontend/js/bootstrapValidator.min.js')}}"></script>
<!-- //multiple selectbox -->
<script type="text/javascript" src="{{ url('public/common/sumoselect/jquery.sumoselect.min.js') }}"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<!-- datable -->
<!-- chart -->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>


<!-- <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/inline/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<!-- <script type="text/javascript" src="js/custom_image_and_upload_wysihtml5.js"></script>
<script type="text/javascript" src="js/jqueryupload.js"></script> -->
<!-- report table -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> -->

@toastr_js
@toastr_render
@yield('scripts')

</body>
</html>