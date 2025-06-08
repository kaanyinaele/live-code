<?php $__env->startSection('content'); ?> 
<?php echo $__env->make('frontend.tabs', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Booking Management</h4>
          </div>
          <div class="classic-tabs">
            <ul class="nav tabs-cyan" id="myClassicTab" role="tablist">
              <li class="nav-item">
                 <a class="nav-link waves-light active show" id="contact-tab-classic" data-toggle="tab" href="#contact-classic" role="tab" aria-controls="contact-classic" aria-selected="false">Requests(<?php echo e($total_all_request); ?>)</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link waves-light" id="profile-tab-classic" data-toggle="tab" href="#profile-classic" role="tab" aria-controls="profile-classic" aria-selected="false">Upcoming Booking(<?php echo e($total_Upcoming_booking); ?>)</a> 
              </li>
              <li class="nav-item">
                <a class="nav-link waves-light" id="follow-tab-classic" data-toggle="tab" href="#follow-classic" role="tab" aria-controls="follow-classic" aria-selected="false">Completed Booking (<?php echo $total_booked; ?>)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-light" id="awesome-tab-classic" data-toggle="tab" href="#awesome-classic" role="tab"
                  aria-controls="awesome-classic" aria-selected="false">Cancelled Bookings(<?php echo e($total_cancel); ?>)</a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-light" id="awesome-tab-classicc" data-toggle="tab" href="#awesome-classicc" role="tab" aria-controls="awesome-classicc" aria-selected="false">Current Bookings(<?php echo e($total_current_booking); ?>)</a>
              </li>
            </ul>
            <div class="tab-content rounded-bottom" id="myClassicTabContent">
              <div class="tab-pane fade active show" id="contact-classic" role="tabpanel" aria-labelledby="contact-tab-classic"></div>
              <div class="tab-pane fade" id="profile-classic" role="tabpanel" aria-labelledby="profile-tab-classic"></div>
              <div class="tab-pane fade" id="follow-classic" role="tabpanel" aria-labelledby="follow-tab-classic"></div>
              <div class="tab-pane fade" id="awesome-classic" role="tabpanel" aria-labelledby="awesome-tab-classic"></div>
              <div class="tab-pane fade" id="awesome-classicc" role="tabpanel" aria-labelledby="awesome-tab-classicc"></div>
            </div>
          </div>
          <!-- Classic tabs -->
        </div>
      </div>
    </section>
    <div id="myModals" class="modal fade" role="dialog">
       <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="padding: 6px">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
             <div class="row" id="add_hear" >
              <div class="col-md-12  service_row"  data-id='0'  style="padding: 25px !important">
              <table id="example1" class="table table-bordered table-striped datatable">
                <!--  table data coming from azex at emple1 id -->
              </table>
              <input type="hidden" id="hdn" name="hdn"> 
                <div class="row" style="padding-bottom: 20px !important">
                  <div class="col-md-12">
                    <div class="col-md-12">
                     <div id="rslt">
                      </div>
                      <label>Total:</label> <span id="selected_price"></span><br>
                     <a id="route_cancel" class="btn btn-green btn-sm">Cancel
                     </a>
                     <a id="route" class="btn btn-green btn-sm" >Book</a>
                    </div>
                      </div>
                    </div>
                    <!-- onclick='return confirm("Are you sure with this action")' -->
                  </div> 
                </div> 
              </div>  
            </div>
          </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>   
<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('click', '.book_seven', function(){ 
        $('#selected_price').html($(this).data('price'));
         // alert($(this).data('info'));
         //check information id empty or not
         var info=$(this).attr('data-info'); 
         if(info !== ""){
            $('#selected_info').html('Information:-' + $(this).data('info'));
         }else{
           $('#selected_info').html("");
         }
         var javavar=$(this).attr('data-priceinfo');
         $.ajax({
                url: 'price-data/{id}',
                type: 'GET',
                data: { id:javavar },
                success: function(response)
                {   
                  $('#example1').html('<tr>\
                  <th style="width:180px">Service</th>\
                  <th>Cost/Unit</th>\
                  <th>Quantity</th>\
                  <th>Price</th>\
                  </tr>'+ response);
                }
            });
         $('#selected_href').html($(this).data('href'));
          //url
             var href_data=$(this).attr('data-href'); 
             // $("#route").attr("href",href_data);
          
              $("#route").click(function(){
                $('#myModals').modal('hide');
                payWithPaystack();

              });



              var href_data2=$(this).attr('data-href_cancel'); 
             $("#route_cancel").attr("href",href_data2);

             $('#myModals').modal('show')
         })
})

$(function() {
     // 1.
    function getPaginationSelectedPage(url) {
        var chunks = url.split('?');
        var baseUrl = chunks[0];
        var querystr = chunks[1].split('&');
        var pg = 1;
        for (i in querystr) {
            var qs = querystr[i].split('=');
            if (qs[0] == 'page') {
                pg = qs[1];
                break;
            }
        }
        return pg;
    }
    // 2.
    $('#profile-classic').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));
        $.ajax({
            url: "<?php echo url('/').'/appointments/ajax/4'; ?>",
            data: { page: pg },
            success: function(data) {
                $('#profile-classic').html(data);
            }
        });
    });

    $('#follow-classic').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));

        $.ajax({
            url: "<?php echo url('/').'/appointments/ajax/5'; ?>",
            data: { page: pg },
            success: function(data) {
                $('#follow-classic').html(data);
            }
        });
    });

    $('#contact-classic').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));

        $.ajax({
            url: "<?php echo url('/').'/appointments/ajax/7'; ?>",
            data: { page: pg },
            success: function(data) {
                $('#contact-classic').html(data);
            }
        });
    });

    $('#awesome-classic').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));

        $.ajax({
            url: "<?php echo url('/').'/appointments/ajax/3'; ?>",
            data: { page: pg },
            success: function(data) {
                $('#awesome-classic').html(data);
            }
        });
    });
     $('#awesome-classicc').on('click', '.pagination a', function(e) {
        e.preventDefault();
        var pg = getPaginationSelectedPage($(this).attr('href'));

        $.ajax({
            url: "<?php echo url('/').'/appointments/ajax/6'; ?>",
            data: { page: pg },
            success: function(data) {
                $('#awesome-classicc').html(data);
            }
        });
    });

    // 3.
     $('#contact-classic').load('<?php echo url('/') ?>'+'/appointments/ajax/7?page=1');
    $('#follow-classic').load('<?php echo url('/') ?>'+'/appointments/ajax/5?page=1');
    $('#profile-classic').load('<?php echo url('/') ?>'+'/appointments/ajax/4?page=1');
    $('#awesome-classic').load('<?php echo url('/') ?>'+'/appointments/ajax/3?page=1');
    $('#awesome-classicc').load('<?php echo url('/') ?>'+'/appointments/ajax/6?page=1');
  
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ogaworkmen/public_html/resources/views/frontend/my_appointments/my_appointments.blade.php ENDPATH**/ ?>