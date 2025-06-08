<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
   Slider Image List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Slider Image </li>
  </ol>
</section>
<section class="content" >
  <div class="row">
    <div class="box bo-co float">
      <div class="box-body">
        <div class="col-xs-12 from-lex">
          <form action="<?php echo e(route('sliderimage')); ?>" method="POST" class="from-bpox-in">
            <?php echo csrf_field(); ?>
            <div class="form-group">
            <input type="text" style="height:34px;width: 400px" placeholder="Search" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>" class="form-control" /> 
            </div>
             <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i>
            </button>
            </div>
          </form>
          <a href="<?php echo e(route('sliderimage/add')); ?>" style="float: right;margin-top: -20px">
            <h3 class="box-title btn btn-primary"> Add Slider Image </h3>
          </a>    
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
                  <th width="0px">Image Title</th>
                  <th width="0px">Description</th>
                  <th>Image</th>
                  <th width="60px">Status</th>
                  <th width="90px">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php $i++; ?>
                <tr>
                  <td><?php echo e($i); ?></td>
                  <td><?php echo e($data->title); ?></td>
                  <td><?php echo e($data->description); ?></td>
                  <td><a href="<?php echo e(asset('public/image/slider/'.$data->image)); ?>"><img src="<?php echo e(asset('public/image/slider/'.$data->image)); ?>" height="60px" width="60px"></a></td>
                  <td>
                    <?php if($data->status == 0): ?>
                    <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this image?')" href="<?php echo e(route('sliderimage_status',[$data->id,$data->status])); ?>">
                    <i class="fa fa-lock"></i> Active
                    </a>
                    <?php endif; ?>  
                    <?php if($data->status == 1): ?>
                    <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this image?');" href="<?php echo e(route('sliderimage_status',[$data->id,$data->status])); ?>">
                    <i class="fa fa-unlock-alt"></i> De-Active
                    </a>
                    <?php endif; ?>
                  </td>
                  <td style="width:70px;">
                    <center>
                      <form method="POST" action="<?php echo e(route('delete/sliderimage',$data->id)); ?>"><?php echo csrf_field(); ?>
                        <a href="<?php echo e(route('edit/sliderimage',base64_encode($data->id))); ?>" class=" btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i></a>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this Slider image')"> <i class="fa fa-trash">
                        </i>
                        </button>
                      </form>
                    </center>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(count($image) ==0): ?>
                  <tr>
                  <td colspan="6">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                <?php endif; ?> 
              </tbody>
            </table>
             <?php echo e($image->appends(request()->except('page'))->links()); ?>

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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/sliderimage/index_slider.blade.php ENDPATH**/ ?>