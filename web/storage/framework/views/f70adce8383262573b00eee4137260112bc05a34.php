<?php $__env->startSection('content'); ?> 
<?php echo $__env->make('frontend.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Account Settings</h4>
          </div>
          <div class="from-in-box m-auto">
            <form  action="<?php echo e(route('accountsetting')); ?>" method="POST" id="account_setting" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="account-profile-box">
                <div class="profile-linkes">
                  <figure>
                    <?php if(empty(Auth::user()->image)): ?>
                      <img src="<?php echo e(asset('public/user.png')); ?>">
                    <?php else: ?>
                      <img src="<?php echo e(asset('public/image/users/'.profile_image()->image)); ?>">
                    <?php endif; ?>
                  </figure>
                  <div class="form-group">
                    <a href="javascript:;">
                      <label for="profile_image">
                        <i class="fas fa-pencil-alt"></i>
                      </label>
                    </a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="profile_image" style="visibility: hidden; height: 0px;">
              </div>
              <div class="form-group">
                <input type="text" name="" class="form-control" value="<?php echo e($data->name); ?>" disabled="">
              </div>
              <div class="form-group">
                <input type="text" name=""  class="form-control" value="<?php echo e($data->email); ?>" disabled="">
              </div>
              <div class="form-group">
                <input type="text" name="mobile_no" class="form-control <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Contact Number" value="<?php echo e($data->phone_no); ?>">
                 <?php $__errorArgs = ['mobile_no'];
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
                <input type="text" id="address" name="address" value="<?php echo e($data->address); ?>" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Address">
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
              <div class="Creat-button-up">
               <button type="submit" class="nav-link btn  btn-green">Submit</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('scripts'); ?>
<script>
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
          return false;
      });
  }
  $(document).on('keypress', '#'+field_id, function (e) { if (e.which == 13) e.preventDefault(); });
  $(document).on('keyup', '#'+field_id, function (e) {
      if($(this).val() != old_address) autocompleted = false;
      if( (e.which == 46) || (e.which == 8) ){ autocompleted = false; }
  });
  $(document).on('paste', '#'+field_id, function (e) { autocompleted = false; });
  $(document).on('blur', '#'+field_id, function (e) { if(autocompleted == false){ $(this).val(""); $(this).trigger("change"); } });
  // google.maps.event.addDomListener(window, 'load', init);
 </script>
<?php $__env->stopSection(); ?>   


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/user/account_setting.blade.php ENDPATH**/ ?>