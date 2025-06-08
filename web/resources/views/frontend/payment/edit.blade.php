@extends('frontend.layout')
@section('content')   
@include('frontend.tabs')
  <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Editcard</h4>
          </div>
          <form id="paymentcard_edit" action="{{route('update',base64_encode($data->id))}}" method="POST">
          @csrf
            <div class="from-in-box m-auto">
            <div class="form-group">
              <input type="text" name="cardholder_name" value="{{$data->cardholder_name}}" class="form-control" placeholder="Card-holder Name">
            </div>
            <div class="form-group">
              <input type="text" name="card_number" class="form-control" value="{{$data->card_number}}" placeholder="Card Number">
            </div>
              <div class="Expiry-title">
                <label>Expiry Date</label>
              </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control" type="Date" name="expiry_year" placeholder="Year">
                    
                    @for($i=1; $i<=10; $i++)
                   <option  {{ $data->expiry_year == $year ? 'selected':'' }} value="{{$year}}"> {{$year}}
                    @php $year++ @endphp </option>
                     @endfor
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <?php
                  $monthArray = range(1, 12);
                  ?>
                  <select class="form-control" placeholder="Year" name="expiry_month">
                  <?php
                    foreach ($monthArray as $month) {
                        $selected = ($month == $data->expiry_month) ? 'selected' : '';
                      echo '<option '.$selected.' value="'.$month.'">'.$formattedMonthArray[$month].'</option>';
                    }
                  ?>
                  </select>
                </div>
              </div>
            </div>
           <!--  <div class="form-group">
              <input type="text" name="cvv"  class="form-control" placeholder="CVV">
            </div> -->
            <div class="Creat-button-up">
             <button type="submit" class="nav-link btn  btn-green" href="#">Edit Card</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection