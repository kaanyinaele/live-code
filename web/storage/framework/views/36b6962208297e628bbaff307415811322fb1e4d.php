<?php $__env->startSection('content'); ?>
<section class="content-header">
  <?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
  <h1>
   Blog Edit
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Blog Edit</li>
  </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <form method="POST"  action="<?php echo e(route('blog_update',$data->id)); ?>" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
      <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <input type="hidden" value="<?php echo e($page); ?>" name="hidden">
            <label>Enter Title</label>
           <textarea name="title" class="form-control <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter title" rows="2" /><?php echo e($data->title); ?></textarea>
           <span class="form-control-feedback"></span>
           <?php $__errorArgs = ['title'];
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
          <label>Enter Description</label>
          <div class="box form-group">
            <div class="form-group">
              <h3 class="box-title">
              </h3>
            </div>
            <div class="box-body pad">
              <!-- <textarea placeholder="Place your description" class="textarea" name="description" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;"><?php echo e($data->description); ?></textarea> -->
               <textarea placeholder="Place your description" name="description"><?php echo e($data->description); ?></textarea>
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
            <div class="row">
             <div class="col-md-6">
             <div class="form-group">
                <label>featured Image:</label>
                <input type="file" name="featured_image" class="form-control" placeholder="Upload image">
                <image src="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>" height="50px" width="50px">
                <span class="form-control-feedback"></span>
                <?php $__errorArgs = ['featured_image'];
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
                <label>Image:</label>
                <input type="file" name="image" class="form-control" placeholder="Upload image">
                <image src="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>" height="50px" width="50px">
                <span class="form-control-feedback"></span>
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
            </div>
          </div>

          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
 </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
 <script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "<?php echo e(route('ckeditor.upload', ['_token' => csrf_token() ])); ?>",
        filebrowserUploadMethod: 'form'
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/blog/edit.blade.php ENDPATH**/ ?>