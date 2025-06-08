@extends('admin.master')
@section('content')
<section class="content-header">
 <h1>
  Service Request List
  <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active"> Service Request</li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('service-request') }}" method="POST" class="from-bpox-in" >
            @csrf
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Enter Date" class="form-control" name="search" value="{{!empty($val)? $val : '' }}"  /> 
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
                  <th>@sortablelink('date','Date')</th>
                  <th>Time</th>
                  <th>Address</th>
                  <th>Additional Information</th>
                  <th>Image</th>
                  <th>View</th>
                  <th width="140px"> Price</th>
              </tr>
                @foreach($booking as $data)
                  <?php $i++; ?>
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ booking_service($data->service_id) }}</td>
                      <td>{{ user_name($data->user_id) }}</td>
                      <td>{{$data->date }}</td>
                      <td>{{$data->time}}</td>
                      <td>{{substr(strip_tags($data->address),0,80)}} </td>
                      <!--  <td>{{$data->payment_type}}</td> -->
                      <td>{{$data->additional_information }}</td>
                      <td>
                        @if(empty($data->image) || is_null($data->image))
                         <img src="{{asset('public/image/no1.jpg')}}" height="60" width="80px">
                        @else
                        <a href="{{asset('public/image/book_service/'.$data->image)}}">
                          <img src="{{asset('public/image/book_service/'.$data->image)}}" height="60" width="80px">
                        </a> 
                        @endif
                      </td>
                      <td>
                      <a href="{{route('service-request/view',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a>
                    </td>
                    <td>
                      @if(!empty($data->price)) <a class="text-info">{{$data->price}}</a>
                        @else 
                      <button type="button" class="btn btn-info btn-sm open_modal" data-id="{{ $data->id }}"> send price</button>@endif
                    </td>
                  </tr>
                  @endforeach
                  @if(count($booking) ==0)
                  <tr>
                  <td colspan="11">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                @endif 
              </table>
                 <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="{{route('service-request/send-price')}}" method="POST" class="modal-body" id="send_price" >  
                             @csrf 
                            <!--  <div class=""> -->
                               <input type="hidden" id="hdn" name="hdn">
                             <div class="row" id="add_hear" >
                              <div class="col-md-12 service_row" data-id='0'>
                                <div class="col-md-4">
                                <label>Service Name:</label>
                                <input type="text" class="form-control" id="service" name="service[]">
                                </div>
                              <div class="col-md-2">
                                 <label>Cost/Unit:</label>
                                <input type="text" class="form-control cost" id="cost" name="cost[]">
                            </div>
                             <div class="col-md-2">
                                <label>Quantity:</label>
                                <input type="text" class="form-control quantity" id="quantity" name="quantity[]">
                              </div>
                              <div class="col-md-2">
                                <label>Price:</label>
                                <input type="text" class="form-control price" id="price" readonly="" name="calculate_price[]">
                              </div>
                               <div class="col-md-2">
                                <label>Action</label>
                                  <a href="javascript:;" id="add_more" class="btn btn-primary  pull-right add_more">Add More</a>
                              </div>
                            </div>
                            <!-- ...............clone -->
                            <div class="col-md-12 service_row hidden" id='make_clone' style="margin-top:7px">
                                <div class="col-md-4">
                                <input type="text" class="form-control" id="service" name="service[]">
                                </div>
                              <div class="col-md-2">
                                <input type="text" class="form-control cost" id="cost" name="cost[]">
                            </div>
                             <div class="col-md-2">
                                <input type="text" class="form-control quantity" id="quantity" name="quantity[]">
                              </div>
                              <div class="col-md-2">
                                <input type="text" class="form-control price" id="price" readonly="" name="calculate_price[]">
                              </div>
                               <div class="col-md-2">
                                  <a href="javascript:;"  class="btn btn-primary  pull-right remove" type="button" >remove</a>
                              </div>
                            </div>
                            </div>
                          <div class="row" style="margin-top: 25px;padding-bottom: 2px !important">
                              <div class="col-md-12">
                                 <div class="col-md-2">
                               <label>Vat(%)</label> 
                             </div>
                             <div class="col-md-10">
                                <input type="text" class="form-control vat" readonly="" id="vat" name="vat" value="{{ GlobalTitle()->vat }}">
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 25px;padding-bottom: 2px !important">
                              <div class="col-md-12">
                                 <div class="col-md-2">
                               <label>Discount(%)</label> 
                             </div>
                             <div class="col-md-10">
                                <input type="text" class="form-control discount" min="0" value="{{0}}" id="discount" name="discount">
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin-top: 25px;padding-bottom: 20px !important">
                              <div class="col-md-12">
                                 <div class="col-md-2">
                               <label>Total</label> 
                             </div>
                             <div class="col-md-10">
                                <input type="text" class="form-control total" readonly="" id="total" name="total">
                              </div>
                            </div>
                          </div>
                       <!--  <input type="hidden" id="hdn" name="hdn"> -->
                          <div class="row" style="padding-bottom: 20px !important">
                            <div class="col-md-12">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary form-control" >Submit</button>
                              </div>
                                </div>
                              </div>
                          <!--   form -->
                            </form>
                              <!-- onclick='return confirm("Are you sure with this action")' -->
                          </div> 
                        </div> 
                      </div>
              {{ $booking->appends(request()->except('page'))->links() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
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
//dynamically add more row 
// var i = 0; var j=1;
//  $("#add_more").click(function(){  i++; j++;
//     $("#add_hear").append('<div class="col-md-12 service_row" data-id="'+i+'" style="margin-top:10px">\
//                           <div class="col-md-4">\
//                           <input type="text" class="form-control service" id="service" minlength=3 maxlength=100 required  name="service[]">\
//                           </div>\
//                         <div class="col-md-2">\
//                           <input type="text" class="form-control cost"  id="cost" name="cost[]">\
//                       </div>\
//                        <div class="col-md-2">\
//                           <input type="text" class="form-control quantity"  id="quantity" name="quantity[]">\
//                         </div>\
//                           <div class="col-md-2">\
//                           <input type="text" class="form-control price" id="price" readonly="" name="calculate_price[]">\
//                         </div>\
//                          <div class="col-md-2">\
//                           <button class="btn btn-primary pull-right remove" >remove</button>\
//                         </div>\
//                       </div>'); 

//   });
 //remove code
  // $(document).on("click",".remove",function(){

  //   $(this).parent().parent().remove();
  //   sum_calculate(); 
  //   // var id = $(this).attr('data-id'); 
  //   // // if(id== $(this).parent().parent()){
  //   //   alert(id);
  // });
//add code
// $('.quantity').on('keyup',function(){
//   var quantity =  $('.quantity').val(); 
//   var cost =  $('.cost').val();
//    var price = cost * quantity;
//     $("#price").val(price);                 
//  });

  var total=0;
  $(document).on("keyup",".service_row .quantity",function(){
      var parent=$(this).parent().parent();
      var cost=parent.find('.cost').val();
      cost = ( isNaN(cost))? 0 : cost;
      var price=parent.find('.price');
      if(cost){
          price.val(cost*$(this).val());   
          sum_calculate(); 
      }
  });

  $(document).on("keyup",".service_row .cost",function(){
      var parent=$(this).parent().parent();
      var quantity=parent.find('.quantity').val();
      //for conver nane into 0
      quantity = ( isNaN(quantity))? 0 : quantity;
      var price=parent.find('.price');
      if(cost){
          price.val(quantity*$(this).val());    
           sum_calculate(); 
          // var total=0;
          // $('.service_row .price').each(function(){
          //     total+=parseInt($(this).val());
          // });     
          // $("#total").val(total); 
      }
  });
  $(document).on("keyup",".discount",function(){
     sum_calculate();
  });

 function sum_calculate()
 {
   var total=0;
   var discount=$("#discount"). val(); 
   var vat=  $("#vat"). val(); 
    $('.service_row .price').each(function(){
        total+=($(this).val())? parseFloat($(this).val()) : 0; //console.log(typeof $(this).val());
        // var cal_vat=vat/100*total;      
        //    total=total+cal_vat;
        //    console.log(total);
    });
      
    var total=total+vat/100*total; 
    if(discount){
      var total=total-discount/100*total;
       } 
       total=Math.round(total);
    $("#total").val(total); 
 }

</script>
@endsection 

