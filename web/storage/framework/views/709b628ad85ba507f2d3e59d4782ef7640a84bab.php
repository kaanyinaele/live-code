<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    Add Customer
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Add Customer</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="container-fluid">
      <!-- SELECT2 EXAMPLE -->
      <div class="card card-default">
        <div class="card-header">
          <h3 class="card-title"></h3>
        </div>
        <!-- /.card-header -->
        <form action="<?php echo e(route('add/registration')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
          <div class="card-body">
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Enter Full Name:</label>
                    <input type="text" class="form-control" placeholder="Full name" value="<?php echo e(old('name')); ?>" name="name" >
                    <span class="form-control-feedback"></span>
                   <!--  <div class="help-block with-errors"></div> -->
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" style="color: red">
                    <strong ><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
                  
                  <div class="form-group">
                    <label>Enter Password:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="help-block with-errors"></div>
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
                    <label>Enter Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control"  placeholder="Confirm Password">
                    <span class="form-control-feedback"></span>
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
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Enter Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" />
                    <div class="help-block with-errors"></div>
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
                    <!-- <div class="form-group">
                    <lable>Enter Address:</lable>
                    <input type="text"  class="form-control" value="<?php echo e(old('address')); ?>" placeholder="Enter address" name="address">
                    <span class="form-control-feedback"></span>
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
                    <label>Enter Zip Code:</label>
                    <input type="text"  class="form-control" value="<?php echo e(old('zip_code')); ?>" placeholder="Enter Zip Code" name="zip_code">
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
                    <label>Enter Mobile Number:</label>
                    <input type="text" name="phone_no" class="form-control" value="<?php echo e(old('phone_no')); ?>" placeholder="Enter Mobile Number">
                    <span class="form-control-feedback"></span>
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
                 
                </div>
              </div>
              <div class="row">
                <div class="col-xs-8">
                  <div class="checkbox icheck">
                  </div>
                </div>
                <!-- /.col -->
                <div class=" form-group col-xs-4">
                  <button type="submit" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/user/AddUser.blade.php ENDPATH**/ ?>