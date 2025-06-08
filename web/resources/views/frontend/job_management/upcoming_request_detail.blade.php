@extends('frontend.layout')
@section('content')
<section class="sec-padding">
      <div class="container">
        <div class="categories-Management">
          <div class="heading-in-section text-center">
            <div class="back-icon">
              <a href="{{route('appointments')}}"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h4>Job Management</h4>
          </div>
          <div class="row">
            <div class="col-md-5">
              <figure> 
                <img src="{{asset('public/image/book_service/'.$data->image)}}">
              </figure>
            </div>
            <div class="col-md-7">
              <div class="d-flex justify-content-between">
                <div class="manage-box">
                  <h6>{{ service_name($data->service_id) }}</h6>
                  <p> <i class="fas fa-map-marker-alt"></i>{{ $data->address }}</p>
                 <!--  <p> <i class="far fa-credit-card"></i> {{$data->payment_type}}</p> -->
                </div>
                <div class="manage-right-box">
                  <p><!-- {{ date('d-M-Y - d-M-Y', strtotime($data->date))}} {{$data->time}}  -->{{$data->date}}</p>
                  <div class="text-right">
                    @if($ack->service_status == 0 )
                    <a href="">Not Completed</a>
                    @endif
                    @if($ack->service_status == 1)
                      <a href="{{route('start-service',base64_encode($ack->id))}}" class="current-booking btn btn-green btn-lg">
                        <i class="far fa-play-circle" style="font-size: 18px;"></i>
                      Confirm Start</a>
                    @endif
                    @if($ack->service_status == 2)
                      <a href="javascript:;" class="current-booking btn btn-green btn-lg">
                        <i class="fas fa-spinner" style="font-size: 18px;"></i>
                      Progress</a>
                    @endif
                    @if($ack->service_status == 3)
                       <a href="{{route('end-service',base64_encode($ack->id))}}" class="current-booking btn btn-green btn-lg"> 
                        <i class="far fa-stop-circle" style="font-size: 18px;"></i>
                      Confirm End</a>
                    @endif   
                  </div>
                </div>
              </div>
              <div class="provider-box">
                <h4>Assigned service provider</h4>
                <div class="provider-in-box">
                  <figure>
                    @php $img=user($data->assign_provider)->image @endphp
                    @if(is_null($img))
                      <img src="{{asset('public/user.png')}}">
                    @else
                      <img src="{{asset('public/image/provider_profile/'.$img)}}">
                    @endif
                  </figure>
                  <figcaption>
                    <h6>{{ user($data->assign_provider)->name }}</h6>
                    <p>
                      @if(!empty(user($data->assign_provider)->overview))
                      {{user($data->assign_provider)->overview}}
                      @else
                     
                    @endif
                  </p>
                  </figcaption> 
                  <div class="View-link">
                    <a href="{{route('provider_profile',base64_encode($data->id))}}" style="margin-left: 490px">View Profile</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 @endsection