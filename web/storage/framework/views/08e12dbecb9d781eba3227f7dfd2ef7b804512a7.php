<?php $__env->startSection('content'); ?>
<?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
<section class="content-header">
  <h1>
        Update Service Category
   
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Update Service Category</li>
  </ol>
</section>
<section class="content">
  <div class="box bo-co">
    <div class="box-header with-border">
      <h3 class="box-title"></h3>
    </div>
    <!-- /.box-header -->
    <form action="<?php echo e(route('update/service',base64_encode($data->id))); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
        
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="hidden" value="<?php echo e($page); ?>" name="hidden">
              <label> Service Category Name:</label>
              <input type="text" class="form-control" placeholder="Service name"  name="category_name"  value="<?php echo e($data->category_name); ?>">
                <span class="form-control-feedback"></span>
               <!--  <div class="help-block with-errors"></div>   -->
                  <?php $__errorArgs = ['category_name'];
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
           
             <!--  <div class="form-group">
                <label>Services Offered:</label>
                <input type="text" class="form-control" placeholder="Service Offered"  name="services_offered"  value="<?php echo e($data->services_offered); ?>">
                  <span class="form-control-feedback"></span>
                  <div class="help-block with-errors"></div>  
                  <?php $__errorArgs = ['services_offered'];
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
                </div> -->
              <!--   <div class="form-group">
                  <label>Services Price:</label>
                  <input type="text" class="form-control" placeholder="Service Price" value="<?php echo e($data->price); ?>"  name="price" >
                    <span class="form-control-feedback"></span>
                      <?php $__errorArgs = ['price'];
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
                  </div> -->
                  <div class="form-group">
                    <label>Service Image:</label>
                    <div class="row">
                     <div class="col-md-10">
                    <input type="file" name="image" class="form-control" placeholder="Upload image" value="<?php echo e($data->Image); ?>">
                    </div>
                     <div class="col-md-2">
                      <img src="<?php echo e(asset('public/image/service/'.$data->image)); ?>" height="34px" width="70">
                     </div>
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
                <div class="col-md-6">
                  <div class="form-group">
                  <label>Featured Image:</label>
                   <div class="row">
                     <div class="col-md-10">
                  <input type="file" name="featured_image" class="form-control" value="<?php echo e($data->featured_image); ?>" placeholder="Upload image">
                </div>
                   <div class="col-md-2">
                    <img src="<?php echo e(asset('public/image/featured_image/'.$data->featured_image)); ?>" height="34px" width="70">
                   </div>
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
              </div>
            </div>
              <div class="row">
                    <div class="col-md-12">
                     <label>Services Overview:</label>
                      <div class="box form-group">
                        <div class="form-group">
                          <h3 class="box-title">
                          </h3>
                        </div>
                        <div class="box-body pad">
                            <textarea placeholder="Place overview" class="textarea <?php $__errorArgs = ['service_overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="service_overview" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;"><?php echo e($data->service_overview); ?></textarea>
                            <span class="form-control-feedback"></span>
                             <?php $__errorArgs = ['service_overview'];
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
                      <!-- <div class="form-group">
                        <label>Services Availability:</label>
                        <input type="text" class="form-control" placeholder="Service Availability"  name="Availability"  value="<?php echo e($data->Availability); ?>">
                          <span class="form-control-feedback"></span>
                            <?php $__errorArgs = ['Availability'];
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
              
                        </div> -->
                      
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                      <div class="col-xs-8">
                        <div class="checkbox icheck"></div>
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/ServiceManagement/EditService.blade.php ENDPATH**/ ?>