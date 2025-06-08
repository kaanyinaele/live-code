<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
   Enquiry List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Enquiry </li>
  </ol>
</section>
<section class="content" >
<div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('enquiry')); ?>" method="POST" class="from-bpox-in" >
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input type="text" style="height:34px; width: 500px" placeholder="Enter Name" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>" class="form-control" />
            </div><div class="form-group">
            <button type="submit" id="button" class="btn btn-primary">
                  <i class="glyphicon glyphicon-search"></i>
              </button></div>
          </form> 
         
        </div>  
      </div>
    </div>
  </div>
<div class="row">
    <div class="box bo-co">
      <div class="box-body">
        <div class="col-xs-12">    
            <table id="example1" class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th width="0px"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name','Name'));?></th>
                  <th width="0px"><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('email','Email'));?></th>
                  <th>Time</th>
                   <th>View</th>
                  <th width="90px">Reply</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $enquiry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $i++; ?>
                <tr>
                  <td><?php echo e($i); ?></td>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->created_at); ?></td>
                   <td> <a href="<?php echo e(route('enquiry/view',base64_encode($data->id))); ?>">
                    <i class="glyphicon glyphicon-eye-open btn btn-success"></i></a>
                  </td>
                  <td>
                    <?php if($data->reply_status == 0): ?>
                    <a href="<?php echo e(route('enquiry/reply',base64_encode($data->id))); ?>" class="btn btn-primary">Reply</a>
                    <?php else: ?>
                    <h5 class="text-success">Already replied</h5>
                    <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($enquiry) ==0): ?>
                  <tr>
                  <td colspan="6">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                <?php endif; ?> 
              </tbody>
            </table>
             <?php echo e($enquiry->appends(request()->except('page'))->links()); ?>

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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/enquiry/index.blade.php ENDPATH**/ ?>