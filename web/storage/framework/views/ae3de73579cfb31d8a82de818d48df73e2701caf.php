<?php $__env->startSection('content'); ?>
<section class="content-header">
        <h1>Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active"> Appointment</li>
  </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('report-bookingsearch')); ?>" method="POST" class="from-bpox-in" >
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input type="text" placeholder="Search" name="search" value="<?php echo e(!empty($val)? $val : ''); ?>" class="form-control" />
            </div>
             <div class="form-group">
              <input type="date" id="from" placeholder="From" style="height:34px" name="from" value="<?php echo e(!empty($from)? $from : ''); ?>" class="<?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control" />
              <?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert" style="color: red">
                  <strong><?php echo e($message); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
             <div class="form-group">
              <input type="date" placeholder="To" style="height:34px" name="to" id="to" value="<?php echo e(!empty($to)? $to : ''); ?>" class="form-control <?php $__errorArgs = ['to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
            </div>
            <div class="form-group">
            <button type="submit" id="button" class="btn btn-primary">
                  <i class="glyphicon glyphicon-search"></i>
              </button>
              <?php $__errorArgs = ['to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <span class="invalid-feedback" role="alert" style="color: red">
                  <strong><?php echo e($meassage="Invalid date selection"); ?></strong>
              </span>
              <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
           <div class="box-body">
             <table id="booking" class="table table-bordered table-striped datatable display nowrap">
                 <thead>
                <tr>
                   <th>S.No</th>
                  <th>Service</th>
                  <th>Date</th>
                  <!--  <th>Time</th> -->
                  <th>Address</th>
                 <!--  <th>Additional Information</th> -->
                 <!--  <th>Image</th> -->
                  <th>whatsapp Number</th>
                  <th> status</th>
                </tr> </thead>
                <tbody>
                  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e(booking_service($data->service_id)); ?></td>
                  <td><?php echo e($data->date); ?></td>
                  <!-- <td><?php echo e($data->time); ?></td> -->
                  <td><?php echo e(substr(strip_tags($data->address),0,80)); ?> </td>
                  <!-- <td><?php echo e($data->additional_information); ?></td> -->
                  <!-- <td>
                    <?php if(empty($data->image) || is_null($data->image)): ?>
                     <img src="<?php echo e(asset('public/image/no1.jpg')); ?>" height="60" width="80px">
                    <?php else: ?>
                    <a href="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>">
                      <img src="<?php echo e(asset('public/image/book_service/'.$data->image)); ?>" height="60" width="80px">
                    </a> 
                    <?php endif; ?>
                  </td> -->
                  <td><?php echo e($data->whatsapp_no); ?></td>
                   <td>
                    <?php if($data->status ==0 || $data->status ==1 ): ?> 
                    Request booking
                    <?php elseif($data->status == 4): ?>
                    upcoming booking
                    <?php elseif($data->status ==5): ?>
                    Complete Booking
                    <?php elseif($data->status ==3): ?>
                    Cancel Booking
                    <?php else: ?>
                    Current Booking
                    <?php endif; ?>
                   </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
              
            </div>
    
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<style>
.dataTables_filter{
  display: none!important;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#booking').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/report/booking_report.blade.php ENDPATH**/ ?>