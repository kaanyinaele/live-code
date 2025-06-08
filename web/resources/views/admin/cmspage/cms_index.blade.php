@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    CMSPage List
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">CMSPage List</li>
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
                  <th>Description</th>
                  <th width="100">Action</th>
                </tr>
                </thead>
                <tbody>
                 @foreach($cms as $data)
                  <tr>
                    <td>{{$data->title }}</td>
                    <td >{{substr(strip_tags($data->description),0,125)}} </td>
                    <td style="width:70px;">
                      <center>
                      <a href="{{route('cms/view',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary"></a>

                      <a href="{{route('cmspage/edit',base64_encode($data->id))}}" class="glyphicon glyphicon-edit btn btn-primary"></a>
                      </center>
                    </td>
                  </tr>
                 @endforeach
                <tbody>
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