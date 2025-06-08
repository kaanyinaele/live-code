<?php $__env->startSection('content'); ?>
  <section class="inner_Privacy_Policy_section">
    <div class="faq_list-box">
      <div class="heading text-center">
        <h4>FAQ</h4>
        <div class="separator"></div>
      </div> 
      <div class="container"> 
        <?php $__currentLoopData = $faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
          <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a role="button"  data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($data->id); ?>" aria-expanded="false" aria-controls="collapseOne">
                  <span>Q: </span><?php echo e($data->question); ?>

                </a>
              </h4>
            </div>
          <div id="<?php echo e($data->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
             <div class="panel-body">
             <span>A:</span>
             <?php echo $data->answer; ?>

            </div>
          </div>
          </div>
        </div> 
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div> 
    </div>
  </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/faq.blade.php ENDPATH**/ ?>