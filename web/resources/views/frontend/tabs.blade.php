<?php 
$segment1   =   Request::segment(1);
$segment2   =   Request::segment(2);
$segment3   =   Request::segment(3);
?> 
<div class="small-nav-section">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
          Menu
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto">
            <li class="nav-item">
               <a class="nav-link {{ (!empty($segment1) && $segment1 == 'appointments')? 'active' : '' }}" href="{{route('appointments')}}">My Appointments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ (!empty($segment1) && $segment1 == 'changepassword')? 'active' : '' }}" href="{{route('changepassword')}}">Change Password</a>
            </li>
            <li class="nav-item">
             <a class="nav-link {{ (!empty($segment1) && $segment1 == 'payment_setting')? 'active' : '' }}" href="{{route('payment_setting')}}">Payment Settings</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link " href="#">Notification Settings</a>
            </li> -->
            <li class="nav-item">
              <a class="nav-link {{ (!empty($segment1) && $segment1 == 'account-setting')? 'active' : '' }}" href="{{route('account_setting')}}">Account Settings </a>
            </li>
          <!--   <li class="nav-item">
              <a class="nav-link {{ (!empty($segment1) && $segment1 == 'logout')? 'active' : '' }}" onclick="return confirm('Are yor sure you want to logout ?')" href="{{route('logout')}}">Logout</a>
            </li> -->
          </ul>
        </div>
      </nav>
    </div>

     