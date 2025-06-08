<?php $__env->startSection('content'); ?>   
<?php echo $__env->make('frontend.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Add new card</h4>
          </div>
          <form id="paymentcard" action="<?php echo e(route('add-card')); ?>" method="POST">
          <?php echo csrf_field(); ?>
            <div class="from-in-box m-auto">
            <div class="form-group">
              <input type="text" name="cardholder_name" class="form-control" placeholder="Card-holder Name">
            </div>
            <div class="form-group">
              <input type="text" name="card_number" class="form-control" placeholder="Card Number">
            </div>
              <div class="Expiry-title">
                <label>Expiry Date</label>
              </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control" type="Date" name="expiry_year" placeholder="Year">
                    <option selected="true" disabled="disabled">Year</option>
                   <?php for($i=1; $i<=10; $i++): ?>
                    <option><?php echo e($year); ?> <?php $year++ ?></option>
                    <?php endfor; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control" placeholder="Year" name="expiry_month">
                    <option value='' selected="true" disabled="disabled">--Select Month--</option>
                    <?php
                      $monthArray = range(1, 12);
                      ?>
                    <?php
                      $monthArray = range(1, 12);
                      foreach ($monthArray as $month) {
                        echo '<option value="'.$month.'">'.$formattedMonthArray[$month].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          <!--   <div class="form-group">
              <input type="text" name="cvv"  class="form-control" placeholder="CVV">
            </div> -->
            <div class="Creat-button-up">
             <button type="submit" class="nav-link btn  btn-green" href="#">Add Card</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/payment/addnew_card.blade.php ENDPATH**/ ?>