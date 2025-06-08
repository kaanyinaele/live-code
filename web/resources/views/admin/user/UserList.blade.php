@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
  Customer list
  <?php
    if(isset($_GET['page']))
    $page = $_GET['page']; 
    else
    $page=1;
   ?>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Customer </li>
  </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('user_search') }}" method="POST" class="from-bpox-in" >
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
          <a href="{{route('add/user')}}"  style="float: right;margin-top: -23px">
              <h3 class="box-title btn btn-primary">
              Add User
              </h3>
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
            <thead>
              <tr>
                <th>S.No.</th>
                <th>@sortablelink('name', 'Full Name') </th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Zip Code</th>
                <th>@sortablelink('created_at', 'Registration Date')</th>
                <th>Image</th>
                <th>Total Booking</th>
                <th>Status</th>
                <th>Account Verify</th>
                <th>Action</th>
              </tr>
              @foreach($users as $k=>$data)
               <?php $k++; ?>
                <tr>
                  <td>{{++$i}}</td>
                  <td>{{$data->name}}</td>
                  <td>{{$data->email}}</td>
                  <td>{{$data->phone_no}}</td>
                 <!--  <td>{{$data->address}}</td> -->
                  <td>{{$data->zip_code}}</td>
                  <td>{{ $data->created_at->format('d-m-Y') }}</td>
                  <td>
                    @if(!empty($data->image))
                      <a href="{{asset('public/image/users/'.$data->image)}}">
                        <img src="{{asset('public/image/users/'.$data->image)}}" height="50px" width="50px" class="img-circle">
                      </a>
                    @else
                     <a href="{{asset('public/user.png')}}">
                      <img src="{{asset('public/user.png')}}" height="50px" width="50px" class="img-circle">
                      </a>
                    @endif
                  </td>
                  <td>
                    {{total_booking($data->id)}}
                  </td>
                  <td>
                    @if($data->status == '0')
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this user?')" href="{{ route('users/status',[$data->id,$data->status])}}" title="Deactive User">
                        <i class="fa fa-lock"></i> Active
                      </a>
                    @endif  
                    @if($data->status == '1')
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this user?');" href="{{ route('users/status',[$data->id,$data->status])}}" title="Active User">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                    @endif
                  </td>
                  <td>
                   @if($data->account_activate == 0) 
                  <span class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-lock"></i></span> 
                  @else
                  <span class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-saved"></i></span> 
                  @endif
                  </td>
                  <td>
                    <center>
                      <form method="POST" action="{{route('delete/user',[$data->id,$page])}}" class="form-inline">
                        <a href="{{ route('view/appointment',base64_encode($data->id)) }}" class="btn btn-success btn-sm">
                         appointment
                        </a>
                        <a href="{{route('view/user',base64_encode($data->id))}}" class="btn btn-success btn-sm">
                          <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{route('edit/user',[base64_encode($data->id),$page])}}" class="btn btn-primary btn-sm">
                          <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user ?')">
                          <i class="fa fa-trash"></i>
                        </button>
                      </form>
                    </center>
                  </td>
                </tr>
              @endforeach
              @if(count($users) ==0)
                <tr>
                  <td colspan="10">
                    <h4 style="text-align:center">No Data Found</h4>
                  </td>
                </tr>
              @endif 
            </thead>
          </table>
          {{ $users->appends(request()->except('page'))->links() }}
        </div>
    
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection 
