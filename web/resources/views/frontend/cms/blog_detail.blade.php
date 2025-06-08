@extends('frontend.layout')
@section('content')
 <section class="sec-padding blog-detail-sec">
      <div class="container">
        <div class="blog-detail-box">
          <figure>
          	<img src="{{asset('public/image/blog_featured/'.$data->featured_image)}}">
          </figure>
          <figcaption>
            <span>{{$data->created_at->format('F dS Y')}}</span>
            <h4>{{$data->title}}</h4>
            <p>{!! $data->description !!}</p>
          </figcaption>
      </div>
    </section>
@endsection