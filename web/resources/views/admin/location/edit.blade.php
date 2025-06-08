@extends('admin.master')
@section('content')
<section class="content-header">
  <?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
  <h1>
   Location Edit
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Location Edit</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="{{route('location/update',$data->id)}}">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" value="{{$page}}" name="hidden">
              <label>Location Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Location Name" value="{{$data->name}}">
                <span class="form-control-feedback"></span>
                  @error('name')
                    <span class="invalid-feedback" style="color: red">
                        <strong >{{ $message }}</strong>
                    </span>
                  @enderror
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck"></div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary pull-right">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection