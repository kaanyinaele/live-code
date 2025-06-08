<?php $__env->startSection('content'); ?>
<section class="content-header">
 <?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
  <h1>
    Awaiting Provider Lists
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="<?php echo e(route('dashboard')); ?>">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Provider </li>
  </ol>
</section>
<section class="content">
  <div class="row ">
    <div class="box bo-co float">
      <div class="box-body">
        <div class="col-xs-12 from-lex">
          <form action="<?php echo e(route('awaiting-provider/search')); ?>" method="POST" class="from-bpox-in">
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
    <div class="box bo-co ">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>S.No</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('name', 'Name'));?></th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>City</th>
                <th><?php echo \Kyslik\ColumnSortable\SortableLink::render(array ('created_at', 'Registration Date'));?></th>
                <th>Skill Category</th>
                <th>Action</th>
              </tr>
              <?php $__currentLoopData = $provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $k++; ?>
                <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->phone_no); ?></td>
                  <td><?php echo e($data->city); ?></td>
                  <td><?php echo e($data->created_at->format('d-m-Y')); ?></td>
                   <td>
                    <?php
                    $cat = explode(',', $data->skill_category);
                    $num = count($cat);
                    ?>
                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php echo e(show_cat_name($info)); ?> 
                     <?php if(($num - 1) > $key): ?>
                     ,
                     <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                  <td width="170">
                    <a href="<?php echo e(route('awaiting-provider/view',base64_encode($data->id))); ?>" class="btn btn-warning btn-sm">
                      <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="<?php echo e(route('awaiting-provider/accept',base64_encode($data->id))); ?>" class="btn btn-primary btn-sm">Accept
                    </a>
                    <a href="<?php echo e(route('awaiting-provider/reject',base64_encode($data->id))); ?>" class="btn btn-danger btn-sm">Reject
                    </a>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php if(count($provider) ==0): ?>
                <tr>
                  <td colspan="10">
                    <h4 style="text-align:center">No Data Found</h4>
                  </td>
                </tr>
              <?php endif; ?> 
            </thead>
          </table>
          <?php echo e($provider->appends(request()->except('page'))->links()); ?>

        </div>
       <!-- /.box-body -->
      </div>
     <!-- /.col -->
    </div>
  <!-- /.row -->
  </div>
</section>
<?php $__env->stopSection(); ?> 

<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/awaiting_provider/index.blade.php ENDPATH**/ ?>