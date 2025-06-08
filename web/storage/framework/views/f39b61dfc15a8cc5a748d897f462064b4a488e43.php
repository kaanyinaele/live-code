<?php $__env->startSection('content'); ?>
    <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Create your account,</h4>
            <p>Please fill your details below</p>
          </div>
          <form action="<?php echo e(route('registration')); ?>" method="POST" id="registration" autocomplete="off">
            <?php echo csrf_field(); ?>
            <div class="from-in-box">
              <div class="form-group">
                  <div class="radio-sec">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="customRadioInline1" value="1" name="radio_status" class="custom-control-input">
                      <label class="custom-control-label" for="customRadioInline1" >I am individual</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="2" id="customRadioInline2" name="radio_status" class="custom-control-input">
                      <label class="custom-control-label" for="customRadioInline2">I am Corporate</label>
                    </div>
                  </div>
              </div>
            <div class="form-group">
              <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Full Name*">
              <?php $__errorArgs = ['name'];
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
            <div class="form-group">
              <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Email Address*">
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
            <div class="form-group">
              <input type="text" name="phone_no" value="<?php echo e(old('phone_no')); ?>" class="form-control <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Mobile Number*">
              <?php $__errorArgs = ['phone_no'];
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
            <div class="form-group">
              <input type="text" name="zip_code" value="<?php echo e(old('zip_code')); ?>" class="form-control <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Zip Code">
              <?php $__errorArgs = ['zip_code'];
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
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Password*" >
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
            <div class="form-group">
              <input type="password" name="confirm_password" id="cpass"  class="form-control" placeholder="Confirm Password*">
              <?php $__errorArgs = ['confirm_password'];
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
            <div class="form-group">
              <input type="text" name="address" id="address" class="form-control" placeholder="Address*">
              <?php $__errorArgs = ['address'];
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
            <div class="form-group custom-control custom-checkbox">
              <input type="checkbox" class="form-control custom-control-input <?php $__errorArgs = ['Accept'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="Accept" name="Accept">
              <label class="custom-control-label" for="Accept"><a href="<?php echo e(route('term-condition')); ?>">Accept terms & conditions</a></label><br>
              <?php $__errorArgs = ['Accept'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" style="color: red">
              <strong><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="Creat-button-up">
             <button type="submit" class="nav-link btn btn-green" >Next</button>
            </div>
             <div class="have-account">
               <span>If you have an account? <a href="<?php echo e(route('login')); ?>">Sign in</a></span>
             </div>
            </div>
          </form>
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  $( "#password" ).keyup(function() {
    $(this).closest('form').bootstrapValidator('revalidateField', 'confirm_password');
});
</script>

<!-- <script>
var autocompleted    =  true;
var field_id         =  "address";
var old_address      =  $("#"+field_id).val();
function initMap() {
  var input = document.getElementById(field_id);
  var autocomplete = new google.maps.places.Autocomplete(input);
  google.maps.event.addListener(autocomplete, 'place_changed', function () {
  old_address    =  $("#"+field_id).val();
  var place = autocomplete.getPlace();
  autocompleted = true;
  $('#registration').bootstrapValidator('revalidateField', 'address');
  return false;
  });
}
$(document).on('keypress', '#'+field_id, function (e) { if (e.which == 13) e.preventDefault(); 
});
$(document).on('keyup', '#'+field_id, function (e) {
    if($(this).val() != old_address){
      autocompleted = false;
    } 
    if( (e.which == 46) || (e.which == 8) ){ autocompleted = false; 
  }
});
$(document).on('paste', '#'+field_id, function (e) { autocompleted = false; });
$(document).on('blur', '#'+field_id, function (e) {

  if(autocompleted == false){ 
  $(this).val(""); $(this).trigger("keyup"); 
  $('#registration').bootstrapValidator('revalidateField', 'address');
  }
});
  // google.maps.event.addDomListener(window, 'load', init);
  //var validation=document.getElementById(address).val(); 

  //  $(document).on('change', '#address', function () {
  //     $('#registration').bootstrapValidator('revalidateField', 'address');
  // });
 </script> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/user/registration.blade.php ENDPATH**/ ?>