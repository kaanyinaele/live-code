@extends('frontend.layout')
@section('content')  
@include('frontend.tabs')
 <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="categories-Management account-manage-box">
          <div class="heading-in-section text-center">
            <h4>Payment Settings</h4>
          </div>
          <div class="row">
            @foreach($datas as $data)
            <div class="col-md-4">
              <div class="Payment-in-box">
                <h6>{{$data->cardholder_name}}</h6>
                <p>{{$data->card_number}}</p>
                <div class="d-flex Payment-in-butt">
                   <a class="nav-link btn  btn-green" href="{{route('edit',base64_encode($data->id))}}">Edit</a>
                    @if($data->defalut_card == 0)
                      <a class="nav-link btn btn-yellow" href="{{route('delete',base64_encode($data->id))}}" onclick='return confirm("Are you sure with this action")'> Delete</a>
                    @endif
                   @if($data->defalut_card ==  '1')
                   <a class="nav-link btn btn-gray Payment-default" >Default</a>
                   @else
                   <a class="nav-link btn btn-gray" href="{{route('card-defalut',[base64_encode($data->id)])}}">Make as default</a>
                   @endif
                </div>
              </div>
            </div>
            @endforeach
          </div>
           <div class="new-card-buttn">
            <a class="nav-link btn  btn-green" href="{{route('addcard')}}">Add new card</a>
           </div>
        </div>
      </div>
  </section>
 @endsection

