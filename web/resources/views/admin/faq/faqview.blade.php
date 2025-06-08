@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   FAQ View
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">FAQ View</li>
  </ol>
</section>
 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">FAQ View</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width:330px">Question</th>
                  <th >Answer</th>
                </tr>
                <tr>
                  <td>{{$data->question}}</td>
                  <td style="word-break: break-word;">{!!$data->answer !!} </td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>	
      </div>
  </section>
  @endsection