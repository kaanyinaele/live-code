<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
   Blog View
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Blog View</li>
  </ol>
</section>
 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width:330px">Title</th>
                  <th >Description</th>
                   <th>Featured Image</th>
                  <th>Image</th>
                </tr>
                <tr>
                  <td><?php echo e($data->title); ?></td>
                  <td style="word-break: break-word;"><?php echo $data->description; ?> </td>
                  <td>
                   <a href="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>">
                    <image src="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>" height="50px" width="50px">
                    </a>
                  </td>
                  <td>
                    <a href="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>">
                    <image src="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>" height="50px" width="50px">
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
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/blog/view.blade.php ENDPATH**/ ?>