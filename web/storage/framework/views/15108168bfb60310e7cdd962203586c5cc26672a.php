<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
    Email Template List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Emailtemplate List</li>
  </ol>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box bo-co">
            <div class="box-header">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped datatable">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                 <?php $__currentLoopData = $email; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td><?php echo e($data->title); ?></td>
                    <td><?php echo e($data->subject); ?></td>
                    <td ><?php echo e(strip_tags($data->message)); ?> </td>
                    <td style="width:70px;"> <center>
                     <a href="<?php echo e(route('emailtemplate/view',base64_encode($data->id))); ?>" class="glyphicon glyphicon-eye-open btn btn-primary"></a>

                    <a href="<?php echo e(route('emailtemplate/edit',base64_encode($data->id))); ?>" class="glyphicon glyphicon-edit btn btn-primary"></a>
                    </center>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
           </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/emailtemplate/emailtemplate_index.blade.php ENDPATH**/ ?>