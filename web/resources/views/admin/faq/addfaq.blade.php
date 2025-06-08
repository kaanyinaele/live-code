@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
       FAQ 
        <small>Add</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">FAQ Add</li>
      </ol>
</section>
 <section class="content">
  <div class="box box-default">
    <form method="POST"  action="{{route('faq/add')}}">
      @csrf
      <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group">

            <label>Enter question</label>
           <textarea name="question" class="form-control @error('question') is-invalid @enderror" placeholder="Enter question" rows="2" />{{ old('question')}}</textarea>
           <span class="form-control-feedback"></span>
                 @error('question')
                    <span class="invalid-feedback" style="color: red">
                        <strong >{{ $message }}</strong>
                    </span>
                @enderror
          </div>
          <!-- /.box -->
          <label>Enter Answer</label>
          <div class="box form-group">
            <div class="form-group">
              <h3 class="box-title">
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <textarea placeholder="Place your answer" class="textarea" name="answer" style="width: 100%; height: 200px; font-size: 14px; line-height: 25px; border: 1px solid #dddddd; padding: 10px;">{{ old('answer')}}</textarea>

                 @error('answer')
                  <span class="invalid-feedback" role="alert" style="color: red">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
       <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary pull-right">Submit</button>
        </div>
      </div>
    </div>
  </form>
</div>
 </section>
@endsection