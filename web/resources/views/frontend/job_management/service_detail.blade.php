@extends('frontend.layout')
@section('content') 
 <section class="sec-padding">
      <div class="container">
        <div class="services-in-box m-auto">
          <div class="categories-services services-manage-box">
            <div class="Cleaning-in-text">
             <figure>
              <img src="{{asset('public/image/service/'.$service->image)}}"/> 
              <div class="rat-h-sec">
                    <i class="fas fa-star"></i>
                    @php
                     $avg=0;
                     $rating=DB::table('rating')->where('service_id', $service->id)->pluck('rating');

                    $rating_count=DB::table('rating')->where('service_id', $service->id)->count(); 
                    $countt=count($rating);
                    @endphp
                  
                    <?php
                     foreach($rating as $data_r)
                     {
                      $avg=$data_r+$avg;
                      }
                    ?>

                    @php
                     if($rating_count)
                     $cal_rating=$avg/$countt;
                     else
                     $cal_rating=0;
                    @endphp
                     
                    {{$cal_rating}}
                  </div>
             </figure>
                <div class="service-in-page d-flex justify-content-between">
                  <h5>{{ $service->category_name }}</h5>
                  @if(!is_null($service->price))
                  <a href="#">
                    <div class="yellow-in">
                      <p>Price</p>
                      <h6> {{currency().$service->price }}</h6>
                    </div>
                  </a>
                  @endif
                </div>
              </div>
           <figcaption>
             <h6>Description</h6>
             {!! $service->service_overview !!}

              @if(Auth::check() && Auth::user()->role == '1')
              <div class="d-flex">
                @if(!is_null($service->price))
                  <button class="btn btn-yellow" type="submit" data-toggle="modal" data-target="#exampleModalCenter">
                     Book Services
                  </button>
                  @else
                  <button type="submit" id="test_btn" class="btn btn-yellow">
                   Request Service
                  </button>
                @endif
              </div>
              @else
              <div class="d-flex">
                @if(!is_null($service->price))
                  <a class="btn btn-yellow open_modal"  href="{{route('service-booking',base64_encode($service->id))}}">
                     Book Services
                  </a>
                  @else
                  <a class="btn btn-yellow open_modal" href="{{route('service-booking',base64_encode($service->id))}}">
                     Request Service
                  </a>
                @endif
              </div>
              @endif

            <div class="service-modal-box">
              <div class="modal fade"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-focus="false" id="myModal">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">
                        @if(is_null($service->price))Request Service Form 
                        @else Bokking Service Form 
                        @endif
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    @if(!is_null($service->price))
                    <form method="POST" action="{{route('service-booking',base64_encode($service->id))}}" id="service-request" enctype="multipart/form-data">
                    @else
                    <form method="POST" action="{{route('servicerequest',base64_encode($service->id))}}" id="service-request" enctype="multipart/form-data">
                    @endif
                        @csrf
                        <!-- hidden field -->
                        <input type="hidden" name="hidden" value="{{$subcategory}}"> 
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="base-location">
                                <label> Preferred Date</label>
                                <input type="text" name="date" id="date" class="form-control @error('date') is-invalid @enderror">
                                 @error('date')
                                  <span class="invalid-feedback" role="alert" style="color: red">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                 @enderror
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
                                <input type="text" name="time"  id="time" class="form-control @error('time') is-invalid @enderror" >
                                @error('time')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                             <label> Address</label>
                             <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{$data->address}}" placeholder="Enter address">
                             @error('address')
                             <span class="invalid-feedback" role="alert" style="color: red">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label> Aditional information</label>
                               <textarea class="form-control @error('additional_information') is-invalid @enderror" name="additional_information" placeholder="Please provide service detail along with quantity."></textarea>
                               @error('additional_information')
                                <span class="invalid-feedback" role="alert" style="color: red">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                          </div>
                           <div class="col-md-12">
                           <div class="form-group">
                             <label> Mobile Number</label>
                            <input type="text" name="mobile_no" @if(Auth::check() && Auth::user()->role == 1) value="{{$data->phone_no}}" @endif class="form-control @error('mobile_no') is-invalid @enderror" placeholder="Mobile Number*">
                            @error('mobile_no')
                            <span class="invalid-feedback" role="alert" style="color: red">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          </div>
                           <div class="col-md-12">
                           <div class="form-group">
                            <label> Whatsapp Number</label>
                            <input type="text" name="whatsapp_no" value="{{ old('whatsapp_no')}}" class="form-control @error('whatsapp_no') is-invalid @enderror" placeholder="Whatsapp Number*">
                            @error('whatsapp_no')
                            <span class="invalid-feedback" role="alert" style="color: red">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                          </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group ">
                                 <label> Image</label>
                                <div class="custom-file">
                                  <input type="file" id="inputGroupFile01" name="image" class="form-control @error('image') is-invalid @enderror">
                                  <!-- <label class="custom-file-label" for="inputGroupFile01">Attach Image</label> -->
                                  @error('image')
                                  <span class="invalid-feedback" role="alert" style="color: red">
                                  <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                              <div class="form-group">
                                <label>Select Service Sub-Category: </label>
                                 <select id="subcategory_1" name="subcategory[]" multiple="multiple" class="selectpicker selectpickerForm form-control" required>
                                 @foreach(sub_category($service->id) as $subcategor)
                                 @php 
                                      $data = explode(",",$subcategory);
                                     if(in_array($subcategor->id, $data )){
                                       $val = "selected";
                                     }else{
                                     $val = "";
                                   }
                                 @endphp
                                 <option value="{{$subcategor->id}}" {{ $val }}> {{ $subcategor->sub_category }} </option>
                                 @endforeach
                                 </select>
                              </div>
                          </div>
                        </div>
                        <!--  @if(!is_null($service->price))
                        <div class="have-account">
                           <span>Select the payment method</span>
                           <div class="d-flex">
                             <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" id="defaultUnchecked"  value="online" name="payment_type" checked>
                              <label class="custom-control-label" for="defaultUnchecked">Online</label>
                            </div>
                          </div>
                      </div>
                        @endif -->
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
@endsection

@section('scripts')
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

@endsection

