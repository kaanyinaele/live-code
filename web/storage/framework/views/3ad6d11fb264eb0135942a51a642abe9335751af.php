<?php $__env->startSection('content'); ?>
 <div class="wraper-inner">
    <section class="abouts_page">
    <div class="container">
      <div class="heading text-center">
            <h4><?php echo e($about->title); ?></h4>
            <div class="separator"></div>
          </div>
      <div class="row">
        <div class="col-md-6">
          <div class="about_bg_img">
            <figure><img src="<?php echo e(asset('public/image/about_us2.png')); ?>"></figure>
          </div>
        </div>
        <div class="col-md-6">
          <figcaption>
          <!-- <h3>About</h3> -->
         <?php echo substr($about->description,0,1010); ?>

          </figcaption>
        </div>
      </div>
     <div class="row">  <div class="col-md-12"> 
    
      <?php echo substr($about->description,1010,5000); ?>    
  
     </div>
   </div>
    </div>
   </section>
<!--    <section class="inner_about_des_section">
    <div class="container">
       <div class="mission_about">
        <h3>Our Mission </h3>
       <?php echo $about->our_mission; ?>

      </div>
    </div>
   </section> -->
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/aboutus.blade.php ENDPATH**/ ?>