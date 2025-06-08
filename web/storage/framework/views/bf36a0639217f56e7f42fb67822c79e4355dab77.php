<?php $__env->startSection('content'); ?>
<section class="content-header">
      <h1>
        EmailTemplate View
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">EmailTemplate View</li>
      </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="<?php echo e(route('emailtemplate/update',$data->id)); ?>">
        <?php echo csrf_field(); ?>
        <div class="row">
          <div class="col-md-12">
          <label>Title:</label>
          <div class="form-group">
          <input type="textarea" readonly class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="title" value="<?php echo e($data->title); ?>" placeholder="Enter title" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
          </div>
          <label>Subject:</label>
          <div class="form-group">
          <input type="textarea" readonly class="form-control <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="subject" value="<?php echo e($data->subject); ?>" placeholder="Enter subject" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
          </div>
          <label>Description:</label>
          <div class="form-group" style="border: solid 1px #d2d6de;">
            <div class="box-header">
            <div class="box-body pad">
            <textarea disabled class="textarea" placeholder="Place some Description" value="<?php echo e($data->message); ?>" name="message" style="width: 100%; height: 300px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;"><?php echo $data->message; ?></textarea>
            </div>
            </div>
          </div>
      <!-- /.col-->
        </div>
      </div>
    <!-- ./row -->
      
    </form>
  </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/emailtemplate/emailtemplate_view.blade.php ENDPATH**/ ?>