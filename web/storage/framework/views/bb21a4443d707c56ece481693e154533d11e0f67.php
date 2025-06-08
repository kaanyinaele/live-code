<?php $__env->startSection('content'); ?>
    <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Welcome Back,</h4>
            <p>Please login to your account</p>
          </div>
          <form action="<?php echo e(route('login')); ?>" method="POST" id="login" >
            <?php echo csrf_field(); ?>
            <div class="from-in-box">
              <div class="form-group ">
                <input type="email" name="email" id="email"  class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email Address" autocomplete="off" value="<?php echo Cookie::get('remembered-email'); ?>">
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

              <div class="form-group  has-feedback">
                <input type="Password" name="passwd"  id="password"  class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password" value="<?php echo Cookie::get('remembered-password'); ?>" autocomplete="new-password">
                  <?php $__errorArgs = ['password'];
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
              <div class="d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                   <input type="checkbox" class="custom-control-input" id="Accept" name="remember_me" 
                    <?php if(Cookie::get('remembered-checkbox') !== null): ?>  checked  <?php endif; ?> />
                   <label class="custom-control-label" for="Accept">Remember Me</label>
                </div>
                <div class="forgot-link"><a href="<?php echo e(route('forgotpassword')); ?>">Forgot Password?</a></div>
              </div>
              <div class="Creat-button-up">
                 <button type="submit" class="nav-link btn  btn-green" href="#">Login</button>
              </div>
              <div class="log-with d-flex"><p>Or you can login with</p><span></span></div>
              <div class="social-icons">
                <a href="<?php echo e(url('auth/facebook')); ?>" ><span><img src="<?php echo e(asset('public/image/sociallink/facebook.png')); ?>" style="height: 40px;width: 40px"></span></a>

                <a href="<?php echo e(url('/auth/twitter')); ?>" target="_blank"><span><img src="<?php echo e(asset('public/image/sociallink/twitter.png')); ?>" style="height: 40px;width: 40px"></span></a>

                 <a href="<?php echo e(url('/auth/google')); ?>" target="_blank"><span><img src="<?php echo e(asset('public/image/sociallink/google.png')); ?>" style="height: 40px;width: 40px"></span></a>
              <!--   <a href="<?php echo e(url('/auth/facebook')); ?>" target="_blank" ><span><img src="<?php echo e(asset('public/image/sociallink/instagram.png')); ?>" style="height: 40px;width: 40px"></span></a> -->
              </div>
               <div class="have-account">
               <span>Don’t have an account?<a href="<?php echo e(route('registration')); ?>">Sign Up</a></span>
             </div>
            </div>
          </form>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/user/login.blade.php ENDPATH**/ ?>