@extends('frontend.layout')
@section('content')   
@include('frontend.tabs')
  <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Add new card</h4>
          </div>
          <form id="paymentcard" action="{{route('add-card')}}" method="POST">
          @csrf
            <div class="from-in-box m-auto">
            <div class="form-group">
              <input type="text" name="cardholder_name" class="form-control" placeholder="Card-holder Name">
            </div>
            <div class="form-group">
              <input type="text" name="card_number" class="form-control" placeholder="Card Number">
            </div>
              <div class="Expiry-title">
                <label>Expiry Date</label>
              </div>
             <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control" type="Date" name="expiry_year" placeholder="Year">
                    <option selected="true" disabled="disabled">Year</option>
                   @for($i=1; $i<=10; $i++)
                    <option>{{$year}} @php $year++ @endphp</option>
                    @endfor
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <select class="form-control" placeholder="Year" name="expiry_month">
                    <option value='' selected="true" disabled="disabled">--Select Month--</option>
                    <?php
                      $monthArray = range(1, 12);
                      ?>
                    <?php
                      $monthArray = range(1, 12);
                      foreach ($monthArray as $month) {
                        echo '<option value="'.$month.'">'.$formattedMonthArray[$month].'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            </div>
          <!--   <div class="form-group">
              <input type="text" name="cvv"  class="form-control" placeholder="CVV">
            </div> -->
            <div class="Creat-button-up">
             <button type="submit" class="nav-link btn  btn-green" href="#">Add Card</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection