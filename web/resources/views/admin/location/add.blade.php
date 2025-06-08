@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   Location Add
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Location Add</li>
  </ol>
</section>
 <section class="content">
  <div class="box bo-co">
    <form method="POST"  action="{{route('add')}}">
      @csrf
      <div class="box-body">
      <div class="row bo-co">
        <div class="col-md-12 ">
          <div class="form-group">
            <label>Location Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Location Name">
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
          <div class="checkbox icheck">
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
</section>
@endsection