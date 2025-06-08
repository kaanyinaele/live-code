@extends('frontend.layout')
@section('content')
  <section class="bg_contact">
   <div class="container">
         <div class="heading text-center">
            <h4>{{$contact->title}}</h4>
            <div class="separator"></div>
          </div>
     <div class="row">
       <div class="col-md-8">
         <div class="contact_form">
             <h2>Send us a message</h2>
          <div class="profile_setup_form">
            <form action="{{route('contact')}}" method="POST" id="contact_us">
              @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                   <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name*">
                    @error('name')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
               </div> 
              </div> 
              <div class="col-md-6">
              <div class="form-group">
                <input type="text" name="email" placeholder="Email id*" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
             </div>  
            </div>

            <div class="row">
             <div class="col-md-12">
              <div class="form-group">
               <textarea placeholder="Message*" name="message" class="form-control @error('message') is-invalid @enderror"></textarea>
               @error('message')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
             </div> 
            </div>  
      
            <div class="row">
             <div class="col-md-12">
              <div class="form_submit_button">
              <button type="submit" class="nav-link btn  btn-green">Submit</button>
              </div> 
             </div> 
            </div> 
          </form>
          </div>
        </div>
       </div>
       <div class="col-md-4">
         <div class="contact_info">
          <h3>Contact Information</h3>
          {!!$contact->description!!}
           <div class="info_icons">
           <ul>
            <li>
              <span><i class="fas fa-map-marker-alt"></i></span>
              <p>{{ $global->address }}</p>
            </li>
             <li>
              <span><i class="fas fa-phone-volume"></i></span>
              <p>{{$global->phone_no}} </p>
            </li>
             <li>
              <span><i class="far fa-envelope"></i></span>
              <p>{{$global->email}}</p>
            </li>
           </ul>
           </div>
        </div>
       </div>
     </div>
   </div>
 </section>
<iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCNlJb_UA48WvlbzERlSXgMTiX6U322B-E
    &q={{$global->address}}" style="border:0;" allowfullscreen="" width="100%" height="500" frameborder="0">
</iframe>
@endsection

