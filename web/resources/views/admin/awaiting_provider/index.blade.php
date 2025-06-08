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
    Awaiting Provider Lists
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Provider </li>
  </ol>
</section>
<section class="content">
  <div class="row ">
    <div class="box bo-co float">
      <div class="box-body">
        <div class="col-xs-12 from-lex">
          <form action="{{ route('awaiting-provider/search') }}" method="POST" class="from-bpox-in">
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
    <div class="box bo-co ">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable">
            <thead>
              <tr>
                <th>S.No</th>
                <th>@sortablelink('name', 'Name')</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>City</th>
                <th>@sortablelink('created_at', 'Registration Date')</th>
                <th>Skill Category</th>
                <th>Action</th>
              </tr>
              @foreach($provider as $k=>$data)
               <?php $k++; ?>
                <tr>
                  <td>{{ ++$i}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone_no}}</td>
                  <td>{{$data->city}}</td>
                  <td>{{ $data->created_at->format('d-m-Y') }}</td>
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
                  <td width="170">
                    <a href="{{route('awaiting-provider/view',base64_encode($data->id))}}" class="btn btn-warning btn-sm">
                      <i class="glyphicon glyphicon-eye-open"></i>
                    </a>
                    <a href="{{route('awaiting-provider/accept',base64_encode($data->id))}}" class="btn btn-primary btn-sm">Accept
                    </a>
                    <a href="{{route('awaiting-provider/reject',base64_encode($data->id))}}" class="btn btn-danger btn-sm">Reject
                    </a>
                  </td>
                </tr>
              @endforeach
              @if(count($provider) ==0)
                <tr>
                  <td colspan="10">
                    <h4 style="text-align:center">No Data Found</h4>
                  </td>
                </tr>
              @endif 
            </thead>
          </table>
          {{ $provider->appends(request()->except('page'))->links() }}
        </div>
       <!-- /.box-body -->
      </div>
     <!-- /.col -->
    </div>
  <!-- /.row -->
  </div>
</section>
@endsection 
