<?php $__env->startSection('content'); ?>
<section class="content-header">
 <h1>
  Service Request
  <small>List</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"> Service Request</li>
 </ol>
</section>
     <section class="content">
      <div class="row">
       <!--  <div class="col-md-12"> -->
          <div class="box bo-co">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Service</th>
                  <th>User Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Address</th>
                  <th>Sub-Category</th>
                  <th>Mobile Number</th>
                  <th>Whatsapp Number</th>
                  <th>Additional Information</th>
                  <th>Image</th>
                  <?php if(empty($data->price)): ?>
                  <th>Price</th>
                  <?php else: ?>
                  <th>Total Price</th>
                  <th>Service</th>
                  <th>Unit/Cost</th>
                  <th>Qyantity</th>
                  <th>Price</th>
                  <?php endif; ?>
                </tr>
                <tr>
                  <td><?php echo e(booking_service($data->service_id)); ?></td>
                      <td><?php echo e(user_name($data->user_id)); ?></td>
                      <td><?php echo e($data->date); ?></td>
                      <td><?php echo e($data->time); ?></td>
                      <td><?php echo e(substr(strip_tags($data->address),0,80)); ?> </td>
                      <td>
                       <?php
                        $cat = explode(',', $data->sub_category);  
                        $num = count($cat);
                        ?>
                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php echo e(book_subcategory($info)); ?> 
                         <?php if(($num - 1) > $key): ?>
                         
                         <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </td>
                      <td><?php echo e($data->mobile_no); ?></td>
                      <td><?php echo e($data->whatsapp_no); ?></td>
                      <td><?php echo e($data->additional_information); ?></td>
                      
                      <td> <a href="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>"><img src="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>" height="60" width="60px"></a>
                      </td>
                      <td>
                      <?php if(empty($data->price)): ?>
                        <a class="btn btn-danger">Not Send Price</a>
                      <?php else: ?>
                    <?php echo e($data->price); ?>

                      <?php endif; ?>
                    </td>
                    <?php if(!empty($data->price)): ?>
                    <td>
                      <?php $store=price_data($data->id); ?>
                     <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($display->service_name.','); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </td>
                    <td>
                      <?php $store=price_data($data->id); ?>
                     <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($display->cost.','); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </td>
                    <td>
                      <?php $store=price_data($data->id); ?>
                     <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($display->quantity.','); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    </td>
                    <td>
                     <?php $store=price_data($data->id); ?>
                     <?php $__currentLoopData = $store; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $display): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php echo e($display->calculate_price.','); ?>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                    </td>
                    <?php endif; ?>
                      
                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->
       <!--  </div> -->
      </div>
    </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/request_booking/view.blade.php ENDPATH**/ ?>