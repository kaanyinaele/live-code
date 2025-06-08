<?php $__env->startSection('content'); ?>
  <section class="inner_Privacy_Policy_section">
    <div class="container">
        <div class="heading text-center">
          <div class="back-icon"><a href="<?php echo e(route('registration')); ?>"><i class="fas fa-arrow-left"></i></a></div>
          <h4><?php echo e($data->title); ?></h4>
          <div class="separator">
        </div>
      </div>
      <figcaption>
        <?php echo $data->description; ?>

      </figcaption>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/term-condition.blade.php ENDPATH**/ ?>