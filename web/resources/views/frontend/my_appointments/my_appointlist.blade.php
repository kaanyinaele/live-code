
<?php $info = ''; ?>
<!-- request service -->
@if($type == 7)
  <div class="Manage-classic-box">
    @if(@count($datas) == '0')
        <b>No records found</b>
    @endif
      @forelse($datas as $key=>$data)
       <div class="d-flex">
        <div class="Book-Manage-in">
          <figure>
            @if(empty($data->image) || is_null($data->image))
            <img src="{{asset('public/image/no1.jpg')}}">
            @else
            <img src="{{asset('public/image/book_service/'.$data->image)}}">
            @endif
          </figure>
          <figcaption>
           <!--  <a href=""> -->
            <h4>{{ service_name($data->service_id) }}</h4>
            @if(!empty($data->price))
            <p><span style="color: #65a4b4;padding-right:10px;font-weight: bold"> {{ currency()}}</span>{{$data->price }}
              @endif
            <p> <i class="fas fa-map-marker-alt"></i> {{$data->address}}</p>
         <!--  </a> -->
          </figcaption>
        </div>
        <div class="manage-right-box">
          <p> {{$data->date}} <!-- {{ date('d-M-Y - d-M-Y', strtotime($data->date))}} --> </p> <p>{{$data->time}}</p>
             <div class="text-right">
            @if($data->status==0)
              <a href="{{route('booking/cancel',base64_encode($data->id))}}" onclick="return confirm('Are you sure you want to cancel this service ?')">Cancel</a>
            @else
             <?php if(!empty($data->extra_information)){
                $info = $data->extra_information;
             }else{
                $info = '';
             }?>
             <!-- price is not send by admin...this button will be show -->
             @if(empty($data->price))
             <a href="javascript:;" onclick="alert('Price is not sended by admin.')" style="margin-right: 5px">Book</a>
             <a href="{{route('booking/cancel',base64_encode($data->id))}}" onclick="return confirm('Are you sure you want to cancel this service ?')">Cancel</a>
             @else
             <a data-pid="{{$key}}" href="javascript:void(0);" data-href_cancel="{{route('booking/cancel',base64_encode($data->id))}}" data-href="{{route('request/service-booking',base64_encode($data->id))}}" data-price="{{currency()}} {{$data->price}}" data-info="{{ $info }}" data-priceinfo="{{ $data->id }}" id="book_seven" class="opn_mdl_3 book_seven">Book</a> 
             @endif
            @endif
          </div>
        </div>
       </div>          
      @empty
         <div class="Book-Manage-in"></div>
      @endforelse
      <div class="col-md-12">
        {!! $datas->appends(Request::get('page'))->links(); !!}
      </div>
  </div>
  <!-- cancel service -->
@elseif($type == 3)
  <div class="Manage-classic-box">
    @if(@count($datas) == '0')
        <b>No records found</b>
   @endif
      @forelse($datas as $key=>$data)
       <div class="d-flex">
        <div class="Book-Manage-in">
          <figure>
            @if(empty($data->image) || is_null($data->image))
            <img src="{{asset('public/image/no1.jpg')}}">
            @else
            <img src="{{asset('public/image/book_service/'.$data->image)}}">
            @endif
          </figure>
          <figcaption>
            <h4>{{ service_name($data->service_id) }}</h4>
            <!--<p> <i class="fa fa-user"></i> {{ provider_name($data->assign_provider) }}</p> -->
            <!-- <p> <i class="far fa-credit-card"></i> {{$data->payment_type}}</p> -->
            <p><span style="color: #65a4b4;padding-right:10px;font-weight: bold">{{ currency()}}</span>{{$data->price }}<span></span>
            <p> <i class="fas fa-map-marker-alt"></i>{{$data->address}}</p>
          </figcaption>
        </div>
        <div class="manage-right-box">
           <p>{{$data->date}}</p>  <p>{{$data->time}}</p>
         
          <div class="text-right">
            <a href="javascript:;">Cancel</a>
          </div>
        </div>
       </div>          
      @empty
         <div class="Book-Manage-in"></div>
      @endforelse

      <div class="col-md-12">
        {!! $datas->appends(Request::get('page'))->links(); !!}
      </div>
  </div>
  <!-- upcoming booking (assign provider) -->
@elseif($type == '4') 
  <div class="Manage-classic-box">
    @if(@count($datas) == '0')
        <b>No records found</b>
   @endif
   <!-- compelete booking -->
      @forelse($datas as $key=>$data)
         <div class="d-flex">
          <div class="Book-Manage-in">
            <figure> 
            @if(empty($data->image) || is_null($data->image))
            <img src="{{asset('public/image/no1.jpg')}}">
            @else
            <img src="{{asset('public/image/book_service/'.$data->image)}}">
            @endif
            </figure>
            <figcaption>
               <a href="{{route('upcoming-request/detail',base64_encode($data->id))}}"> 
                <h4>{{ ($data->service_id)? service_name($data->service_id) : "N/A" }}
                </h4>
              </a> 
              <p> <i class="fa fa-user"></i> {{ ($data->assign_provider)? provider_name($data->assign_provider) : "N/A" }}</p>
             <!--  <p> <i class="far fa-credit-card"></i> {{$data->payment_type}}</p> -->
              <p>
                <span style="color: #65a4b4;padding-right:10px;font-weight: bold">{{ currency()}}
                </span>{{$data->price }}<span></span>
              <p> <i class="fas fa-map-marker-alt"></i>{{$data->address}}</p>
              <p> <i class="fas fa-phone"></i> {{ ($data->assign_provider)? user($data->assign_provider)->phone_no : "N/A"}}</p>
            </figcaption>
          </div>
          <div class="manage-right-box">
            <p>{{$data->date}}</p>  <p>{{$data->time}}</p>
           <div class="text-right">
            <a href="{{route('booking/cancel',base64_encode($data->id))}}" onclick="return confirm('Are you sure you want to cancel this service ?')">Cancel</a>
            </div>
          </div>
         </div>   
        @empty
         <div class="Book-Manage-in"></div>
        @endforelse
        <div class="col-md-12">
          {!! $datas->appends(Request::get('page'))->links(); !!}
        </div>
  </div>
  <!-- today booking -->
  @elseif($type == '6') 
  <div class="Manage-classic-box">
    @if(@count($datas) == '0')
        <b>No records found</b>
   @endif
      @forelse($datas as $key=>$data)
         <div class="d-flex">
          <div class="Book-Manage-in">
            <figure> 
            @if(empty($data->image) || is_null($data->image))
            <img src="{{asset('public/image/no1.jpg')}}">
            @else
            <img src="{{asset('public/image/book_service/'.$data->image)}}">
            @endif
            </figure>
            <figcaption>
               <a href="{{route('upcoming-request/detail',base64_encode($data->id))}}"> 
                <h4>{{ ($data->service_id)? service_name($data->service_id) : "N/A" }}
                </h4>
              </a> 
              <p> <i class="fa fa-user"></i> {{ ($data->assign_provider)? provider_name($data->assign_provider) : "N/A" }}</p>
              <!--<p> <i class="far fa-credit-card"></i> {{$data->payment_type}}</p> -->
              <p>
                <span style="color: #65a4b4;padding-right:10px;font-weight: bold">{{ currency()}}
                </span>{{$data->price }}<span></span>
              <p> <i class="fas fa-map-marker-alt"></i>{{$data->address}}</p>
              <p> <i class="fas fa-phone"></i> {{ ($data->assign_provider)? user($data->assign_provider)->phone_no : "N/A"}}</p>
            </figcaption>
          </div>
          <div class="manage-right-box">
            <p>{{$data->date}}</p>  <p>{{$data->time}}</p>
           <div class="text-right">
           <!--  <a href="{{route('booking/cancel',base64_encode($data->id))}}" onclick="return confirm('Are you sure you want to cancel this service ?')">Cancel</a> -->
            </div>
          </div>
         </div>   
        @empty
         <div class="Book-Manage-in"></div>
        @endforelse
        <div class="col-md-12">
          {!! $datas->appends(Request::get('page'))->links(); !!}
        </div>
  </div>
@else
  <div class="Manage-classic-box">  
   @if(@count($datas) == '0')
        <b>No records found</b>
   @endif
      @forelse($datas as $key=>$data)
       <div class="d-flex">
        <div class="Book-Manage-in">
          <figure>
            @if(empty($data->image) || is_null($data->image))
            <img src="{{asset('public/image/no1.jpg')}}">
            @else
            <img src="{{asset('public/image/book_service/'.$data->image)}}">
            @endif
          </figure>
          <figcaption>
            <a href="javascript:;">
            <h4>{{ service_name($data->service_id) }}</h4>
            </a>
            <p><i class="fa fa-user"></i> {{ provider_name($data->assign_provider) }}</p>
                <p><span style="color: #65a4b4;padding-right:10px;font-weight: bold">{{ currency()}}</span>{{$data->price }}<span></span>
            <p> <i class="fas fa-map-marker-alt"></i>{{$data->address}}</p>
          </figcaption>
        </div>
        <div class="manage-right-box">
          <p>{{$data->date}}</p>
          @if($type == 5)
          @if($data->rating_status == 1)
          <div class="text-right">
            <button>
              Rating Complete
           </button>
          </div>
           <!--  <button type="button" class="nav-link btn  btn-green" onclick="payWithPaystack()"> Pay </button>  -->
          
          @else
          <div class="text-right">
          <button id="test_btnn" class="nav-link btn  btn-green test_btnn" data-value1="{{ provider_name($data->assign_provider) }}" data-value2="{{user($data->assign_provider)->image }}" data-value3="{{ $data->assign_provider }}" data-value4="{{ $data->id }}" data-value5="{{ $data->service_id }}" >
              Rate
           </button>
           </div>
          @endif
          @endif
        </div>
       </div>          
      @empty
         <div class="Book-Manage-in"></div>
      @endforelse

      <div class="col-md-12">
        {!! $datas->appends(Request::get('page'))->links(); !!}
      </div>
  </div>
  <!-- model -->
  <div class="service-modal-box">
    <div class="modal fade"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-focus="false" id="my_Modal">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> 
            Rate and Review
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
           <!--  <form method="POST" action="" id="rate" enctype="multipart/form-data">
              @csrf -->
            <div class="row">
              <div class="Provided-imgs">
                <figure>
                @if(empty(user($data->assign_provider)->image))
                <img src="{{asset('public/user.png')}}">
                @else
                 <img src="{{asset('public/image/provider_profile/'.user($data->assign_provider)->image)}}">
                @endif
              </figure>
            </div>
              <div class="Provided-text-in">
                 <h4 class="provider_dname"></h4>
                 <span class="live-rating"></span>
              </div>
              <div class="Review-star">
                  <a class="my-rating-9"></a>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                   <input type="hidden" class="provider_id" name="provider_id" value=""/>
                   <input type="hidden" class="booking_id" name="booking_id" value=""/>
                   <input type="hidden" class="service_id" name="service_id" value=""/>
                   <textarea class="form-control review" name="review" placeholder="Write your review..."></textarea>
                </div>
              </div>
            </div>
            <div class="Creat-button-modal">
              <button id="submitRating" class="nav-link btn  btn-green submitRating">Submit</button>
            </div>
          <!-- </form> -->
          </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('.test_btnn').click(function(){  
   $("#my_Modal").modal({
    backdrop: 'static',
    keyboard: false
  });
    $(".provider_dname").text($(this).data('value1'));
    $(".provider_id").val($(this).data('value3'));
    $(".booking_id").val($(this).data('value4'));
     $(".service_id").val($(this).data('value5'));
  $('#my_Modal').modal('show');
});

$(".my-rating-9").starRating({
        initialRating: 0,
        disableAfterRate: false,
        onHover: function(currentIndex, currentRating, $el){
          console.log("1 "+currentRating);
          console.log("2 "+currentIndex);
          $('.live-rating').text(currentIndex);
        },
        onLeave: function(currentIndex, currentRating, $el){
          console.log("3 "+currentRating);
          console.log("4 "+currentIndex);
          $('.live-rating').text(currentRating);
        }
      });

$(document).on('click', '#submitRating', function(){

    var rating=$('.my-rating-9').starRating('getRating'); 
    var review= $('.review').val();
    var provider_id= $('.provider_id').val();
    var booking_id= $('.booking_id').val();
    var service_id=$('.service_id').val();

    var _token = "{!! csrf_token() !!}";

   $.ajax({
        url: 'rate',
        type: 'POST',
        data: {_token: _token, rating:rating, review:review, provider_id:provider_id,servicebooking_id:booking_id,service_id:service_id},
        success: function(response)
        {   
          console.log(response);
         // location.reload();
         $('#my_Modal').modal('hide');

        }
    });  


})

</script>

@endif




 

