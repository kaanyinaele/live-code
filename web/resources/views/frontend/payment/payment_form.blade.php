@extends('frontend.layout')
@section('content')  
  <section class="sec-padding">
      <div class="container">
        <div class="form-box m-auto">
          <div class="categories-Management account-manage-box">
          <div class="heading-in-section pay-Method">
            <h4>Payment Method</h4>
            <img src="images/pay-line.png">
          </div>
          <div class="from-in-box m-auto">
          <div class="form-group">
            <input type="text" name=""  class="form-control" placeholder="Card Number">
          </div>
            <div class="Expiry-title">
              <label>Expiry Date</label>
            </div>
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" type="Date" placeholder="Year">
                  <option>Year</option>
                  <option>2019</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" placeholder="Year">
                  <option>Month</option>
                  <option>2019</option>
                </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <input type="text" name=""  class="form-control" placeholder="CVV">
          </div>
          <div class="Creat-button-up">
           <button class="nav-link btn  btn-green" href="#">Submit</button>
          </div>
        </div>
        </div>
      </div>
  </section>
 @endsection 
