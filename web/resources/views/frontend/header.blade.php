  <?php 
$segment2   =   Request::segment(2);
$segment1   =   Request::segment(1);
$segment4   =   Request::segment(4);
?> 
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{route('/')}}">
          <img src="{{asset('public/image/logo/'.GlobalTitle()->logo)}}">
        </a>
        @if(Request::segment(1) !='login')

           <div class="d-flex">   
            <div class="cat-head">
              <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  All Services 
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  @foreach(service(); as $service)
                  <a href="javascript:void(0);" class="dropdown-item open_modal" data-id="{{ $service->id }}">{{$service->category_name}}</a>
                 @endforeach
              </div>
              </div>
            </div>
           <!--  <div class="Countries-sec">
              <div class="dropdown">

                  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Location 
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    @foreach(location(); as $location)
                     <a href="javascript:void(0);" class="dropdown-item">{{$location->name}}</a>
                    @endforeach
                  </div>
              </div>
            </div> -->
            </div>
            <div class="sel-citys">
              <select name="sources" id="sources" class="custom-select sources" placeholder="Source Type">
                <option value="0" readonly>Location</option>
                 @foreach(location(); as $location)
                <option value="{{$location->name}}">{{$location->name}}</option>
                 @endforeach
              </select>
            </div>
          @endif
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ ($segment1 == 'blog-list') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('blog-list')}}">Blog</a>
            </li>
            <li class="nav-item {{ ($segment1 == 'contactus') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('contactus')}}">Contact Us</a>
            </li>
            
            <li class="nav-item {{ ($segment1 == 'aboutus') ? 'active' : '' }}">
              <a class="nav-link" href="{{route('aboutus')}}">About Us</a>
            </li>
            @if(Auth::check() && Auth::user()->role == '1')
              <li class="user-nav-section"><a href="{{route('appointments')}}">
                <figure>
                @if(empty(profile_image()->image))
                <img src="{{asset('public/user.png')}}">
                @else
                <img src="{{asset('public/image/users/'.profile_image()->image )}}">
                @endif
                </figure></a>
              </li>
              <li class="nav-item">
                <form method="post" action="{{route('logout')}}">
                  @csrf
                  <button type="submit" name="logout" class="btn btn-green" onclick="return confirm('Are you sure you want to logout ?')">Logout</button>
                </form> 
              </li>
            @else
              <li class="nav-item">
                <a class="nav-link  btn btn-yellow" href="{{route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-green" href="{{route('registration')}}">Signup</a>
              </li>
            @endif
          </ul>
        </div>
      </nav>
    </div>
  </header>
  <div id="myModal_" class="modal fade" role="dialog" style="margin-top:55px">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="padding: 0px 19px;">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
        <form action="" method="POST" id="select_subcat">
          @csrf 
          <div class="form-group">
            <label style=" font-size: 17px ">Select Service Sub-Category : </label>
            <select id="subcategory_" name="subcategory[]" multiple="multiple" required="required" class="selectpicker form-control subcategory_">
            </select>
          </div>
          <input type="hidden" id="hdn" name="hdn">
          <div class="form-group">
            <button type="submit" id="select_subcategory" class="nav-link btn  btn-green ">Submit</button>
          </div>
      </form>
     </div>
    </div> 
  </div> 
</div>  
 @section('headerscripts') 
<script type="text/javascript">
// $(document).ready(function(){
//   alert("k");
//  });
// jQuery('#subcategory_').subcategory_({}).focus(function(){ $(this).subcategory_("open");  }); 
// document.onload =  function() { alert("j"); }
// changeList(); }
// $('#subcategory_').on('sumo:opened', function(sumo) { alert("hhh");
//     console.log("Drop down opened", sumo)
// });
$('.open_modal').click(function(){ 
   //it prevent outerside click to close
    $("#myModal_").modal({
      backdrop: 'static',
      keyboard: false
    });
   var id = $(this).attr('data-id'); 
   $('.subcategory_').children().remove();
   // $('#subcategory_').removeClass('open');
   // $('subcategory_').attr('aria-expanded',false);
    $.ajax({
     type:'POST',
     url:'{!! route("get_sub_category") !!}',
     data:{
       _token :'<?php echo csrf_token() ?>', 
        id : id
      },
     success:function(data) {
        $('#subcategory_').empty();
        for(var i=0; i<data.length; i++){
          $('#subcategory_').append('<option value=' + data[i].id + '>' + data[i].sub_category + '</option>');
        }
        setTimeout(function(){ 
          $('#subcategory_').SumoSelect({ okCancelInMulti: true });
          $('#subcategory_')[0].sumo.reload();
          $('#subcategory_').parent().find(".CaptionCont.SelectBox").trigger("click");
        },100)
     }
  });
   $('#select_subcat').attr('action',"{{ url('servicedetail') }}/"+btoa(id));

   
   $('#myModal_').modal('show');
})
$(function () {
  // $('.selectpicker').SumoSelect({ okCancelInMulti: true, selectAll: true });
    // $('.selectpicker').selectpicker();
});
</script>
<style type="text/css">
  .SumoSelect.sumo_subcategory { width: 100%; display: block; }
</style>
@endsection               