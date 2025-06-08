<?php $__env->startSection('content'); ?>
  <section class="bg_contact">
   <div class="container">
         <div class="heading text-center">
            <h4><?php echo e($contact->title); ?></h4>
            <div class="separator"></div>
          </div>
     <div class="row">
       <div class="col-md-8">
         <div class="contact_form">
             <h2>Send us a message</h2>
          <div class="profile_setup_form">
            <form action="<?php echo e(route('contact')); ?>" method="POST" id="contact_us">
              <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                   <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Name*">
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
              </div> 
              <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="email" placeholder="Email id*" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
             </div>  
            </div>

            <div class="row">
             <div class="col-md-12">
              <div class="form-group">
               <textarea placeholder="Message*" name="message" class="form-control <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"></textarea>
               <?php $__errorArgs = ['message'];
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
             </div> 
            </div>  
      
            <div class="row">
             <div class="col-md-12">
              <div class="form_submit_button">
              <button type="submit" class="nav-link btn  btn-green">Submit</button>
              </div> 
             </div> 
            </div> 
          </form>
          </div>
        </div>
       </div>
       <div class="col-md-4">
         <div class="contact_info">
          <h3>Contact Information</h3>
          <?php echo $contact->description; ?>

           <div class="info_icons">
           <ul>
            <li>
              <span><i class="fas fa-map-marker-alt"></i></span>
              <p><?php echo e($global->address); ?></p>
            </li>
             <li>
              <span><i class="fas fa-phone-volume"></i></span>
              <p><?php echo e($global->phone_no); ?> </p>
            </li>
             <li>
              <span><i class="far fa-envelope"></i></span>
              <p><?php echo e($global->email); ?></p>
            </li>
           </ul>
           </div>
        </div>
       </div>
     </div>
   </div>
 </section>
<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCNlJb_UA48WvlbzERlSXgMTiX6U322B-E
    &q=<?php echo e($global->address); ?>" style="border:0;" allowfullscreen="" width="100%" height="500" frameborder="0">
</iframe>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/cms/contactus.blade.php ENDPATH**/ ?>