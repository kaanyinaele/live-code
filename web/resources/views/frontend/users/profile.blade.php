@extends('layouts.frontapp')
@section('content')
<div class="container">
          <section class="Sectiondashboard">
            <div class="row">
             @include('frontend.includes.inner_sidebar')
              <div class="col-md-9 DashboardContent">
                <div class="dashTitle">
                  <h2 class="Getintouch">My Account</h2>
                </div>
              <form id="profileForm" method="POST" action="{{ route('users-profile-update') }}">
                @csrf
                  <div class="RightContent">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input_type">
                            <input type="text" class="form-control" id="first_name" placeholder="First name" name="first_name" value="{{ Auth::user()->first_name }}" /> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input_type">
                            <input type="text" class="form-control" id="last_name" placeholder="Last name" name="last_name" value="{{ Auth::user()->last_name }}" /> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="input_type">
                            <input type="text" class="form-control disabled" placeholder="+91 142 45 64 76" name="mobile_number" value="{{ Auth::user()->mobile_number }}" /> 
                        </div>
                      </div>
                     
                   </div>
                    <div class="loginbtn updatedbtn">
                        <button type="submit" class="btn waves-effect waves-light">Save</button> 
                    </div> 
                  </div>

                 




              </div>



            </div>
          </section>
        </div>
 <script type="text/javascript"> 
 
</script>  
@endsection
