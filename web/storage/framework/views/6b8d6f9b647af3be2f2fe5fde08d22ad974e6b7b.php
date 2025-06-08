<?php $__env->startSection('content'); ?>
<?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<section class="content-header">
 <h1>
  Service category
  <small>List</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Service category </li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('service/index')); ?>" method="POST" class="from-bpox-in" >
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
          <a href="<?php echo e(route('add/services')); ?>" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Service category</h3>
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
                  <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('category_name','Service category Name'));?></th>
                 <!--  <th>Service Offered</th> -->
                  <th>Service Overview</th>
                <!--   <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Availability','Availability'));?></th> -->
                 <!--  <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('Price','Price'));?></th> -->
                  <th>Image</th>
                  <th>Featured Image</th>
                  <th width="">Status</th>
                  <th width="130">Action</th>
              </tr>
                <?php $__currentLoopData = $service; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $i++; ?>
                  <tr>
                      <td><?php echo e($i); ?></td>
                      <td><?php echo e($data->category_name); ?></td>
                      <!-- <td><?php echo e($data->services_offered); ?></td> -->
                      <td><?php echo substr(strip_tags($data->service_overview),0,80); ?> </td>
                    <!--   <td><?php echo e($data->Availability); ?></td> -->
                      <!-- <td><?php echo e($data->price); ?></td> -->
                     <td>
                      <a href="<?php echo e(asset('public/image/service/'.$data->image)); ?>">
                        <img src="<?php echo e(asset('public/image/service/'.$data->image)); ?>" height="60" width="80px"/>
                      </a>
                    </td>

                      <td>
                        <a href="<?php echo e(asset('public/image/featured_image/'.$data->featured_image)); ?>">
                          <img src="<?php echo e(asset('public/image/featured_image/'.$data->featured_image)); ?>" height="60" width="80px"/>
                        </a>
                      </td>
                      <td>
                      <?php if($data->active_status == '0'): ?>
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this serive-cataegory?')" href="<?php echo e(route('category/status',[$data->id,$data->active_status])); ?>">
                        <i class="fa fa-lock"></i> Active
                      </a>
                      <?php endif; ?>  
                      <?php if($data->active_status == '1'): ?>
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this serive-cataegory?');" href="<?php echo e(route('category/status',[$data->id,$data->active_status])); ?>">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                      <?php endif; ?>
                    </td>
                      <td style="width:70px;"> <center>
                      <form method="POST" action="<?php echo e(route('delete/service',[$data->id,$page])); ?>"><?php echo csrf_field(); ?>
                       <a href="<?php echo e(route('view/service',base64_encode($data->id))); ?>" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a>
                      <a href="<?php echo e(route('edit/service',[base64_encode($data->id),$page])); ?>" class="glyphicon glyphicon-edit btn btn-primary btn-sm"></a>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this serive-cataegory ?')"> <i class="fa fa-trash">
                      </i>
                      </button>
                      </form>
                      </center>
                      </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if(count($service) ==0): ?>
                  <tr>
                  <td colspan="9">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                <?php endif; ?> 
                
              </table>
              <?php echo e($service->appends(request()->except('page'))->links()); ?>

        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<?php $__env->stopSection(); ?> 


<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/ServiceManagement/ServiceManagementIndex.blade.php ENDPATH**/ ?>