<?php $__env->startSection('content'); ?>
<section class="content-header">
      <h1>
        Provider Detail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Provider Detail</li>
      </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box bo-co">
            <div class="box-header with-border">
              <h3 class="box-title">Provider Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>City</th>
                  <th>overview</th>
                  <th>Registration Date</th>
                  <th>Area</th>
                   <th>Street</th>
                   <th>Skill Category</th>
                  <th>Document</th>
                  <th>Profile</th>
                </tr>

                <tr>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->phone_no); ?></td>
                  <td><?php echo e($data->city); ?></td>
                   <td><?php echo e($data->overview); ?></td>
                  <td><?php echo e($data->created_at->format('d-m-Y')); ?></td>
                  <td><?php echo e($data->area); ?></td>
                  <td><?php echo e($data->street); ?></td>
                  <td>
                    <?php
                    $cat = explode(',', $data->skill_category); 
                    $num = count($cat);
                    ?>
                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php echo e(show_cat_name($info)); ?> 
                     <?php if(($num - 1) > $key): ?>
                     ,
                     <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </td>
                  <td>
                  <?php if(!empty($data->document)): ?>
                    <?php
                    $cat = explode(',', $data->document); 
                    $num = count($cat);
                    ?>
                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <a target="_blank" href="<?php echo e(asset('public/image/provider_document/'.$info)); ?>">
                    <i class="glyphicon glyphicon-download-alt"></i>
                      <!-- <img src="<?php echo e(asset('public/image/provider_document/'.$info)); ?>" height="40px" width="50px" style="margin-bottom: 5px"> -->
                    </a>
                     <?php if(($num - 1) > $key): ?>
                     <br>
                     <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php else: ?>
                  <img src="<?php echo e(asset('public/dummy.jpg')); ?>" height="50px" width="50px">
                  <?php endif; ?>
                 </td>
                 <td>
                    <?php if(!empty($data->image)): ?>
                      <a href="<?php echo e(asset('public/image/provider_profile/'.$data->image)); ?>">
                      <img src="<?php echo e(asset('public/image/provider_profile/'.$data->image)); ?>" height="50px" width="50px">
                     </a>
                    <?php else: ?>
                      <img src="<?php echo e(asset('public/dummy.jpg')); ?>" height="50px" width="50px" >
                    <?php endif; ?>
                  </td>

                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/provider/view.blade.php ENDPATH**/ ?>