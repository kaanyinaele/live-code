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
   FAQ Edit
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">FAQ Edit</li>
  </ol>
</section>
<section class="content">
  <div class="box box-default">
    <div class="box-body">
      <form method="POST" action="{{route('faq/update',$data->id)}}">
        @csrf
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <input type="hidden" value="{{$page}}" name="hidden">
              <label>Question</label>
              <textarea name="question" value="{{$data->question}}" placeholder="Enter question" class="form-control @error('question') is-invalid @enderror" rows="2" />{{$data->question}}</textarea>
              <span class="form-control-feedback"></span>
              @error('question')
                <span class="invalid-feedback" role="alert" style="color: red">
                <strong>{{ $message }}</strong>
                </span>
              @enderror
             </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <label>Answer</label>
              <div class="form-group" style="border: solid 1px #d2d6de;">
                <div class="box-body pad">
                  <textarea placeholder="Place your answer" name="answer" class="textarea @error('answer') is-invalid @enderror"
                   style="width: 100%; height: 300px; font-size: 14px; line-height: 45px; border: 1px solid #dddddd; padding: 10px;">{{$data->answer}}</textarea>
                   <span class="form-control-feedback"></span>
                   @error('answer')
                    <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck"></div>
          </div>
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary pull-right">Upadte</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection