<?php $__env->startSection('content'); ?>
<section class="content-header">
 <?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
  <h1>
    Provider Lists
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
        <div class="col-xs-12 from-lex" >
          <form action="<?php echo e(route('provider/search')); ?>" method="POST" class="from-bpox-in">
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
          <a href="<?php echo e(route('provider/add')); ?>" style="float: right;margin-top: -23px">
            <h3 class="box-title btn btn-primary">Add Provider</h3>
          </a>
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
               <!--  <th>Skill Category</th> -->
                
                <th>Profile</th>
                <th>Status</th>
                <th width="130px">Action</th>
              </tr>
              <?php $__currentLoopData = $provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <?php $k++; ?>
                <tr>
                  <td><?php echo e(++$i); ?></td>
                  <td><?php echo e($data->name); ?></td>
                  <td><?php echo e($data->email); ?></td>
                  <td><?php echo e($data->phone_no); ?></td>
                 <!--  <td><?php echo e($data->address); ?></td> -->
                  <td><?php echo e($data->city); ?></td>
                  <td><?php echo e($data->created_at->format('d-m-Y')); ?></td>
                  <!--  <td>
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
                    </td> -->
                
                    <td>
                    <?php if(!empty($data->image)): ?>
                      <a href="<?php echo e(asset('public/image/provider_profile/'.$data->image)); ?>">
                      <img src="<?php echo e(asset('public/image/provider_profile/'.$data->image)); ?>" class="img-circle" height="50px" width="50px"></a>
                    <?php else: ?>
                      <img src="<?php echo e(asset('public/dummy.jpg')); ?>" height="50px" width="50px" class="img-circle">
                    <?php endif; ?>
                  </td>
                  <td>
                    <?php if($data->status == '0'): ?>
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this provider?')" href="<?php echo e(route('provider/status',[$data->id,$data->status])); ?>" title="Deactive User">
                        <i class="fa fa-lock"></i> Active
                      </a>
                    <?php endif; ?>  
                    <?php if($data->status == '1'): ?>
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this provider?');" href="<?php echo e(route('provider/status',[$data->id,$data->status])); ?>" title="Active User">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                    <?php endif; ?>
                  </td>
                  <td style="width:70px;">
                    <center>
                      <form method="POST" action="<?php echo e(route('provider/delete',[$data->id,$page])); ?>" class="form-inline">
                        <a href="<?php echo e(route('provider/view',base64_encode($data->id))); ?>" class="btn btn-warning btn-sm">
                          <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="<?php echo e(route('provider/edit',[base64_encode($data->id),$page])); ?>" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this provider ?')">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </center>
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
<!-- 
<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$(document).ready(function(){
$(#button).click(function(){
    alert('YOY can not ');
 $("#to").val() > $("#from").val()
  alert('YOY can not ');
});
});

</script>
<?php $__env->stopSection(); ?> -->
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/admin/provider/index.blade.php ENDPATH**/ ?>