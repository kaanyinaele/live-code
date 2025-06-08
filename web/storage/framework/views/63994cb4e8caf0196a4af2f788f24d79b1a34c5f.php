<?php $__env->startSection('content'); ?>
<section class="content-header">
      <h1>
       Enquiry View
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Enquiry View</li>
      </ol>
</section>
 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Enquiry View</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width:330px">Enquiry</th>
                  <th >Reply</th>
                </tr>
                <tr>
                  <td><?php echo e($data->message); ?></td>
                  <td style="word-break: break-word;"><?php echo $data->reply; ?> </td>
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/enquiry/view.blade.php ENDPATH**/ ?>