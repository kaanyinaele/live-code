@extends('frontend.layout')
@section('content')
    <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="title-bg-section">
            <h4>Create your account,</h4>
            <p>Please fill your details below</p>
          </div>
          <form action="{{route('registration')}}" method="POST" id="registration" autocomplete="off">
            @csrf
            <div class="from-in-box">
              <div class="form-group">
                  <div class="radio-sec">
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" id="customRadioInline1" value="1" name="radio_status" class="custom-control-input">
                      <label class="custom-control-label" for="customRadioInline1" >I am individual</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                      <input type="radio" value="2" id="customRadioInline2" name="radio_status" class="custom-control-input">
                      <label class="custom-control-label" for="customRadioInline2">I am Corporate</label>
                    </div>
                  </div>
              </div>
            <div class="form-group">
              <input type="text" name="name" id="name" value="{{ old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name*">
              @error('name')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="email" name="email" id="email" value="{{ old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address*">
              @error('email')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="text" name="phone_no" value="{{ old('phone_no')}}" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Mobile Number*">
              @error('phone_no')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="text" name="zip_code" value="{{ old('zip_code')}}" class="form-control @error('zip_code') is-invalid @enderror" placeholder="Zip Code">
              @error('zip_code')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password*" >
              @error('password')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="password" name="confirm_password" id="cpass"  class="form-control" placeholder="Confirm Password*">
              @error('confirm_password')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <input type="text" name="address" id="address" class="form-control" placeholder="Address*">
              @error('address')
              <span class="invalid-feedback" role="alert" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group custom-control custom-checkbox">
              <input type="checkbox" class="form-control custom-control-input @error('Accept') is-invalid @enderror" id="Accept" name="Accept">
              <label class="custom-control-label" for="Accept"><a href="{{route('term-condition')}}">Accept terms & conditions</a></label><br>
              @error('Accept')
              <span class="invalid-feedback" style="color: red">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="Creat-button-up">
             <button type="submit" class="nav-link btn btn-green" >Next</button>
            </div>
             <div class="have-account">
               <span>If you have an account? <a href="{{route('login')}}">Sign in</a></span>
             </div>
            </div>
          </form>
        </div>
      </div>
    </section>
@endsection
@section('scripts')
<script type="text/javascript">
  $( "#password" ).keyup(function() {
    $(this).closest('form').bootstrapValidator('revalidateField', 'confirm_password');
});
</script>

<!-- <script>
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
  $('#registration').bootstrapValidator('revalidateField', 'address');
  return false;
  });
}
$(document).on('keypress', '#'+field_id, function (e) { if (e.which == 13) e.preventDefault(); 
});
$(document).on('keyup', '#'+field_id, function (e) {
    if($(this).val() != old_address){
      autocompleted = false;
    } 
    if( (e.which == 46) || (e.which == 8) ){ autocompleted = false; 
  }
});
$(document).on('paste', '#'+field_id, function (e) { autocompleted = false; });
$(document).on('blur', '#'+field_id, function (e) {

  if(autocompleted == false){ 
  $(this).val(""); $(this).trigger("keyup"); 
  $('#registration').bootstrapValidator('revalidateField', 'address');
  }
});
  // google.maps.event.addDomListener(window, 'load', init);
  //var validation=document.getElementById(address).val(); 

  //  $(document).on('change', '#address', function () {
  //     $('#registration').bootstrapValidator('revalidateField', 'address');
  // });
 </script> -->
@endsection