@extends('admin.master')
@section('content')
<section class="content-header">
      <h1>
        Booking Service
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking Service</li>
      </ol>
</section>
     <section class="content">
      <div class="row">
       <!--  <div class="col-md-12"> -->
          <div class="box bo-co">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th>Service</th>
                  <th>User Name</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Address</th>
                  <th>Additional Information</th>
                  <th>Image</th>
                   <th>Sub-Category</th>
                  <th>Mobile Number</th>
                  <th>Whatsapp Number</th>
                  <th>Service</th>
                  <th>Unit/Cost</th>
                  <th>Qyantity</th>
                  <th>Price</th>
                  <th>Total Price</th>
                  <th>Provider Status</th>
                </tr>
                <tr>
                  <td>{{ booking_service($data->service_id) }}</td>
                      <td>{{ user_name($data->user_id) }}</td>
                      <td>{{$data->date }}</td>
                      <td>{{$data->time}}</td>
                      <td>{{substr(strip_tags($data->address),0,80)}} </td>
                    <!--   <td>{{$data->payment_type}}</td> -->
                      <td>{{$data->additional_information }}</td>
                      <td> <a href="{{asset('public/image/book_service/'.$data->image)}}"><img src="{{asset('public/image/book_service/'.$data->image)}}" height="50" width="40px"></a> </td>
                       <td>
                       @php
                        $cat = explode(',', $data->sub_category);  
                        $num = count($cat);
                        @endphp
                        @foreach($cat as $key=>$info)
                         {{ book_subcategory($info)}} 
                         @if(($num - 1) > $key)
                         
                         @endif
                        @endforeach
                      </td>
                      <td>{{$data->mobile_no }}</td>
                      <td>{{$data->whatsapp_no }}</td>
                      <td>
                      <?php $store=price_data($data->id); ?>
                     @foreach($store as $display)
                      {{ $display->service_name.',' }}
                      @endforeach 
                    </td> 
                    <td>
                      <?php $store=price_data($data->id); ?>
                     @foreach($store as $display)
                      {{ $display->cost.',' }}
                      @endforeach 
                    </td>
                    <td>
                      <?php $store=price_data($data->id); ?>
                     @foreach($store as $display)
                      {{ $display->quantity.',' }}
                      @endforeach 
                    </td>
                    <td>
                     <?php $store=price_data($data->id); ?>
                     @foreach($store as $display)
                      {{ $display->calculate_price.',' }}
                      @endforeach  
                    </td>
                      <td>{{ $data->price }}
                      </td>
                      <td>@if(empty($data->assign_provider)) <a class="btn btn-danger">No Responce</a>
                        @else {{provider_name($data->assign_provider)}}
                        @endif
                      </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.box -->
       <!--  </div> -->
      </div>
    </section>
 @endsection