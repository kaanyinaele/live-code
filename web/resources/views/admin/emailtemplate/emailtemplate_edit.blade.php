@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
       Edit EmailTemplate 
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('dashboard')}}">
        <i class="fa fa-dashboard"></i> Home
      </a>
    </li>
    <li class="active">Edit EmailTemplate </li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="{{route('emailtemplate/update',$data->id)}}">
        @csrf
        <div class="row">
          <div class="col-md-12">
          <label>Title:</label>
          <div class="form-group">
          <input type="textarea" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data->title}}" placeholder="Enter title" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
           @error('title')
            <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
            </span>
           @enderror
          </div>
          <label>Subject:</label>
          <div class="form-group">
          <input type="textarea" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{$data->subject}}" placeholder="Enter subject" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
           @error('subject')
            <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
            </span>
           @enderror
          </div>
          <label>Description:</label>
          <div class="form-group" style="border: solid 1px #d2d6de;">
            <div class="box-header">
            <div class="box-body pad">
            <textarea class="textarea" placeholder="Place some Description" value="{{ $data->message }}" name="message" style="width: 100%; height: 300px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;">{!! $data->message !!}</textarea>
            @error('message')
            <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            </div>
            </div>
          </div>
      <!-- /.col-->
        </div>
      </div>
    <!-- ./row -->
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
