@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   Edit CMSPage
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit CMSPAGE</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <form method="POST" action="{{route('cmspage/update',$cms->id)}}">
    	@csrf
      <div class="box-body">
        <div class="row">
          <div class="col-md-12">
            <label>Title:</label>
            <div class="form-group">
               <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$cms->title}}" placeholder="Enter title" style="margin-bottom: 10px"/>
               <span class="form-control-feedback"></span>
               @error('title')
                <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
            </div>
           <label>Description:</label>
            <div class=" form-group area-bo">
              <div class="box-body pad">
              <textarea class="textarea" placeholder="Place some Description" value="{{ $cms->description }}" name="description" style="width: 100%; height: 240px; font-size: 14px; line-height: 20px; border: 1px solid #dddddd; padding: 10px;">{!! $cms->description !!}</textarea>
              @error('description')
              <span class="invalid-feedback" role="alert" style="color: red">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
              </div>
            </div>
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
    </div>
  </form>
</div>
</section>
@endsection
