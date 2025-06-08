@extends('frontend.layout')
@section('content') 
@include('frontend.tabs')
 <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Account Settings</h4>
          </div>
          <div class="from-in-box m-auto">
            <form  action="{{route('accountsetting')}}" method="POST" id="account_setting" enctype="multipart/form-data">
              @csrf
              <div class="account-profile-box">
                <div class="profile-linkes">
                  <figure>
                    @if(empty(Auth::user()->image))
                      <img src="{{asset('public/user.png')}}">
                    @else
                      <img src="{{asset('public/image/users/'.profile_image()->image)}}">
                    @endif
                  </figure>
                  <div class="form-group">
                    <a href="javascript:;">
                      <label for="profile_image">
                        <i class="fas fa-pencil-alt"></i>
                      </label>
                    </a>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="profile_image" style="visibility: hidden; height: 0px;">
              </div>
              <div class="form-group">
                <input type="text" name="" class="form-control" value="{{$data->name}}" disabled="">
              </div>
              <div class="form-group">
                <input type="text" name=""  class="form-control" value="{{$data->email}}" disabled="">
              </div>
              <div class="form-group">
                <input type="text" name="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror" placeholder="Contact Number" value="{{$data->phone_no}}">
                 @error('mobile_no')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <input type="text" id="address" name="address" value="{{$data->address}}" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                @error('address')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="Creat-button-up">
               <button type="submit" class="nav-link btn  btn-green">Submit</button>
              </div>
            </form>
        </div>
      </div>
    </div>
  </section>
@endsection 

@section('scripts')
<script>
  var autocompleted    =  true;
  var field_id         =  "address";
  var old_address      =  $("#"+field_id).val();
  function initMap() {
      var input = document.getElementById(field_id);
      var autocomplete = new google.maps.places.Autocomplete(input);
      google.maps.event.addListener(autocomplete, 'place_changed', function () {
          old_address    =  $("#"+field_id).val();
          var place = autocomplete.getPlace();
          autocompleted = true;
          return false;
      });
  }
  $(document).on('keypress', '#'+field_id, function (e) { if (e.which == 13) e.preventDefault(); });
  $(document).on('keyup', '#'+field_id, function (e) {
      if($(this).val() != old_address) autocompleted = false;
      if( (e.which == 46) || (e.which == 8) ){ autocompleted = false; }
  });
  $(document).on('paste', '#'+field_id, function (e) { autocompleted = false; });
  $(document).on('blur', '#'+field_id, function (e) { if(autocompleted == false){ $(this).val(""); $(this).trigger("change"); } });
  // google.maps.event.addDomListener(window, 'load', init);
 </script>
@endsection   

