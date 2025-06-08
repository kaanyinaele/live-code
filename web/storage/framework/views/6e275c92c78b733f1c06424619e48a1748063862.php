<?php $__env->startSection('content'); ?>
<?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
<section class="content-header">
  <h1>
  Update Provider
  <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
       <a href="<?php echo e(route('dashboard')); ?>">
       <i class="fa fa-dashboard"></i> Home
       </a>
    </li>
    <li class="active">Update Provider</li>
  </ol>
</section>
<section class="content">
   <div class="box bo-co">
      <div class="container-fluid">
         <div class="card card-default">
            <div class="card-header">
               <h4 class="card-title">Update Provider Profile</h4>
            </div>
            <form method="POST" action="<?php echo e(route('provider/update',base64_encode($data->id))); ?>" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <input type="hidden" value="<?php echo e($page); ?>" name="hidden">
                           <label for="z">Full Name:</label>
                           <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e($data->name); ?>"  autofocus placeholder="Full Name">
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
                           <label for="pwd">Email:</label>
                           <div>
                              <input type="email" class="form-control" value="<?php echo e($data->email); ?>" readonly />
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="pwd">Mobile Number:</label>
                           <input type="text" class="form-control <?php $__errorArgs = ['phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone_no" value="<?php echo e($data->phone_no); ?>"  placeholder="Mobile Number">
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
                           <label for="pwd">Overview(aboutus)</label>
                           <textarea class="form-control <?php $__errorArgs = ['overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="overview" value="<?php echo e($data->overview); ?>" rows="3" placeholder="Overview"><?php echo e($data->overview); ?></textarea>
                           <?php $__errorArgs = ['overview'];
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
                     <!-- /.col -->
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pwd">Enter City:</label>
                             <input type="text"  class="form-control" value="<?php echo e($data->city); ?>" placeholder="Enter City" name="city">
                             <span class="form-control-feedback"></span>
                             <?php $__errorArgs = ['city'];
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
                     <!--    <div class="form-group">
                           <?php if(empty($data->document)): ?>
                            <label>Document:</label>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="file" name="document" class="form-control <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                              </div>
                                <?php $__errorArgs = ['document'];
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
                           <?php else: ?>
                           <label>Document :</label>
                           <div class="row">
                              <div class="col-md-10">
                                 <input type="file" name="document" class="form-control <?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                              </div>
                              <div class="col-md-2">
                                 <img src="<?php echo e(asset('public/image/provider_document/'.$data->document)); ?>" height="34" width="71px">
                              </div>
                                <?php $__errorArgs = ['document'];
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
                           <?php endif; ?>
                           </div> -->
                           <div class="form-group">
                           <?php if(empty($data->image)): ?>
                            <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="file" name="provider_profile" class="form-control <?php $__errorArgs = ['provider_profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="select image">
                              </div>
                                <?php $__errorArgs = ['provider_profile'];
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
                           <?php else: ?>
                           <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-10">
                                 <input type="file" name="provider_profile" class="form-control <?php $__errorArgs = ['provider_profile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="select image">
                              </div>
                              <div class="col-md-2">
                                 <img src="<?php echo e(asset('public/image/provider_profile/'.$data->image)); ?>" height="34" width="71px">
                              </div>
                                <?php $__errorArgs = ['provider_profile'];
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
                           <?php endif; ?>
                           </div>

                          <div class="form-group">
                             <label>Business/skill category:</label><br>
                             <select class=" selectpicker selectpickerForm  <?php $__errorArgs = ['skill_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" multiple="multiple" name="skill_category[]" >
                               <?php $__currentLoopData = $skill_cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <?php
                                  $datas = explode(",", $data->skill_category);
                                     if(in_array($service->id, $datas )){
                                       $val = "selected";
                                     }else{
                                     $val = "";
                                   }
                               ?>
                               <option value="<?php echo e($service->id); ?>" <?php echo e($val); ?>><?php echo e($service->category_name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             </select> 
                             <span class="form-control-feedback"></span>
                             <?php $__errorArgs = ['skill_category'];
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
                          <label>Street Name:</label>
                          <input type="text" name="street" class="form-control" value="<?php echo e($data->street); ?>" placeholder="Street Name">
                          <span class="form-control-feedback"></span>
                          <?php $__errorArgs = ['street'];
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
                          <label>Enter Area Address:</label>
                          <input type="text" name="area" class="form-control" value="<?php echo e($data->area); ?>" placeholder="Enter Area Address">
                          <span class="form-control-feedback"></span>
                          <?php $__errorArgs = ['area'];
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
                     <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-bottom: 20px;margin-left: 10px">Update</button>
                  </div>
                </div>
               </div>
               <!-- /.card-body -->
            </form>
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>
<style type="text/css">
  .SumoSelect.sumo_subcategory { width: 100%; display: block; }
   .SumoSelect.sumo_skill_category { width: 100%; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script> 
 //multiple selectbox
  setTimeout(function(){ 
    $('.selectpickerForm').SumoSelect({ okCancelInMulti: true });
      $('.selectpickerForm').css("height",0); 
  },100);
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/provider/edit.blade.php ENDPATH**/ ?>