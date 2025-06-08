@extends('frontend.layout')
@section('content')
 <div class="wraper-inner">
    <section class="abouts_page">
    <div class="container">
      <div class="heading text-center">
            <h4>{{$about->title}}</h4>
            <div class="separator"></div>
          </div>
      <div class="row">
        <div class="col-md-6">
          <div class="about_bg_img">
            <figure><img src="{{asset('public/image/about_us2.png')}}"></figure>
          </div>
        </div>
        <div class="col-md-6">
          <figcaption>
          <!-- <h3>About</h3> -->
         {!! substr($about->description,0,1010)!!}
          </figcaption>
        </div>
      </div>
     <div class="row">  <div class="col-md-12"> 
    
      {!!substr($about->description,1010,5000)!!}    
  
     </div>
   </div>
    </div>
   </section>
<!--    <section class="inner_about_des_section">
    <div class="container">
       <div class="mission_about">
        <h3>Our Mission </h3>
       {!! $about->our_mission !!}
      </div>
    </div>
   </section> -->
</div>
@endsection

