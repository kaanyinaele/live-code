<?php $__env->startSection('content'); ?>
<section class="content-header">
        <h1>Customer View
        <small></small>
      </h1>
      <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Customer view</li>
  </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Customer list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                <!--   <th>Address</th> -->
                  <th>Zip Code</th>
                  <th>Registration Date</th>
                  <th>Image</th>
                </tr>
                <tr>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->phone_no); ?></td>
                  <!-- <td><?php echo e($data->address); ?></td> -->
                 <td><?php echo e($data->zip_code); ?></td>
                  <td><?php echo e($data->created_at->format('d-m-Y')); ?></td>
                  <td>
                  <?php if(!empty($data->image)): ?>
                  <a href="<?php echo e(asset('public/image/users/'.$data->image)); ?>">
                  <img src="<?php echo e(asset('public/image/users/'.$data->image)); ?>" height="50px" width="50px">
                  </a>
                  <?php else: ?>
                  <a href="<?php echo e(asset('public/user.png')); ?>">
                  <img src="<?php echo e(asset('public/user.png')); ?>" height="50px" width="50px">
                  <?php endif; ?>
                  </a>
                 </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/user/viewuser.blade.php ENDPATH**/ ?>