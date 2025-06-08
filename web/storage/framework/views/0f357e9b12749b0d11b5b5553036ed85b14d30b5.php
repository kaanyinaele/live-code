<?php $__env->startSection('content'); ?>
<section class="content-header">
        <h1>Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active"> view Appointment</li>
  </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><!-- Appointment list --></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                   <th>S.No</th>
                  <th>Service</th>
                  <th>Date</th>
                   <th>Time</th>
                  <th>Address</th>
                 <!--  <th>Additional Information</th> -->
                  <th>Image</th>
                  <th>whatsapp Number</th>
                  <th> status</th>
                </tr>
                  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e(booking_service($data->service_id)); ?></td>
                  <td><?php echo e($data->date); ?></td>
                  <td><?php echo e($data->time); ?></td>
                  <td><?php echo e(substr(strip_tags($data->address),0,80)); ?> </td>
                  <!-- <td><?php echo e($data->additional_information); ?></td> -->
                  <td>
                    <?php if(empty($data->image) || is_null($data->image)): ?>
                     <img src="<?php echo e(asset('public/image/no1.jpg')); ?>" height="60" width="80px">
                    <?php else: ?>
                    <a href="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>">
                      <img src="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>" height="60" width="80px">
                    </a> 
                    <?php endif; ?>
                  </td>
                  <td><?php echo e($data->whatsapp_no); ?></td>
                   <td>
                    <?php if($data->status ==0 || $data->status ==1 ): ?> 
                    Request booking
                    <?php elseif($data->status == 4): ?>
                    upcoming booking
                    <?php elseif($data->status ==5): ?>
                    Complete Booking
                    <?php elseif($data->status ==3): ?>
                    Cancel Booking
                    <?php else: ?>
                    Current Booking
                    <?php endif; ?>
                   </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if(count($datas) ==0): ?>
                <tr>
                  <td colspan="10">
                    <h4 style="text-align:center">No Data Found</h4>
                  </td>
                </tr>
              <?php endif; ?> 
              </table>
              <?php echo e($datas->appends(request()->except('page'))->links()); ?>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/user/view_appointment.blade.php ENDPATH**/ ?>