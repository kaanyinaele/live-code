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
    <li class="active"> Appointment</li>
  </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('report-bookingsearch') }}" method="POST" class="from-bpox-in" >
            @csrf
            <div class="form-group">
              <input type="text" placeholder="Search" name="search" value="{{!empty($val)? $val : '' }}" class="form-control" />
            </div>
             <div class="form-group">
              <input type="date" id="from" placeholder="From" style="height:34px" name="from" value="{{!empty($from)? $from : '' }}" class="@error('from') is-invalid @enderror form-control" />
              @error('from')
              <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
             <div class="form-group">
              <input type="date" placeholder="To" style="height:34px" name="to" id="to" value="{{!empty($to)? $to : '' }}" class="form-control @error('to') is-invalid @enderror" />
            </div>
            <div class="form-group">
            <button type="submit" id="button" class="btn btn-primary">
                  <i class="glyphicon glyphicon-search"></i>
              </button>
              @error('to')
              <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{$meassage="Invalid date selection" }}</strong>
              </span>
              @enderror
            </div>
          </form> 
        </div>  
      </div>
    </div>
  </div>
    <div class="row">
      <div class="box bo-co">
      <div class="box-body">
        <div class="col-xs-12">
           <div class="box-body">
             <table id="booking" class="table table-bordered table-striped datatable display nowrap">
                 <thead>
                <tr>
                   <th>S.No</th>
                  <th>Service</th>
                  <th>Date</th>
                  <!--  <th>Time</th> -->
                  <th>Address</th>
                 <!--  <th>Additional Information</th> -->
                 <!--  <th>Image</th> -->
                  <th>whatsapp Number</th>
                  <th> status</th>
                </tr> </thead>
                <tbody>
                  @foreach($datas as $data)
                  <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ booking_service($data->service_id) }}</td>
                  <td>{{$data->date }}</td>
                  <!-- <td>{{$data->time}}</td> -->
                  <td>{{substr(strip_tags($data->address),0,80)}} </td>
                  <!-- <td>{{$data->additional_information }}</td> -->
                  <!-- <td>
                    @if(empty($data->image) || is_null($data->image))
                     <img src="{{asset('public/image/no1.jpg')}}" height="60" width="80px">
                    @else
                    <a href="{{asset('public/image/book_service/'.$data->image)}}">
                      <img src="{{asset('public/image/book_service/'.$data->image)}}" height="60" width="80px">
                    </a> 
                    @endif
                  </td> -->
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
                  </tbody>
              </table>
              
            </div>
    
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<style>
.dataTables_filter{
  display: none!important;
}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#booking').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection
