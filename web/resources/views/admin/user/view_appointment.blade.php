@extends('admin.master')
@section('content')
<section class="content-header">
        <h1>Appointment
        <small></small>
      </h1>
      <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active"> view Appointment</li>
  </ol>
</section>
     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><!-- Appointment list --></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                   <th>S.No</th>
                  <th>Service</th>
                  <th>Date</th>
                   <th>Time</th>
                  <th>Address</th>
                 <!--  <th>Additional Information</th> -->
                  <th>Image</th>
                  <th>whatsapp Number</th>
                  <th> status</th>
                </tr>
                  @foreach($datas as $data)
                  <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ booking_service($data->service_id) }}</td>
                  <td>{{$data->date }}</td>
                  <td>{{$data->time}}</td>
                  <td>{{substr(strip_tags($data->address),0,80)}} </td>
                  <!-- <td>{{$data->additional_information }}</td> -->
                  <td>
                    @if(empty($data->image) || is_null($data->image))
                     <img src="{{asset('public/image/no1.jpg')}}" height="60" width="80px">
                    @else
                    <a href="{{asset('public/image/book_service/'.$data->image)}}">
                      <img src="{{asset('public/image/book_service/'.$data->image)}}" height="60" width="80px">
                    </a> 
                    @endif
                  </td>
                  <td>{{$data->whatsapp_no}}</td>
                   <td>
                    @if($data->status ==0 || $data->status ==1 ) 
                    Request booking
                    @elseif($data->status == 4)
                    upcoming booking
                    @elseif($data->status ==5)
                    Complete Booking
                    @elseif($data->status ==3)
                    Cancel Booking
                    @else
                    Current Booking
                    @endif
                   </td>
                </tr>
                 @endforeach
                  @if(count($datas) ==0)
                <tr>
                  <td colspan="10">
                    <h4 style="text-align:center">No Data Found</h4>
                  </td>
                </tr>
              @endif 
              </table>
              {{ $datas->appends(request()->except('page'))->links() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
@endsection 
