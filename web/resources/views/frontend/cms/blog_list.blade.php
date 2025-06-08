@extends('frontend.layout')
@section('content')
<section class="sec-padding blog-lists-sec">
      <div class="container">
       <div class="row">
       	@foreach($datas as $data)
        <div class="col-md-4">
          <article>
          <figure>
          	 <a href="{{route('blog-detail',base64_encode($data->id))}}">
          	   <img src="{{asset('public/image/blog_image/'.$data->image)}}">
          	</a>
          </figure>
          <figcaption>
            <span>{{$data->created_at->format('F dS Y')}}</span>
            <h4>{{$data->title}}</h4>
           <p>{{substr(strip_tags($data->description),0,50)}} </p>
          </figcaption>
          </article>
        </div>
        @endforeach
       </div>
      </div>
    </section>
@endsection