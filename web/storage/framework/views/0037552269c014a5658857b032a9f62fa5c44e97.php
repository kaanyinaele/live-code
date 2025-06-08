<?php $__env->startSection('content'); ?>
  <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Forgot Password</h4>
            <p>Please enter your email to recieve a verification code.</p>
          </div>
          <div class="from-in-box">
            <form method="GET" action="<?php echo e(route('send_mail')); ?>" id="forget_password">
            <?php echo csrf_field(); ?>
              <div class="form-group">
                <input type="text" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email Address">
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong><?php echo e($message); ?></strong>
                </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="Creat-button-up">
               <button type="submit" class="nav-link btn  btn-green" href="#">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/user/forgot_password.blade.php ENDPATH**/ ?>