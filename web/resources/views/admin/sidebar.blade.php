
    <!-- sidebar: style can be found in sidebar.less -->
<?php 
$segment2   =   Request::segment(2);
$segment3   =   Request::segment(3);
$segment4   =   Request::segment(4);
?> 
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <a href="{{route('edit/profile')}}">
          <?php $data=profile_image();?>
          @if(!empty($data->image))
          <img src="{{asset('public/image/users/'.Auth::user()->image)}}" class="img-circle"  height="41px" width="41px">
          @else
          <img src="{{asset('public/dummy.jpg')}}" height="35px" width="41px">
          @endif
        </a>
        </div>
        <div class="pull-left info">  
          <p>{{Auth::user()->name}}</p>
        </div>
      </div>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ (!empty($segment2) && $segment2 == 'dashboard')? 'active' : '' }}">
        <!--   sidebar-toggle" -->
          <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview {{ ($segment2 == 'user' || $segment2 == 'provider' || $segment2 == 'awaiting-provider') ? 'active' : '' }}">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('users')}}"><i class="glyphicon glyphicon-user"></i> Customers</a></li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-briefcase"></i> Provider
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{route('awaiting-provider')}}"><i class="glyphicon glyphicon-briefcase"></i> Awaiting Provider</a></li>
                <li><a href="{{route('provider')}}"><i class="glyphicon glyphicon-briefcase"></i> Approved Provider</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview {{ ($segment2 == 'booking' || $segment2 == 'service-request') ? 'active' : '' }}">
          <a href="#">
            <i class="glyphicon glyphicon-calendar"></i> <span>Booking Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('booking')}}"><i class="glyphicon glyphicon-briefcase"></i>Booking Requests</a></li>
            <li>
              <a href="{{route('service-request')}}"><i class="glyphicon glyphicon-briefcase"></i>Service Requests
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview {{ ($segment2 == 'service' || $segment2 == 'sub-category') ? 'active' : '' }}">
          <a href="#">
            <i class="glyphicon glyphicon-briefcase"></i> <span> Category Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="{{route('service/index')}}"><i class="glyphicon glyphicon-briefcase"></i><span>Category Management</span></a></li>
            <li>
              <a href="{{route('sub-category')}}"><i class="glyphicon glyphicon-briefcase"></i>Sub-Category Management
              </a>
            </li>
          </ul>
        </li>
        <li class="{{ (!empty($segment2) && $segment2 == 'location')? 'active' : '' }}"><a href="{{route('location')}}"><i class="glyphicon glyphicon-map-marker"></i><span> Location</span></a></li>

          <li class="{{ (!empty($segment2) && $segment2 == 'sliderimage')? 'active' : '' }}"><a href="{{route('sliderimage')}}"><i class="glyphicon glyphicon-picture"></i><span> Sliding Banner</span></a></li>

          <li class="{{ (!empty($segment2) && $segment2 == 'cmspage')? 'active' : '' }}"><a href="{{route('cmspage')}}"><i class="glyphicon glyphicon-list-alt"></i><span>CMS Pages</span></a></li>

           <li class="{{(!empty($segment2) && $segment2 == 'faq')? 'active' :''}}"><a href="{{route('faq')}}"><i class="glyphicon glyphicon-question-sign"></i><span>FAQ</span></a></li>

          <li class="{{(!empty($segment2) && $segment2 == 'emailtemplate')? 'active' :''}}"><a href="{{route('emailtemplate')}}"><i class="glyphicon glyphicon-envelope"></i><span>Email Templates</span></a></li>
     
           <li class="{{(!empty($segment2) && $segment2 == 'globalsetting') ? 'active' :''}}"><a href="{{route('globalsetting')}}"><i class="glyphicon glyphicon-cog"></i><span>Global Setting</span></a>
           </li>
           <li class="{{(!empty($segment2) && $segment2 == 'enquiry') ? 'active' :''}}"><a href="{{route('enquiry')}}"><i class="glyphicon glyphicon-pencil"></i><span>Enquiry</span></a>
           </li>
           <li class="{{(!empty($segment2) && $segment2 == 'blog') ? 'active' :''}}"><a href="{{route('blog')}}"><i class="glyphicon glyphicon-edit"></i><span>Blog</span></a>
           </li>
           <!-- <ul class="treeview-menu"> -->
          <li class="treeview {{ ($segment2 == 'report-user' || $segment2 == 'report-provider' ? 'active' : '' ||  $segment2 == 'report-booking' ? 'active' : '' )}}" >
          <a href="#">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li>
              <a href="{{route('report-user')}}"><i class="glyphicon glyphicon-list-alt"></i>User
              </a>
            </li>
            <li>
              <a href="{{route('report-provider')}}"><i class="glyphicon glyphicon-list-alt"></i>Provider
              </a>
            </li>
            <li><a href="{{route('report-booking')}}"><i class="glyphicon glyphicon-list-alt"></i>Booking </a>
            </li>
            <li>
              <a href="#"><i class="glyphicon glyphicon-list-alt"></i>Payment
              </a>
            </li>

          </ul>
        </li>
    
      <!-- </ul> -->
    </section>
    <!-- /.sidebar -->