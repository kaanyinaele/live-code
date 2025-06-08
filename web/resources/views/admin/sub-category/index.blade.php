@extends('admin.master')
@section('content')
<?php
  if(isset($_GET['page']))
  $page = $_GET['page']; 
  else
  $page=1;
 ?>
<section class="content-header">
 <h1>
  Sub-Category List
  <small></small>
 </h1>
 <ol class="breadcrumb">
  <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Sub-category</li>
 </ol>
</section>
<section class="content">
  <div class="row" >
    <div class="box bo-co float">
      <div class="box-body" >
        <div class="col-xs-12 from-lex">
         <form action="{{ route('sub-category') }}" method="POST" class="from-bpox-in" >
            @csrf
           <div class="form-group ">
            <input type="text" style="height:34px; width: 500px" placeholder="Entere Sub category" class="form-control" name="search" value="{{!empty($val)? $val : '' }}"  /> 
            </div>
            <div class="form-group">
              <button type="submit" id="button" class="btn btn-primary">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </form>
          <a href="{{route('sub-category/add')}}" style="float: right;margin-top: -20px">
              <h3 class="box-title btn btn-primary">
              Add Sub-category</h3>
          </a>
        </div>  
      </div>
    </div>
  </div>
  <div class="row">
    <div class="box bo-co">
      <div class="box-body">
        <div class="col-xs-12">
          <table id="example1" class="table table-bordered table-striped datatable" >
              <tr>
                  <th>S.No</th>
                  <th>@sortablelink('sub_category','Sub category ')</th>
                  <th>Parent Category</th>
                  <th width="60px">Status</th>
                  <th width="100px">Action</th>
              </tr>
                @foreach($datas as $data)
                  <?php $i++; ?>
                  <tr>
                      <td>{{ $i }}</td>
                      <td>{{ $data->sub_category }}</td>
                      <td>{{show_cat_name($data->parent_category)}}</td>
                      <td>
                      @if($data->status == '0')
                      <a class="btn btn-success btn-sm" onclick="return confirm('Are you sure, you want to de-active this sub-cataegory?')" href="{{ route('sub-category/status',[$data->id,$data->status])}}">
                        <i class="fa fa-lock"></i> Active
                      </a>
                      @endif  
                      @if($data->status == '1')
                      <a class="btn btn-warning btn-sm" onclick="return confirm('Are you sure, you want to Active this sub-cataegory?');" href="{{ route('sub-category/status',[$data->id,$data->status])}}">
                        <i class="fa fa-unlock-alt"></i> De-Active
                      </a>
                      @endif
                    </td>
                      <td style="width:70px;"> <center>
                      <form method="POST" action="{{route('sub-category/delete',[$data->id,$page])}}">@csrf
                   <!--     <a href="{{route('sub-category/view',base64_encode($data->id))}}" class="glyphicon glyphicon-eye-open btn btn-primary btn-sm"></a> -->
                      <a href="{{route('sub-category/edit',[base64_encode($data->id),$page])}}" class="glyphicon glyphicon-edit btn btn-primary btn-sm"></a>
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this sub-category')"> <i class="fa fa-trash">
                      </i>
                      </button>
                      </form>
                      </center>
                      </td>
                  </tr>
                  @endforeach
                  @if(count($datas) ==0)
                  <tr>
                  <td colspan="9">
                   <h4 style="text-align:center">No data found</h4>
                  </td>
                  </tr>
                @endif 
                
              </table>
              {{ $datas->appends(request()->except('page'))->links() }}
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection 

