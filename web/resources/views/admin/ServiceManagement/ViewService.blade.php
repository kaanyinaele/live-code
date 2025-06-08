@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
        View service category
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View service category</li>
      </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box bo-co">
            <div class="box-header with-border">
              <h3 class="box-title">Service category Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  
                  <th>Service category Name</th>
                      <!-- <th>Services Offered</th> -->
                       <th>Service Overview</th>
                       <!--  <th>Availability</th> -->
                         <!-- <th>Price</th> -->
                          <th>Image</th>
                           <th>Featured Image</th>
                </tr>
                <tr>
                       <td>{{$data->category_name }}</td>
                      <td>{!! $data->service_overview !!}</td>
                      <!-- <td>{{$data->Availability }}</td> -->
                      <!-- <td>{{$data->price }}</td> -->
                      <td><a href="{{asset('public/image/service/'.$data->image)}}"><img src="{{asset('public/image/service/'.$data->image)}}" height="60" width="80px"/></a></td>
                       <td><a href="{{asset('public/image/featured_image/'.$data->featured_image)}}"><img src="{{asset('public/image/featured_image/'.$data->featured_image)}}" height="60" width="80px"/></a></td>
                </tr>
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>

         
 @endsection