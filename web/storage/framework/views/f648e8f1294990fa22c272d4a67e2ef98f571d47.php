<?php $__env->startSection('content'); ?> 
 <section class="sec-padding">
      <div class="container">
        <div class="services-in-box m-auto">
          <div class="categories-services services-manage-box">
            <div class="Cleaning-in-text">
             <figure>
              <img src="<?php echo e(asset('public/image/service/'.$service->image)); ?>"/> 
              <div class="rat-h-sec">
                    <i class="fas fa-star"></i>
                    <?php
                     $avg=0;
                     $rating=DB::table('rating')->where('service_id', $service->id)->pluck('rating');

                    $rating_count=DB::table('rating')->where('service_id', $service->id)->count(); 
                    $countt=count($rating);
                    ?>
                  
                    <?php
                     foreach($rating as $data_r)
                     {
                      $avg=$data_r+$avg;
                      }
                    ?>

                    <?php
                     if($rating_count)
                     $cal_rating=$avg/$countt;
                     else
                     $cal_rating=0;
                    ?>
                     
                    <?php echo e($cal_rating); ?>

                  </div>
             </figure>
                <div class="service-in-page d-flex justify-content-between">
                  <h5><?php echo e($service->category_name); ?></h5>
                  <?php if(!is_null($service->price)): ?>
                  <a href="#">
                    <div class="yellow-in">
                      <p>Price</p>
                      <h6> <?php echo e(currency().$service->price); ?></h6>
                    </div>
                  </a>
                  <?php endif; ?>
                </div>
              </div>
           <figcaption>
             <h6>Description</h6>
             <?php echo $service->service_overview; ?>


              <?php if(Auth::check() && Auth::user()->role == '1'): ?>
              <div class="d-flex">
                <?php if(!is_null($service->price)): ?>
                  <button class="btn btn-yellow" type="submit" data-toggle="modal" data-target="#exampleModalCenter">
                     Book Services
                  </button>
                  <?php else: ?>
                  <button type="submit" id="test_btn" class="btn btn-yellow">
                   Request Service
                  </button>
                <?php endif; ?>
              </div>
              <?php else: ?>
              <div class="d-flex">
                <?php if(!is_null($service->price)): ?>
                  <a class="btn btn-yellow open_modal"  href="<?php echo e(route('service-booking',base64_encode($service->id))); ?>">
                     Book Services
                  </a>
                  <?php else: ?>
                  <a class="btn btn-yellow open_modal" href="<?php echo e(route('service-booking',base64_encode($service->id))); ?>">
                     Request Service
                  </a>
                <?php endif; ?>
              </div>
              <?php endif; ?>

            <div class="service-modal-box">
              <div class="modal fade"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-focus="false" id="myModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">
                        <?php if(is_null($service->price)): ?>Request Service Form 
                        <?php else: ?> Bokking Service Form 
                        <?php endif; ?>
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <?php if(!is_null($service->price)): ?>
                    <form method="POST" action="<?php echo e(route('service-booking',base64_encode($service->id))); ?>" id="service-request" enctype="multipart/form-data">
                    <?php else: ?>
                    <form method="POST" action="<?php echo e(route('servicerequest',base64_encode($service->id))); ?>" id="service-request" enctype="multipart/form-data">
                    <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <!-- hidden field -->
                        <input type="hidden" name="hidden" value="<?php echo e($subcategory); ?>"> 
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="base-location">
                                <label> Preferred Date</label>
                                <input type="text" name="date" id="date" class="form-control <?php $__errorArgs = ['date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                 <?php $__errorArgs = ['date'];
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
                                <!-- <button>
                                  <i class="far fa-calendar-alt"></i>
                                </button> --> 
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group" style="position: relative;">
                               <div class="base-location">
                                 <label> Preferred Time</label>
                                <input type="text" name="time"  id="time" class="form-control <?php $__errorArgs = ['time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                                <?php $__errorArgs = ['time'];
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
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                             <label> Address</label>
                             <input type="text" id="address" name="address" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($data->address); ?>" placeholder="Enter address">
                             <?php $__errorArgs = ['address'];
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
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label> Aditional information</label>
                               <textarea class="form-control <?php $__errorArgs = ['additional_information'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="additional_information" placeholder="Please provide service detail along with quantity."></textarea>
                               <?php $__errorArgs = ['additional_information'];
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
                          </div>
                           <div class="col-md-12">
                           <div class="form-group">
                             <label> Mobile Number</label>
                            <input type="text" name="mobile_no" <?php if(Auth::check() && Auth::user()->role == 1): ?> value="<?php echo e($data->phone_no); ?>" <?php endif; ?> class="form-control <?php $__errorArgs = ['mobile_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Mobile Number*">
                            <?php $__errorArgs = ['mobile_no'];
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
                          </div>
                           <div class="col-md-12">
                           <div class="form-group">
                            <label> Whatsapp Number</label>
                            <input type="text" name="whatsapp_no" value="<?php echo e(old('whatsapp_no')); ?>" class="form-control <?php $__errorArgs = ['whatsapp_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Whatsapp Number*">
                            <?php $__errorArgs = ['whatsapp_no'];
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
                          </div>
                          <div class="col-md-12">
                            <div class="form-group ">
                                 <label> Image</label>
                                <div class="custom-file">
                                  <input type="file" id="inputGroupFile01" name="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                  <!-- <label class="custom-file-label" for="inputGroupFile01">Attach Image</label> -->
                                  <?php $__errorArgs = ['image'];
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
                            </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label>Select Service Sub-Category: </label>
                                 <select id="subcategory_1" name="subcategory[]" multiple="multiple" class="selectpicker selectpickerForm form-control" required>
                                 <?php $__currentLoopData = sub_category($service->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <?php 
                                      $data = explode(",",$subcategory);
                                     if(in_array($subcategor->id, $data )){
                                       $val = "selected";
                                     }else{
                                     $val = "";
                                   }
                                 ?>
                                 <option value="<?php echo e($subcategor->id); ?>" <?php echo e($val); ?>> <?php echo e($subcategor->sub_category); ?> </option>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 </select>
                              </div>
                          </div>
                        </div>
                        <!--  <?php if(!is_null($service->price)): ?>
                        <div class="have-account">
                           <span>Select the payment method</span>
                           <div class="d-flex">
                             <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="defaultUnchecked"  value="online" name="payment_type" checked>
                              <label class="custom-control-label" for="defaultUnchecked">Online</label>
                            </div>
                          </div>
                      </div>
                        <?php endif; ?> -->
                        <div class="Creat-button-modal">
                        <button type="submit" class="nav-link btn  btn-green" href="#">Submit
                        </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </figcaption>
        </div>
        </div>
      </div>
  </section>
<style type="text/css">
  .SumoSelect.sumo_subcategory { width: 100%; display: block; }
  /*this css display google autosuggestion addrees in bootstrap model*/
  .pac-container{ z-index: 9999; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
$('#test_btn').click(function(){  
  //it prevent outerside click to close
  $("#myModal").modal({
    backdrop: 'static',
    keyboard: false
  });
  $('#myModal').modal('show');
  
});
</script>

<script> 
 //multiple selectbox
  setTimeout(function(){ 
    $('.selectpickerForm').SumoSelect({ okCancelInMulti: true });
      $('.selectpickerForm').css("height",0); 
  },100)
 
//date range
$('input[name="date"]').daterangepicker({
  // $('#date').datepicker({ defaultDate: date });
minDate:moment()
});
//time range picker
$('#time').daterangepicker({
        timePicker: true,
        timePicker24Hour: true,
        timePickerIncrement: 1,
        timePickerSeconds: true,
        locale: {
            format: 'HH:mm:ss'
        }
    }).on('show.daterangepicker', function (ev, picker) {
       picker.container.find(".calendar-table").hide();
    });
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/job_management/service_detail.blade.php ENDPATH**/ ?>