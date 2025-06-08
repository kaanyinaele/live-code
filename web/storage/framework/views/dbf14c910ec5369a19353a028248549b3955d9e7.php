<?php $__env->startSection('content'); ?>
<section class="content-header">
  <?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
  <h1>
   Location Edit
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Location Edit</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="<?php echo e(route('location/update',$data->id)); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" value="<?php echo e($page); ?>" name="hidden">
              <label>Location Name</label>
                <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter Location Name" value="<?php echo e($data->name); ?>">
                <span class="form-control-feedback"></span>
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
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck"></div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary pull-right">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/location/edit.blade.php ENDPATH**/ ?>