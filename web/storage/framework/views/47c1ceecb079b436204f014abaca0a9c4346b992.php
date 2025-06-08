<?php $__env->startSection('content'); ?>
<section class="content-header">
  <?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<h1>
 Blog List
  <small></small>
</h1>
<ol class="breadcrumb">
  <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Blog</li>
</ol>
</section>
<section class="content">
  <div class="row">
    <div class="box bo-co flex">
      <div class="box-body">
        <div class="col-xs-12 from-lex">
          <form action="<?php echo e(route('blog_search')); ?>" method="POST" class="from-bpox-in">
            <?php echo csrf_field(); ?>
            <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Search" class="form-control" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </form>
          <a href="<?php echo e(route('blog/add')); ?>" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Blog</h3>
          </a>
        </div>  
      </div>
    </div>
  </div>
  <div class="row">
    <div class="box bo-co flex">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>S.No</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('title','title'));?></th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('description','description'));?></th>
                <th>Image</th>
                <th>Featured Image</th>
                <th>Status</th>
                <th style="width:130px;">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php $i++; ?>
              <tr> 
                <td><?php echo e($i); ?></td>
                <td><?php echo e($data->title); ?> </td>
                <td><?php echo e(substr(strip_tags($data->description),0,60)); ?> </td>
                <td>
                  <a href="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>">
                  <image src="<?php echo e(asset('public/image/blog_image/'.$data->image)); ?>" height="50px" width="50px">
                  </a>
                  </td>
                  <td>
                    <a href="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>">
                    <image src="<?php echo e(asset('public/image/blog_featured/'.$data->featured_image)); ?>" height="50px" width="50px">
                    </a>
                  </td>
                 <td>
                <?php if($data->status == '0'): ?>
                <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this blog?')" href="<?php echo e(route('blog/status',[$data->id,$data->status])); ?>">
                  <i class="fa fa-lock"></i> Active
                </a>
                <?php endif; ?>  
                <?php if($data->status == '1'): ?>
                <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this blog?');" href="<?php echo e(route('blog/status',[$data->id,$data->status])); ?>">
                  <i class="fa fa-unlock-alt"></i> De-Active
                </a>
                <?php endif; ?>
                </td>
                <td>
                 <center>
                <form method="POST" action="<?php echo e(route('blog/delete',[$data->id,$page])); ?>">
                  <?php echo csrf_field(); ?>
                <a href="<?php echo e(route('blog/edit',[base64_encode($data->id),$page])); ?>" class="btn btn-primary btn-sm">
                <i class="glyphicon glyphicon-edit"></i>
               </a>
                <a href="<?php echo e(route('blog/view',base64_encode($data->id))); ?>" class="btn btn-primary btn-sm"> 
                  <i class="glyphicon glyphicon-eye-open"></i>
                </a>
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this blog')"> 
                  <i class="fa fa-trash"></i>
                </button>
                </form>
                </center>
                </td>
              </tr>
             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php if(count($datas) ==0): ?>
            <tr>
              <td colspan="7">
               <h4 style="text-align:center">No data found</h4>
              </td>
            </tr>
           <?php endif; ?> 
          </tbody>
        </table>
          <?php echo e($datas->appends(request()->except('page'))->links()); ?>

        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/blog/index.blade.php ENDPATH**/ ?>