<?php $__env->startSection('content'); ?>
<?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<section class="content-header">
 <h1>
  Sub-Category List
  <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Sub-category</li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('sub-category')); ?>" method="POST" class="from-bpox-in" >
            <?php echo csrf_field(); ?>
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Entere Sub category" class="form-control" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </form>
          <a href="<?php echo e(route('sub-category/add')); ?>" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Sub-category</h3>
          </a>
        </div>  
      </div>
    </div>
  </div>
  <div class="row">
    <div class="box bo-co">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable" >
              <tr>
                  <th>S.No</th>
                  <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('sub_category','Sub category '));?></th>
                  <th>Parent Category</th>
                  <th width="60px">Status</th>
                  <th width="100px">Action</th>
              </tr>
                <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $i++; ?>
                  <tr>
                      <td><?php echo e($i); ?></td>
                      <td><?php echo e($data->sub_category); ?></td>
                      <td><?php echo e(show_cat_name($data->parent_category)); ?></td>
                      <td>
                      <?php if($data->status == '0'): ?>
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this sub-cataegory?')" href="<?php echo e(route('sub-category/status',[$data->id,$data->status])); ?>">
                        <i class="fa fa-lock"></i> Active
                      </a>
                      <?php endif; ?>  
                      <?php if($data->status == '1'): ?>
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this sub-cataegory?');" href="<?php echo e(route('sub-category/status',[$data->id,$data->status])); ?>">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                      <?php endif; ?>
                    </td>
                      <td style="width:70px;"> <center>
                      <form method="POST" action="<?php echo e(route('sub-category/delete',[$data->id,$page])); ?>"><?php echo csrf_field(); ?>
                   <!--     <a href="<?php echo e(route('sub-category/view',base64_encode($data->id))); ?>" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a> -->
                      <a href="<?php echo e(route('sub-category/edit',[base64_encode($data->id),$page])); ?>" class="glyphicon glyphicon-edit btn btn-primary btn-sm"></a>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this sub-category')"> <i class="fa fa-trash">
                      </i>
                      </button>
                      </form>
                      </center>
                      </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if(count($datas) ==0): ?>
                  <tr>
                  <td colspan="9">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                <?php endif; ?> 
                
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


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/sub-category/index.blade.php ENDPATH**/ ?>