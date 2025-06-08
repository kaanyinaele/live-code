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
  Update Provider
  <small></small>
  </h1>
  <ol class="breadcrumb">
    <li>
       <a href="{{route('dashboard')}}">
       <i class="fa fa-dashboard"></i> Home
       </a>
    </li>
    <li class="active">Update Provider</li>
  </ol>
</section>
<section class="content">
   <div class="box bo-co">
      <div class="container-fluid">
         <div class="card card-default">
            <div class="card-header">
               <h4 class="card-title">Update Provider Profile</h4>
            </div>
            <form method="POST" action="{{route('provider/update',base64_encode($data->id))}}" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                          <input type="hidden" value="{{$page}}" name="hidden">
                           <label for="z">Full Name:</label>
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}"  autofocus placeholder="Full Name">
                           @error('name')
                           <span class="invalid-feedback" role="alert" style="color: red">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="pwd">Email:</label>
                           <div>
                              <input type="email" class="form-control" value="{{$data->email}}" readonly />
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="pwd">Mobile Number:</label>
                           <input type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{$data->phone_no}}"  placeholder="Mobile Number">
                           @error('phone_no')
                           <span class="invalid-feedback" role="alert" style="color: red">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        <div class="form-group">
                           <label for="pwd">Overview(aboutus)</label>
                           <textarea class="form-control @error('overview') is-invalid @enderror" name="overview" value="{{$data->overview}}" rows="3" placeholder="Overview">{{$data->overview}}</textarea>
                           @error('overview')
                           <span class="invalid-feedback" role="alert" style="color: red">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                       
                     </div>
                     <!-- /.col -->
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="pwd">Enter City:</label>
                             <input type="text"  class="form-control" value="{{ $data->city}}" placeholder="Enter City" name="city">
                             <span class="form-control-feedback"></span>
                             @error('city')
                             <span class="invalid-feedback" role="alert" style="color: red">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                        </div>
                     <!--    <div class="form-group">
                           @if(empty($data->document))
                            <label>Document:</label>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="file" name="document" class="form-control @error('document') is-invalid @enderror" >
                              </div>
                                @error('document')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror  
                           </div>
                           @else
                           <label>Document :</label>
                           <div class="row">
                              <div class="col-md-10">
                                 <input type="file" name="document" class="form-control @error('document') is-invalid @enderror">
                              </div>
                              <div class="col-md-2">
                                 <img src="{{asset('public/image/provider_document/'.$data->document)}}" height="34" width="71px">
                              </div>
                                @error('document')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           @endif
                           </div> -->
                           <div class="form-group">
                           @if(empty($data->image))
                            <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-12">
                                 <input type="file" name="provider_profile" class="form-control @error('provider_profile') is-invalid @enderror" placeholder="select image">
                              </div>
                                @error('provider_profile')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror  
                           </div>
                           @else
                           <label>Profile Image:</label>
                           <div class="row">
                              <div class="col-md-10">
                                 <input type="file" name="provider_profile" class="form-control @error('provider_profile') is-invalid @enderror" placeholder="select image">
                              </div>
                              <div class="col-md-2">
                                 <img src="{{asset('public/image/provider_profile/'.$data->image)}}" height="34" width="71px">
                              </div>
                                @error('provider_profile')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                           </div>
                           @endif
                           </div>

                          <div class="form-group">
                             <label>Business/skill category:</label><br>
                             <select class=" selectpicker selectpickerForm  @error('skill_category') is-invalid @enderror" multiple="multiple" name="skill_category[]" >
                               @foreach($skill_cat as $service)
                               @php
                                  $datas = explode(",", $data->skill_category);
                                     if(in_array($service->id, $datas )){
                                       $val = "selected";
                                     }else{
                                     $val = "";
                                   }
                               @endphp
                               <option value="{{$service->id}}" {{ $val }}>{{$service->category_name}}</option>
                               @endforeach
                             </select> 
                             <span class="form-control-feedback"></span>
                             @error('skill_category')
                             <span class="invalid-feedback" role="alert" style="color: red">
                             <strong>{{ $message }}</strong>
                             </span>
                             @enderror
                        </div>
                        <div class="form-group">
                          <label>Street Name:</label>
                          <input type="text" name="street" class="form-control" value="{{ $data->street}}" placeholder="Street Name">
                          <span class="form-control-feedback"></span>
                          @error('street')
                          <span class="invalid-feedback" role="alert" style="color: red">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                         <div class="form-group">
                          <label>Enter Area Address:</label>
                          <input type="text" name="area" class="form-control" value="{{$data->area}}" placeholder="Enter Area Address">
                          <span class="form-control-feedback"></span>
                          @error('area')
                          <span class="invalid-feedback" role="alert" style="color: red">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  <div class="col-md-12">
                     <button type="submit" name="submit" class="btn btn-primary pull-right" style="margin-bottom: 20px;margin-left: 10px">Update</button>
                  </div>
                </div>
               </div>
               <!-- /.card-body -->
            </form>
         </div>
         <!-- /.card -->
      </div>
   </div>
</section>
<style type="text/css">
  .SumoSelect.sumo_subcategory { width: 100%; display: block; }
   .SumoSelect.sumo_skill_category { width: 100%; }
</style>
@endsection

@section('scripts')
<script> 
 //multiple selectbox
  setTimeout(function(){ 
    $('.selectpickerForm').SumoSelect({ okCancelInMulti: true });
      $('.selectpickerForm').css("height",0); 
  },100);
</script>

@endsection