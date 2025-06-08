@extends('frontend.layout')
@section('content')
 <section class="sec-padding sec-in-bax">
      <div class="container">
        <div class="Provided-manage-box">
          <div class="Provided-cover">
           <img src="{{asset('public/image/provide.png')}}">
          </div>
          <div class="Provided-profile">
            <div class="Provided-text-file">
              <div class="Provided-imgs">
                <figure>
                @php $img=user($data->assign_provider)->image @endphp
                @if(empty($img))
                <img src="{{asset('public/user.png')}}">
                @else
                <img src="{{asset('public/image/provider_profile/'.$img)}}">
                @endif
                </figure>
              </div>
             <figcaption>
               <h6>{{user($data->assign_provider)->name}}</h6>
               <p>
                 @if(!empty(user($data->assign_provider)->overview))
                 {{user($data->assign_provider)->overview}}
                 @endif
               </p>
             </figcaption>
            </div>
          </div>
          <div class="Provided-section">
            <h5>Provided services</h5>
            <div class="Provided-links">
              <nav  class="navbar navbar-expand">
              <ul class="navbar-nav">
               @php $category = explode(',', user($data->assign_provider)->skill_category);  @endphp
                @foreach($category as $data1)
                <li class="nav-item" >
                  <a class="nav-link" href="#">{{show_cat_name($data1)}}</a>
                </li>
                @endforeach
              </ul>
             </nav>
            </div>
          </div>
          <div class="Provided-section">
            <h5>Gallery</h5>
            <div class="Provided-links">
              <div class="row">
                @php $category = explode(',', user($data->assign_provider)->skill_category);   @endphp

                @foreach($category as $data)
                  <div class="col-md-3">
                    <a href="">
                      <figure>
                        <img src="{{asset('public/image/featured_image/'.category_all($data)->featured_image)}}">
                      </figure>
                    </a>
                  </div>
                @endforeach     
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection