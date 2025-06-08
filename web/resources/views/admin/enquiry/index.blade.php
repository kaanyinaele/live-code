@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   Enquiry List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Enquiry </li>
  </ol>
</section>
<section class="content" >
<div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('enquiry') }}" method="POST" class="from-bpox-in" >
            @csrf
            <div class="form-group">
              <input type="text" style="height:34px; width: 500px" placeholder="Enter Name" name="search" value="{{!empty($val)? $val : '' }}" class="form-control" />
            </div><div class="form-group">
            <button type="submit" id="button" class="btn btn-primary">
                  <i class="glyphicon glyphicon-search"></i>
              </button></div>
          </form> 
         
        </div>  
      </div>
    </div>
  </div>
<div class="row">
    <div class="box bo-co">
      <div class="box-body">
        <div class="col-xs-12">    
            <table id="example1" class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th width="0px">@sortablelink('name','Name')</th>
                  <th width="0px">@sortablelink('email','Email')</th>
                  <th>Time</th>
                   <th>View</th>
                  <th width="90px">Reply</th>
                </tr>
              </thead>
              <tbody>
                @foreach($enquiry as $data)
                <?php $i++; ?>
                <tr>
                  <td>{{ $i}}</td>
                  <td>{{$data->name }}</td>
                  <td>{{$data->email }}</td>
                  <td>{{$data->created_at}}</td>
                   <td> <a href="{{route('enquiry/view',base64_encode($data->id))}}">
                    <i class="glyphicon glyphicon-eye-open btn btn-success"></i></a>
                  </td>
                  <td>
                    @if($data->reply_status == 0)
                    <a href="{{route('enquiry/reply',base64_encode($data->id))}}" class="btn btn-primary">Reply</a>
                    @else
                    <h5 class="text-success">Already replied</h5>
                    @endif
                  </td>
                </tr>
                @endforeach
                @if(count($enquiry) ==0)
                  <tr>
                  <td colspan="6">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                @endif 
              </tbody>
            </table>
             {{ $enquiry->appends(request()->except('page'))->links()}}
          <!-- /.box-body -->
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection

