<?php $__env->startSection('content'); ?>
<section class="content-header">
 <h1>
  Booking Service List
  <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Booking Service </li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('booking')); ?>" method="POST" class="from-bpox-in" >
            <?php echo csrf_field(); ?>
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Enter Date" class="form-control" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </form>
         
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
                  <th>Service</th>
                  <th>User Name</th>
                  <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('date','Date'));?></th>
                  <th>Time</th>
                  <th>Address</th>
                 <!--  <th>payment Type</th> -->
                  <th>Additional Information</th>
                  <th>Image</th>
                  <th>View</th>
                  <th width="140px">Assign Provider</th>
              </tr>
                <?php $__currentLoopData = $booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php $i++; ?>
                  <tr>
                      <td><?php echo e($i); ?></td>
                      <td><?php echo e(booking_service($data->service_id)); ?></td>
                      <td><?php echo e(user_name($data->user_id)); ?></td>
                      <td><?php echo e($data->date); ?></td>
                      <td><?php echo e($data->time); ?></td>
                      <td><?php echo e(substr(strip_tags($data->address),0,80)); ?> </td>
                     <!--  <td><?php echo e($data->payment_type); ?></td> -->
                      <td><?php echo e($data->additional_information); ?></td>
                      <td>
                        <?php if(empty($data->image) || is_null($data->image)): ?>
                         <img src="<?php echo e(asset('public/image/no1.jpg')); ?>" height="60" width="80px">
                        <?php else: ?>
                        <a href="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>">
                          <img src="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>" height="60" width="80px">
                        </a> 
                        <?php endif; ?>
                      </td>
                      <td>
                      <a href="<?php echo e(route('booking/view',base64_encode($data->id))); ?>" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a>
                    </td>
                    <td>
                        <?php if(!empty($data->assign_provider)): ?> <a class="text-info"><?php echo e(provider_name($data->assign_provider)); ?></a>
                        <?php else: ?> 
                        <button type="button" class="btn btn-info btn-sm open_modal" data-id="<?php echo e($data->id); ?>"> Assign Provider</button>
                        <?php endif; ?>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php if(count($booking) ==0): ?>
                  <tr>
                  <td colspan="11">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                <?php endif; ?> 
                  
              </table><?php echo e($booking->appends(request()->except('page'))->links()); ?>

        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
        <form action="<?php echo e(route('booking/select-provider')); ?>" method="POST" id="select_provider">
          <?php echo csrf_field(); ?> 
          <div class="form-group">
            <label>Select Provider:</label>
            <select class="form-control" name="assign_provider" >
            <option value="" disabled selected>Select your option</option>
            <?php $provider = provider_(); ?>
            <?php $__currentLoopData = $provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider_list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($provider_list->id); ?>"><?php echo e($provider_list->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select> 
          </div>
          <input type="hidden" id="hdn" name="hdn">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" >Submit</button>
            <!-- onclick='return confirm("Are you sure with this action")' -->
          </div>
      </form>
     </div>
    </div> 
  </div> 
</div>
<script type="text/javascript">
$('.open_modal').click(function(){ 
  //it prevent outerside click to close
  $("#myModal").modal({
    backdrop: 'static',
    keyboard: false
  });
   //var id = $(this).attr('data-id');
   //$('.open_modal')$(this).data('id');
  //($(this).data('id'));
  // console.log(id);
  $("#hdn").val($(this).data('id'));
  $('#myModal').modal('show');
})
</script>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/booking/index.blade.php ENDPATH**/ ?>