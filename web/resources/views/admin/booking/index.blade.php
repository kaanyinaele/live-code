@extends('admin.master')
@section('content')
<section class="content-header">
 <h1>
  Booking Service List
  <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Booking Service </li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('booking') }}" method="POST" class="from-bpox-in" >
            @csrf
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Enter Date" class="form-control" name="search" value="{{!empty($val)? $val : '' }}"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
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
          <table id="example1" class="table table-bordered table-striped datatable" >
              <tr>
                  <th>S.No</th>
                  <th>Service</th>
                  <th>User Name</th>
                  <th>@sortablelink('date','Date')</th>
                  <th>Time</th>
                  <th>Address</th>
                 <!--  <th>payment Type</th> -->
                  <th>Additional Information</th>
                  <th>Image</th>
                  <th>View</th>
                  <th width="140px">Assign Provider</th>
              </tr>
                @foreach($booking as $data)
                  <?php $i++; ?>
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ booking_service($data->service_id) }}</td>
                      <td>{{ user_name($data->user_id) }}</td>
                      <td>{{$data->date }}</td>
                      <td>{{$data->time}}</td>
                      <td>{{substr(strip_tags($data->address),0,80)}} </td>
                     <!--  <td>{{$data->payment_type}}</td> -->
                      <td>{{$data->additional_information }}</td>
                      <td>
                        @if(empty($data->image) || is_null($data->image))
                         <img src="{{asset('public/image/no1.jpg')}}" height="60" width="80px">
                        @else
                        <a href="{{asset('public/image/book_service/'.$data->image)}}">
                          <img src="{{asset('public/image/book_service/'.$data->image)}}" height="60" width="80px">
                        </a> 
                        @endif
                      </td>
                      <td>
                      <a href="{{route('booking/view',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a>
                    </td>
                    <td>
                        @if(!empty($data->assign_provider)) <a class="text-info">{{provider_name($data->assign_provider)}}</a>
                        @else 
                        <button type="button" class="btn btn-info btn-sm open_modal" data-id="{{ $data->id }}"> Assign Provider</button>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  @if(count($booking) ==0)
                  <tr>
                  <td colspan="11">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                @endif 
                  
              </table>{{ $booking->appends(request()->except('page'))->links() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
        <form action="{{route('booking/select-provider')}}" method="POST" id="select_provider">
          @csrf 
          <div class="form-group">
            <label>Select Provider:</label>
            <select class="form-control" name="assign_provider" >
            <option value="" disabled selected>Select your option</option>
            @php $provider = provider_(); @endphp
            @foreach($provider as $provider_list)
            <option value="{{$provider_list->id}}">{{$provider_list->name}}</option>
            @endforeach
          </select> 
          </div>
          <input type="hidden" id="hdn" name="hdn">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-sm" >Submit</button>
            <!-- onclick='return confirm("Are you sure with this action")' -->
          </div>
      </form>
     </div>
    </div> 
  </div> 
</div>
<script type="text/javascript">
$('.open_modal').click(function(){ 
  //it prevent outerside click to close
  $("#myModal").modal({
    backdrop: 'static',
    keyboard: false
  });
   //var id = $(this).attr('data-id');
   //$('.open_modal')$(this).data('id');
  //($(this).data('id'));
  // console.log(id);
  $("#hdn").val($(this).data('id'));
  $('#myModal').modal('show');
})
</script>
@endsection 