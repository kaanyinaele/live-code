@extends('frontend.layout')
@section('content')
<div class="inner-wraper">
    <div class="slider-home">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          @foreach($slider as $data) 
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? ' active' : '' }}"></li>
          @endforeach
        </ol>
        <div class="carousel-inner"> 
          <div class="video-btn" data-toggle="modal" data-target=".video-modal">
            <i class="far fa-play-circle"></i> Feature video
          </div>
         @foreach($slider as $data) 
          <div class="carousel-item  {{ $loop->first ? ' active' : '' }}">
            <img src=" {{asset('public/image/slider/'.$data->image)}}">
            <div class="slider-text">
              <div class="container">
                <article>
                </article>
              </div>
            </div>
          </div>
         @endforeach
        </div> 
        
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a> 
      </div>
    </div>
    <section class="banner-about">
      <div class="categories-home sec-padding">
        <div class="container">
          <div class="heading text-center">
            <h4>Our Service Categories</h4>
            <div class="separator"></div>
          </div>
          <div class="categories-home-in">
            <div class="row">
              @foreach($category as $data)
              <div class="col-md-3">
                <article>
                  <figure>
                    <a href="javascript:void(0);" class="open_modal" data-id="{{ $data->id }}">
                      <img src="{{asset('public/image/featured_image/'.$data->featured_image)}}"/>
                    </a>
                  </figure>
                  <figcaption class="d-flex">
                    <div class="d-flex">
                      <h4>
                        <a href="javascript:void(0);" class="open_modal" data-id="{{ $data->id }}">{{$data->category_name}}</a>
                      </h4>
                    </div>
                    <div class="ml-auto d-flex">
                      <a href="javascript:void(0);" class="open_modal" data-id="{{ $data->id }}">
                        <img src="{{asset('public/frontend/images/arrow-green.png')}}">
                      </a>
                    </div>
                  </figcaption>
                  <div class="rat-h-sec">
                    <i class="fas fa-star"></i>
                     @php
                     $avg=0;
                     $rating=DB::table('rating')->where('service_id', $data->id)->pluck('rating');

                    $rating_count=DB::table('rating')->where('service_id', $data->id)->count(); 
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
                </article>
              </div>
                 @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="home-about">
        <div class="container">
          <div class="row">
            <div class="col-md-5">
              <div class="heading">
                <h4>{{ $aboutUs->title }} <br>Ogaworkman</h4>
                <div class="separator"></div>
                {!! substr($aboutUs->description,0,1030) !!}
              </div>
            </div>
            <div class="col-md-6 ml-auto">
              <article>
                <img src="{{asset('public/frontend/images/about.png')}}">
              </article>
            </div>
          </div>
        </div>
      </div>
    </section> 
<!--  vedio  on slider  -->
<div class="modal fade video-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <video controls width="100%">
        <source src="{{asset('public/frontend/images/Advert-animation1.mp4')}}" type="video/mp4">
        <source src="{{asset('public/frontend/images/Advert-animation1.ogg')}}" type="video/ogg">
        Your browser does not support HTML5 video.
      </video>
    </div>
  </div>
</div>

<script type="text/javascript"> 
function geoFindMe() {

  function success(position) {
    console.log(position)
    const latitude  = position.coords.latitude;
    const longitude = position.coords.longitude;
  }

  function error(error) {
    console.log(error)
  }

  if (!navigator.geolocation) {
    alert('Geolocation is not supported by your browser');
  } else {
    status.textContent = 'Locating…';
    navigator.geolocation.getCurrentPosition(success, error);
  }
}
 window.onload = geoFindMe;
</script>
@endsection



