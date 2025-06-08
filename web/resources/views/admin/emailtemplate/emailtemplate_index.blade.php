@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Email Template List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Emailtemplate List</li>
  </ol>
</section>
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box bo-co">
            <div class="box-header">
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped datatable">
                <thead>
                <tr>
                  <th>Title</th>
                  <th>Subject</th>
                  <th>Message</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($email as $data)
                  <tr>
                    <td>{{$data->title }}</td>
                    <td>{{$data->subject }}</td>
                    <td >{{strip_tags($data->message)}} </td>
                    <td style="width:70px;"> <center>
                     <a href="{{route('emailtemplate/view',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary"></a>

                    <a href="{{route('emailtemplate/edit',base64_encode($data->id))}}" class="glyphicon glyphicon-edit btn btn-primary"></a>
                    </center>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
           </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
@endsection