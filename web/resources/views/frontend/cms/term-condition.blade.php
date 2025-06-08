@extends('frontend.layout')
@section('content')
  <section class="inner_Privacy_Policy_section">
    <div class="container">
        <div class="heading text-center">
          <div class="back-icon"><a href="{{route('registration')}}"><i class="fas fa-arrow-left"></i></a></div>
          <h4>{{$data->title}}</h4>
          <div class="separator">
        </div>
      </div>
      <figcaption>
        {!!$data->description!!}
      </figcaption>
    </div>
  </section>
@endsection