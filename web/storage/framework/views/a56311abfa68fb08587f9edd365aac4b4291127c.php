<?php $__env->startSection('content'); ?>
 <section class="sec-padding blog-detail-sec">
      <div class="container">
        <div class="blog-detail-box">
          <figure>
          	<img src="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>">
          </figure>
          <figcaption>
            <span><?php echo e($data->created_at->format('F dS Y')); ?></span>
            <h4><?php echo e($data->title); ?></h4>
            <p><?php echo $data->description; ?></p>
          </figcaption>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/blog_detail.blade.php ENDPATH**/ ?>