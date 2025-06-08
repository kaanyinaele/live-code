@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
        Provider Detail
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Provider Detail</li>
      </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box bo-co">
            <div class="box-header with-border">
              <h3 class="box-title">Provider Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>City</th>
                  <th>overview</th>
                  <th>Registration Date</th>
                  <th>Area</th>
                   <th>Street</th>
                   <th>Skill Category</th>
                  <th>Document</th>
                  <th>Profile</th>
                </tr>

                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone_no}}</td>
                  <td>{{$data->city}}</td>
                   <td>{{$data->overview}}</td>
                  <td>{{ $data->created_at->format('d-m-Y') }}</td>
                  <td>{{$data->area}}</td>
                  <td>{{$data->street}}</td>
                  <td>
                    @php
                    $cat = explode(',', $data->skill_category); 
                    $num = count($cat);
                    @endphp
                    @foreach($cat as $key=>$info)
                     {{ show_cat_name($info)}} 
                     @if(($num - 1) > $key)
                     ,
                     @endif
                    @endforeach
                  </td>
                  <td>
                  @if(!empty($data->document))
                    @php
                    $cat = explode(',', $data->document); 
                    $num = count($cat);
                    @endphp
                    @foreach($cat as $key=>$info)
                     <a target="_blank" href="{{asset('public/image/provider_document/'.$info)}}">
                    <i class="glyphicon glyphicon-download-alt"></i>
                      <!-- <img src="{{asset('public/image/provider_document/'.$info)}}" height="40px" width="50px" style="margin-bottom: 5px"> -->
                    </a>
                     @if(($num - 1) > $key)
                     <br>
                     @endif
                    @endforeach
                  @else
                  <img src="{{asset('public/dummy.jpg')}}" height="50px" width="50px">
                  @endif
                 </td>
                 <td>
                    @if(!empty($data->image))
                      <a href="{{asset('public/image/provider_profile/'.$data->image)}}">
                      <img src="{{asset('public/image/provider_profile/'.$data->image)}}" height="50px" width="50px">
                     </a>
                    @else
                      <img src="{{asset('public/dummy.jpg')}}" height="50px" width="50px" >
                    @endif
                  </td>

                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
 @endsection