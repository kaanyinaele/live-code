@extends('admin.master')
@section('content')
<?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<section class="content-header">
 <h1>
  Service category
  <small>List</small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Service category </li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('service/index') }}" method="POST" class="from-bpox-in" >
            @csrf
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Search" class="form-control" name="search" value="{{!empty($val)? $val : '' }}"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </form>
          <a href="{{route('add/services')}}" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Service category</h3>
          </a>
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
                  <th>@sortablelink('category_name','Service category Name')</th>
                 <!--  <th>Service Offered</th> -->
                  <th>Service Overview</th>
                <!--   <th>@sortablelink('Availability','Availability')</th> -->
                 <!--  <th>@sortablelink('Price','Price')</th> -->
                  <th>Image</th>
                  <th>Featured Image</th>
                  <th width="">Status</th>
                  <th width="130">Action</th>
              </tr>
                @foreach($service as $data)
                  <?php $i++; ?>
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{$data->category_name }}</td>
                      <!-- <td>{{$data->services_offered}}</td> -->
                      <td>{!!substr(strip_tags($data->service_overview),0,80)!!} </td>
                    <!--   <td>{{$data->Availability}}</td> -->
                      <!-- <td>{{$data->price }}</td> -->
                     <td>
                      <a href="{{asset('public/image/service/'.$data->image)}}">
                        <img src="{{asset('public/image/service/'.$data->image)}}" height="60" width="80px"/>
                      </a>
                    </td>

                      <td>
                        <a href="{{asset('public/image/featured_image/'.$data->featured_image)}}">
                          <img src="{{asset('public/image/featured_image/'.$data->featured_image)}}" height="60" width="80px"/>
                        </a>
                      </td>
                      <td>
                      @if($data->active_status == '0')
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this serive-cataegory?')" href="{{ route('category/status',[$data->id,$data->active_status])}}">
                        <i class="fa fa-lock"></i> Active
                      </a>
                      @endif  
                      @if($data->active_status == '1')
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this serive-cataegory?');" href="{{ route('category/status',[$data->id,$data->active_status])}}">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                      @endif
                    </td>
                      <td style="width:70px;"> <center>
                      <form method="POST" action="{{route('delete/service',[$data->id,$page])}}">@csrf
                       <a href="{{route('view/service',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a>
                      <a href="{{route('edit/service',[base64_encode($data->id),$page])}}" class="glyphicon glyphicon-edit btn btn-primary btn-sm"></a>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this serive-cataegory ?')"> <i class="fa fa-trash">
                      </i>
                      </button>
                      </form>
                      </center>
                      </td>
                  </tr>
                  @endforeach
                  @if(count($service) ==0)
                  <tr>
                  <td colspan="9">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                @endif 
                
              </table>
              {{ $service->appends(request()->except('page'))->links() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection 

