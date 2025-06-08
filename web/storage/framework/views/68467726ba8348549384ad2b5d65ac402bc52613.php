<?php $__env->startSection('content'); ?>  
<?php echo $__env->make('frontend.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Payment Settings</h4>
          </div>
          <div class="row">
            <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
              <div class="Payment-in-box">
                <h6><?php echo e($data->cardholder_name); ?></h6>
                <p><?php echo e($data->card_number); ?></p>
                <div class="d-flex Payment-in-butt">
                   <a class="nav-link btn  btn-green" href="<?php echo e(route('edit',base64_encode($data->id))); ?>">Edit</a>
                    <?php if($data->defalut_card == 0): ?>
                      <a class="nav-link btn btn-yellow" href="<?php echo e(route('delete',base64_encode($data->id))); ?>" onclick='return confirm("Are you sure with this action")'> Delete</a>
                    <?php endif; ?>
                   <?php if($data->defalut_card ==  '1'): ?>
                   <a class="nav-link btn btn-gray Payment-default" >Default</a>
                   <?php else: ?>
                   <a class="nav-link btn btn-gray" href="<?php echo e(route('card-defalut',[base64_encode($data->id)])); ?>">Make as default</a>
                   <?php endif; ?>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
           <div class="new-card-buttn">
            <a class="nav-link btn  btn-green" href="<?php echo e(route('addcard')); ?>">Add new card</a>
           </div>
        </div>
      </div>
  </section>
 <?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/payment/payment_setting.blade.php ENDPATH**/ ?>