@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   Enquiry Reply
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Enquiry Reply</li>
  </ol>
</section>
<section class="content">
   <div class="box box-default">
    <div class="box-body">
    <form method="POST" action="{{route('enquiry/reply',base64_encode($data->id))}}">
      @csrf
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Enquiry</label>
           <textarea type="text" disabled=""  value="{{$data->message}}" class="form-control" rows="2" />{{$data->message}}</textarea>
          </div>
           <label>Reply</label>
          <div class="form-group" style="border: solid 1px #d2d6de;">
            <div class="box-body pad">
                <textarea  placeholder="Place your reply" name="reply"  class="textarea @error('reply') is-invalid @enderror"
                 style="width: 100%; height: 300px; font-size: 14px; line-height: 45px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                 <span class="form-control-feedback"></span>
                 @error('reply')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary pull-right">Send</button>
          </div>
      </div>
    </form>
  </div>
</div>
</section>
@endsection

