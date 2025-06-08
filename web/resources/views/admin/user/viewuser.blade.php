@extends('admin.master')
@section('content')
<section class="content-header">
        <h1>Customer View
        <small></small>
      </h1>
      <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Customer view</li>
  </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Customer list</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                <!--   <th>Address</th> -->
                  <th>Zip Code</th>
                  <th>Registration Date</th>
                  <th>Image</th>
                </tr>
                <tr>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone_no}}</td>
                  <!-- <td>{{$data->address}}</td> -->
                 <td>{{$data->zip_code}}</td>
                  <td>{{ $data->created_at->format('d-m-Y') }}</td>
                  <td>
                  @if(!empty($data->image))
                  <a href="{{asset('public/image/users/'.$data->image)}}">
                  <img src="{{asset('public/image/users/'.$data->image)}}" height="50px" width="50px">
                  </a>
                  @else
                  <a href="{{asset('public/user.png')}}">
                  <img src="{{asset('public/user.png')}}" height="50px" width="50px">
                  @endif
                  </a>
                 </td>
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