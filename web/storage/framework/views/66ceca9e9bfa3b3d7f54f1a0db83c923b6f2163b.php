<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo GlobalTitle()->title; 
  $segment2   =   Request::segment(2);
  $segment1   =   Request::segment(1);
  ?>
  </title> 
  <?php  $logo = GlobalTitle(); ?>
 <link rel="shortcut icon" type="image/png" sizes="16x16" href="<?php echo e(asset('public/image/favicon/'.GlobalTitle()->favicon)); ?>">

  <!--responsive-meta-here-->
  <meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0,width=device-width, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  
  <link href="<?php echo e(asset('public/frontend/css/bootstrap.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('public/frontend/css/fontawesome-all.css')); ?>" rel="stylesheet"/>
  <link href="<?php echo e(asset('public/frontend/css/owl.carousel.min.css')); ?>" rel="stylesheet"/>
  <link href="<?php echo e(asset('public/frontend/css/fontawesome.css')); ?>" rel="stylesheet"/>
  <link href="<?php echo e(asset('public/frontend/css/style.css')); ?>" rel="stylesheet"/>
  <link href="<?php echo e(asset('public/frontend/css/custom.css')); ?>" rel="stylesheet"/>
  <!-- datapicker -->
  
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
  <link rel="stylesheet" type="text/css" href="<?php echo e(url('public/common/sumoselect/sumoselect.min.css')); ?>">
  <link href="<?php echo e(asset('public/frontend/css/responsive.css')); ?>" rel="stylesheet"/>
  <!-- rating -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/css/star-rating-svg.css" integrity="sha256-z7aw+E5lauhUyM3hD0kA9uvTsl9jnF8X7NTub7J8su0=" crossorigin="anonymous">

  <?php echo toastr_css(); ?>
</head>
<body>
<?php if(empty($segment1)): ?>  
<div class="wraper">
<?php else: ?>
<div class="wraper bg-gray">
<?php endif; ?>
<?php echo $__env->make('frontend.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>

<?php echo $__env->make('frontend.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>


 <script type="text/javascript" src="<?php echo e(asset('public/frontend/js/jquery-3.3.1.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/popper.min.js')); ?>"></script>  
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/bootstrap.min.js')); ?>"></script> 
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/owl.carousel.min.js')); ?>"></script> 

<!-- date range picker-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script type="text/javascript" src="<?php echo e(url('public/common/sumoselect/jquery.sumoselect.min.js')); ?>"></script>
<!--validation -->
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/bootstrapValidator.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/frontend/js/custom.js')); ?>"></script>





<script type="text/javascript">
  $('.home-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dot:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})

$(window).scroll(function(){var body=$('body'),scroll=$(window).scrollTop();if(scroll>=5){body.addClass('fixed');}else{body.removeClass('fixed');}});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3F_B_YH0XuWy_EB-zK-w4hyNJ1vjEJqQ&libraries=places&callback=initMap" async defer style="border:0;" allowfullscreen="" width="100%" height="500" frameborder="0">
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<!-- rating -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/star-rating-svg@3.5.0/src/jquery.star-rating-svg.js"></script>
<script>

<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?>

<?php echo $__env->yieldContent('headerscripts'); ?>
<?php echo $__env->yieldContent('scripts'); ?>


</body>
</html><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/layout.blade.php ENDPATH**/ ?>