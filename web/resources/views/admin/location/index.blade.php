@extends('admin.master')
@section('content')
<section class="content-header">
  <?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<h1>
 Location List
  <small></small>
</h1>
<ol class="breadcrumb">
  <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Location</li>
</ol>
</section>
<section class="content">
  <div class="row">
    <div class="box bo-co flex">
      <div class="box-body">
        <div class="col-xs-12 from-lex">
          <form action="{{ route('location') }}" method="POST" class="from-bpox-in">
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
          <a href="{{route('location/add')}}" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Location</h3>
          </a>
        </div>  
      </div>
    </div>
  </div>
  <div class="row">
    <div class="box bo-co flex">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>S.No</th>
                <th>@sortablelink('name','name')</th>
                <th>Status</th>
                <th style="width:130px;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $data)
              <?php $i++; ?>
              <tr> 
                <td>{{ $i}}</td>
                <td>{{$data->name}} </td>
                 <td>
                @if($data->status == '0')
                <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this question?')" href="{{ route('location/status',[$data->id,$data->status])}}">
                  <i class="fa fa-lock"></i> Active
                </a>
                @endif  
                @if($data->status == '1')
                <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this question?');" href="{{ route('location/status',[$data->id,$data->status])}}">
                  <i class="fa fa-unlock-alt"></i> De-Active
                </a>
                @endif
                </td>
                <td>
                 <center>
                <form method="POST" action="{{route('location/delete',[$data->id,$page])}}">@csrf
                <a href="{{route('location/edit',[base64_encode($data->id),$page])}}" class="btn btn-primary btn-sm">
                <i class="glyphicon glyphicon-edit"></i></a>
              <!--   <a href="{{route('faq/view',base64_encode($data->id))}}" class="btn btn-primary btn-sm"> <i class="glyphicon glyphicon-eye-open"></i></a> -->
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this location')"> <i class="fa fa-trash"></i>
                </button>
                </form>
                </center>
                </td>
              </tr>
             @endforeach
             @if(count($datas) ==0)
            <tr>
              <td colspan="5">
               <h4 style="text-align:center">No data found</h4>
              </td>
            </tr>
           @endif 
          </tbody>
        </table>
          {{ $datas->appends(request()->except('page'))->links() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection 
