<?php $__env->startSection('content'); ?>
<section class="content-header">
      <h1>
        Add Sub-category
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Sub-category</li>
      </ol>
</section>
 <section class="content">
      <div class="box bo-co">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        
        <form action="" method="POST">
        <?php echo csrf_field(); ?>
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label>Enter Sub-category Name:</label>
                <input type="text" class="form-control" placeholder="Enter Sub-category" value="<?php echo e(old('sub_category')); ?>" name="sub_category">
                 <span class="form-control-feedback"></span>
                  <?php $__errorArgs = ['sub_category'];
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
            <div class="col-md-6">
               <div class="form-group">
                    <label>Select parent category:</label>
                    <select class="form-control <?php $__errorArgs = ['parent_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"  name="parent_category">
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->category_name); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> 
                    <span class="form-control-feedback"></span>
                    <?php $__errorArgs = ['parent_category'];
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
          <!-- /.row -->
        
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
    </div>
    </div>
    </form>
  </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/sub-category/add.blade.php ENDPATH**/ ?>