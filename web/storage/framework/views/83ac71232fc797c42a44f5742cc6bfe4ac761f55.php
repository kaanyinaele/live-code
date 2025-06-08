<?php $__env->startSection('content'); ?>
<section class="content-header">
  <h1>
  User list
  <?php
    if(isset($_GET['page']))
    $page = $_GET['page']; 
    else
    $page=1;
   ?>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="<?php echo e(route('report-usersearch')); ?>" method="POST" class="from-bpox-in" >
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
          <table id="user" class="table table-bordered table-striped datatable display nowrap">
            <thead>
              <tr>
                <th>S.No.</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'Full Name'));?> </th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Zip Code</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Registration Date'));?></th>
                <th>Total Booking</th>
              </tr>
               </thead>
              
               <tbody>
                   <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $k++; ?>
                <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->phone_no); ?></td>
                 <!--  <td><?php echo e($data->address); ?></td> -->
                  <td><?php echo e($data->zip_code); ?></td>
                  <td><?php echo e($data->created_at->format('d-m-Y')); ?></td>
                  <td>
                    <?php echo e(total_booking($data->id)); ?>

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
    $('#user').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/report/user_report.blade.php ENDPATH**/ ?>