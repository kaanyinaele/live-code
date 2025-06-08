<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
   Edit CMSPage
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit CMSPAGE</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <form method="POST" action="<?php echo e(route('cmspage/update',$cms->id)); ?>">
    	<?php echo csrf_field(); ?>
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <label>Title:</label>
            <div class="form-group">
               <input type="text" class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e($cms->title); ?>" placeholder="Enter title" style="margin-bottom: 10px"/>
               <span class="form-control-feedback"></span>
               <?php $__errorArgs = ['title'];
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
           <label>Description:</label>
            <div class=" form-group area-bo">
              <div class="box-body pad">
              <textarea class="textarea" placeholder="Place some Description" value="<?php echo e($cms->description); ?>" name="description" style="width: 100%; height: 240px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;"><?php echo $cms->description; ?></textarea>
              <?php $__errorArgs = ['description'];
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
        </div>
      <!-- ./row -->
      <div class="row">
        <div class="col-xs-8">
        <div class="checkbox icheck"></div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Update</button>
        </div>
      </div>
    </div>
  </form>
</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/cmspage/editcms_page.blade.php ENDPATH**/ ?>