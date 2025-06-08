@extends('admin.master')
@section('content')
<?php 
if(!empty($page_no))
   $page = $page_no;
else
   $page=1;
?>
<section class="content-header">
  <h1>
    Edit Sub-category
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit  Sub-category</li>
  </ol>
</section>
<section class="content">
  <div class="box bo-co">
    <div class="box-body">
      <form method="POST" action="{{route('sub-category/update',$data->id)}}">
        @csrf
        <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                <input type="hidden" value="{{$page}}" name="hidden">
                 <label>Enter Sub-category Name:</label>
                <input type="text" class="form-control" placeholder="Enter Sub-category" value="{{$data->sub_category}}" name="sub_category">
                 <span class="form-control-feedback"></span>
                  @error('sub_category')
                    <span class="invalid-feedback" style="color: red">
                        <strong >{{ $message }}</strong>
                    </span>
                @enderror
              </div>
             </div>
            <div class="col-md-6">
               <div class="form-group">
                    <label>Select parent category:</label>
                    <select class="form-control @error('parent_category') is-invalid @enderror" name="parent_category">
                      @foreach($data1 as $category)
                      <option  {{ $data->parent_category == $category->id ? 'selected':'' }} value="{{$category->id}}"> {{$category->category_name}}</option>
                      @endforeach
                    </select> 
                    <span class="form-control-feedback"></span>
                    @error('parent_category')
                    <span class="invalid-feedback" role="alert" style="color: red">
                    <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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