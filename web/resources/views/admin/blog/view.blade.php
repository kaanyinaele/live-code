@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
   Blog View
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Blog View</li>
  </ol>
</section>
 <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width:330px">Title</th>
                  <th >Description</th>
                   <th>Featured Image</th>
                  <th>Image</th>
                </tr>
                <tr>
                  <td>{{$data->title}}</td>
                  <td style="word-break: break-word;">{!!$data->description !!} </td>
                  <td>
                   <a href="{{asset('public/image/blog_featured/'.$data->featured_image)}}">
                    <image src="{{asset('public/image/blog_featured/'.$data->featured_image)}}" height="50px" width="50px">
                    </a>
                  </td>
                  <td>
                    <a href="{{asset('public/image/blog_image/'.$data->image)}}">
                    <image src="{{asset('public/image/blog_image/'.$data->image)}}" height="50px" width="50px">
                    </a>
                  </td>
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