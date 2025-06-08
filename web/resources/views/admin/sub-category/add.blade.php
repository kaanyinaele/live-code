@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
        Add Sub-category
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Sub-category</li>
      </ol>
</section>
 <section class="content">
      <div class="box bo-co">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
        </div>
        
        <form action="" method="POST">
        @csrf
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                 <label>Enter Sub-category Name:</label>
                <input type="text" class="form-control" placeholder="Enter Sub-category" value="{{old('sub_category')}}" name="sub_category">
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
                    <select class="form-control @error('parent_category') is-invalid @enderror"  name="parent_category">
                      @foreach($data as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
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
          <!-- /.row -->
        
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
    </div>
    </form>
  </div>
</section>
@endsection