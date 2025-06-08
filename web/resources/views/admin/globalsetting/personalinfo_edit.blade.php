@extends('admin.master')
@section('content')
<section class="content-header">
  <h1>
    Global Setting
    <small></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Edit Global Setting</li>
  </ol>
</section>
<section class="content">
  <div class="row">
  <div class="col-md-12">
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="{{ ( !Session::has('gtab') )? 'active' : '' }}"> <a href="#tab_1" data-toggle="tab">Personal Information</a></li>
        <li class="{{ ( Session::has('gtab') && ( Session::get('gtab') == 'tab_2' ) )? 'active' : '' }}"><a href="#tab_2" data-toggle="tab">Site Information</a></li>
        <li class="{{ ( Session::has('gtab') && ( Session::get('gtab') == 'tab_3' ) )? 'active' : '' }}"><a href="#tab_3" data-toggle="tab">Social Links</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane {{ ( !Session::has('gtab') )? 'active' : '' }}" id="tab_1" name="tab_1">
            <div class="container-fluid">
              <div class="card card-default">
                <div class="card-header">
                  <h4 class="card-title"></h4>
                </div>
                <form method="POST" action="{{route('globalsetting/update',$data->id)}}">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="z">Contact Persion Name:</label>
                          <input type="text" class="form-control @error('contact_person_name') is-invalid @enderror" name="contact_person_name" value="{{$data->contact_person_name}}" >
                          @error('contact_person_name')
                          <span class="invalid-feedback" role="alert" style="color: red">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
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
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="pwd">Email:</label>
                          <div> <input type="email" class="form-control form-control @error('email') is-invalid @enderror" value="{{$data->email}}" name="email"/></div>
                          @error('email')
                          <span class="invalid-feedback" role="alert" style="color: red">
                          <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                          <label>Address:</label>
                          <div><input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address"  placeholder="address" value="{{$data->address}}"></div>
                          @error('address')
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
        <!-- /.tab-pane -->
        <div class="tab-pane {{ ( Session::has('gtab') && ( Session::get('gtab') == 'tab_2' ) )? 'active' : '' }}" id="tab_2" name="tab2">
          <div class="container-fluid">
            <div class="card card-default">
              <div class="card-header">
                <h4 class="card-title"></h4>
              </div>
              <form method="POST" action="{{route('siteinformation/update')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="z">Copyright:</label>
                        <input id="name" type="text" class="form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{$data->copyright}}" placeholder="Copyright">
                        @error('copyright')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="pwd">Title:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$data->title}}"  placeholder="Title">
                        @error('title')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="pwd">Favicon Icon:</label>
                        <div> 
                          <div class="row">
                            <div class="col-md-10">
                              <input type="file" class="form-control @error('favicon') is-invalid @enderror" value="{{$data->favicon}}" name="favicon"/>
                              @error('favicon')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                            <div class="col-md-2">
                              <img src="{{asset('public/image/favicon/'.$data->favicon)}}" height="30px" width="70px"/> 
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="pwd">Logo:</label>
                        <div> 
                          <div class="row">
                            <div class="col-md-10">
                              <input type="file" class="form-control @error('logo') is-invalid @enderror" value="{{$data->logo}}" name="logo"/>
                              @error('logo')
                              <span class="invalid-feedback" role="alert" style="color: red">
                              <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                          </div>
                            <div class="col-md-2">
                              <img src="{{asset('public/image/logo/'.$data->logo)}}" height="30px" width="70px"/> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Description:</label>
                        <div><input type="text" class="form-control @error('content') is-invalid @enderror" name="content" height="50px"  placeholder="Description" value="{{$data->content}}"></div>
                        @error('content')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="pwd">Vat:</label>
                        <input type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{$data->vat}}"  placeholder="Vat">
                        @error('vat')
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
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="tab-pane {{ ( Session::has('gtab') && ( Session::get('gtab') == 'tab_3' ) )? 'active' : '' }}" id="tab_3" name="tab3">
            <div class="container-fluid">
              <div class="card card-default">
                <div class="card-header">
                  <h4 class="card-title"></h4>
                </div>
                <form method="POST" action="{{route('socaillinks/update')}}">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="pwd">Instagram:</label>
                          <div> <input type="url" class="form-control @error('instagram') is-invalid @enderror" value="{{$data->instagram}}" name="instagram"/></div>
                          @error('instagram')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="pwd">Pinterest:</label>
                          <div> <input type="url" class="form-control @error('pinterest') is-invalid @enderror" value="{{$data->pinterest}}" name="pinterest"/></div>
                        </div>
                        @error('pinterest')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                      <!-- /.col -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="pwd">Twitter:</label>
                          <div> <input type="url" class="form-control @error('twitter') is-invalid @enderror" value="{{$data->twitter}}" name="twitter"/></div>
                          @error('twitter')
                        <span class="invalid-feedback" role="alert" style="color: red">
                        <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        </div>
                        <div class="form-group">
                          <label for="pwd">Facebook:</label>
                          <div> <input type="url" class="form-control @error('facebook') is-invalid @enderror" value="{{$data->facebook}}" name="facebook"/></div>
                          @error('facebook')
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
      </div>
      <div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- nav-tabs-custom -->
  </div>
</div>
</section>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB3F_B_YH0XuWy_EB-zK-w4hyNJ1vjEJqQ&libraries=places&callback=initMap" async defer style="border:0;" allowfullscreen="" width="100%" height="500" frameborder="0"></script>
<script>
function initMap() {
var input = document.getElementById('address');
var autocomplete = new google.maps.places.Autocomplete(input);

autocomplete.addListener('place_changed', function() {
var place = autocomplete.getPlace();

});


}
</script>
@endsection