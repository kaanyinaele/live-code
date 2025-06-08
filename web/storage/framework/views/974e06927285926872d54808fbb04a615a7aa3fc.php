<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
   Enquiry Reply
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Enquiry Reply</li>
  </ol>
</section>
<section class="content">
   <div class="box box-default">
    <div class="box-body">
    <form method="POST" action="<?php echo e(route('enquiry/reply',base64_encode($data->id))); ?>">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Enquiry</label>
           <textarea type="text" disabled=""  value="<?php echo e($data->message); ?>" class="form-control" rows="2" /><?php echo e($data->message); ?></textarea>
          </div>
           <label>Reply</label>
          <div class="form-group" style="border: solid 1px #d2d6de;">
            <div class="box-body pad">
                <textarea  placeholder="Place your reply" name="reply"  class="textarea <?php $__errorArgs = ['reply'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                 style="width: 100%; height: 300px; font-size: 14px; line-height: 45px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                 <span class="form-control-feedback"></span>
                 <?php $__errorArgs = ['reply'];
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
        <!-- /.col-->
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary pull-right">Send</button>
          </div>
      </div>
    </form>
  </div>
</div>
</section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/enquiry/reply.blade.php ENDPATH**/ ?>