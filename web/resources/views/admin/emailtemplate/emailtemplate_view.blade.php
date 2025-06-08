@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
        EmailTemplate View
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">EmailTemplate View</li>
      </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="{{route('emailtemplate/update',$data->id)}}">
        @csrf
        <div class="row">
          <div class="col-md-12">
          <label>Title:</label>
          <div class="form-group">
          <input type="textarea" readonly class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data->title}}" placeholder="Enter title" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
          </div>
          <label>Subject:</label>
          <div class="form-group">
          <input type="textarea" readonly class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{$data->subject}}" placeholder="Enter subject" style="margin-bottom: 10px"/>
          <span class="form-control-feedback"></span>
          </div>
          <label>Description:</label>
          <div class="form-group" style="border: solid 1px #d2d6de;">
            <div class="box-header">
            <div class="box-body pad">
            <textarea disabled class="textarea" placeholder="Place some Description" value="{{ $data->message }}" name="message" style="width: 100%; height: 300px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;">{!! $data->message !!}</textarea>
            </div>
            </div>
          </div>
      <!-- /.col-->
        </div>
      </div>
    <!-- ./row -->
      
    </form>
  </div>
</div>
</section>
@endsection