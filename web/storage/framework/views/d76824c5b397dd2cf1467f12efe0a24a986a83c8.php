<?php $__env->startSection('content'); ?>
 <?php 
   if(!empty($page_no))
      $page = $page_no ;
  else{
      $page=1;
  }
?>

<section class="content-header">
   <h1>
      Update Customer
      <small></small>
   </h1>
   <ol class="breadcrumb">
      <li>
         <a href="<?php echo e(route('dashboard')); ?>">
         <i class="fa fa-dashboard"></i> Home
         </a>
      </li>
      <li class="active">Update Customere</li>
   </ol>
</section>
<section class="content">
   <div class="box box-default">
      <div class="container-fluid">
         <div class="card card-default">
            <div class="box-title">
               <h4 class="card-title"></h4>
            </div>
            <form method="POST" action="<?php echo e(route('update/user',$data->id)); ?>" enctype="multipart/form-data">
               <?php echo csrf_field(); ?>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <input type="hidden" value="<?php echo e($page); ?>" name="hidden" >
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
                        <!-- <div class="form-group">
                           <label for="pwd">Gender:</label>
                           <label>
                           <input id="female" type="radio" name="gender"  value="female" <?php echo e($data->gender =="female" ? 'checked' : ''); ?>/> female
                           </label>
                           <label>
                           <input id="male" type="radio" value="male" name="gender" <?php echo e($data->gender =="male" ? 'checked' : ''); ?>>male
                           </label>
                        </div> -->
                       
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6">
                        
                        <!-- /.form-group -->
                        <!-- <div class="form-group">
                           <label>Address:</label>
                           <div>
                              <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="address" placeholder="address" value="<?php echo e($data->address); ?>">
                           </div>
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
                        </div> -->
                        <div class="form-group">
                           <label for="pwd">Enter ZipCode:</label>
                             <input type="text"  class="form-control" value="<?php echo e($data->zip_code); ?>" placeholder="Enter Zip Code" name="zip_code">
                             <span class="form-control-feedback"></span>
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
                           <?php if(empty($data->image)): ?>
                            <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="select image">
                              </div>
                                <?php $__errorArgs = ['image'];
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
                                 <input type="file" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="select image">
                              </div>
                              <div class="col-md-2">
                                 <img src="<?php echo e(asset('public/image/users/'.$data->image)); ?>" height="34" width="60px">
                              </div>
                                <?php $__errorArgs = ['image'];
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/user/UpdateUserForm.blade.php ENDPATH**/ ?>