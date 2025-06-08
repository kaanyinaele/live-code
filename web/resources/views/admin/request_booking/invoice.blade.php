
<html>
<head>
  <meta charset="utf-8">

  <title>Ogaworkman-pdf</title>

  <!--responsive-meta-here-->
  <meta name="viewport" content="minimum-scale=1.0, maximum-scale=1.0,width=device-width, user-scalable=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <!--responsive-meta-end-->
   <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet"> 
</head>
<body style="height: 100%; background-color:#fff;">
   <table style="width: 100%;">
     <tr>
       <th style="text-align: left;padding-left: 30px;"><h1 style="font-size: 75px; color: #65a4b4; font-weight: 700;margin-bottom: 0px;">INVOICE</h1></th>
       <th style="text-align: right;padding-right: 30px;"><img src="{{asset('public/logo.jpg')}}" style="max-width: 340px;"></th>
     </tr>
   </table>

  <table style="width: 100%;padding: 20px 10px; font-family: 'Josefin Sans'; border-bottom: 1px solid #fff; margin-bottom: 10px;">
    <tr style="justify-content: space-between; padding: 0px 20px;">
        <th>
          <span style="text-align: left; display: block;margin-bottom: 10px;border-bottom: 2px solid #3f5960">
             <h6 style="margin: 0px; padding-bottom: 5px; font-family: 'Josefin Sans'; text-align: left;font-size:16px;">INVOICE NUMBER</h6>
             <h5 style="margin: 0px; padding-bottom: 5px; font-family: 'Josefin Sans'; font-size: 14px;">{{ $service_book_id}}</h5>
          </span>
          <span style="text-align: left;">
             <h6 style="margin: 0px; padding-bottom: 5px; font-family: 'Josefin Sans'; text-align: left;font-size:16px;">DATE OF ISSUE</h6>
             <h5 style="margin: 0px; padding-bottom: 5px; font-family: 'Josefin Sans'; font-size: 14px;">{{date("F/j/Y")}}</h5>
          </span>
        </th>
        <th style="">  
          <h6 style="margin: 0px; padding-bottom:5px;font-size: 14px;">Ogaworkman</h6>  
          <h6 style="margin: 0px; padding-bottom:5px;font-size: 14px;">Portharcourt</h6> 
          <h6 style="margin: 0px;padding-bottom:5px;font-size: 14px;">Rivers State,</h6> 
        </th>
    </tr>
  </table>


   <table style="border: 1px solid #9d7628; width: 100%; text-align: left; padding: 10px;  font-family: 'Josefin Sans';border-radius: 8px;  border-collapse: collapse;">
      <tr style="background:#fec34d; color:#fff; font-family: 'Josefin Sans'; font-size: 14px;  border-bottom: 1px solid #fec34d;">
        <th style="padding: 10px;">BILLED TO</th>
        <th style="padding: 10px;">INVOICE TOTAL</th>
        <th style="padding: 10px;">info</th>
      </tr>
      <tbody>
        <tr style="font-family: 'Josefin Sans'; font-size: 14px;">
          <td style="padding: 10px;">{{ $to_name }}</td>
          <td style="padding: 10px;">#{{$print_data1}}</td>
          <td style="padding: 10px;">Nigeria.500102</td>
        </tr>
         <tr style="font-family: 'Josefin Sans'; font-size: 14px;">
          <td style=";padding: 10px;">{{ $address }}</td>
          <td style="padding: 10px;"></td>
          <td style="padding: 10px;">09062000701,09062000702</td>
        </tr>
         <tr style="font-family: 'Josefin Sans'; font-size: 14px;">
          <td style="padding: 10px;">{{ $to_email }}</td>
          <td style="padding: 10px;"></td>
          <td style="padding: 10px;">info@ogaworkman.com</td>
        </tr>
        <tr style="font-family: 'Josefin Sans'; font-size: 14px;">
          <td style="padding: 10px;"><!-- [ZIP Code] --></td>
          <td style="padding: 10px;"></td>
          <td style="padding: 10px;">www.ogaworkmen.com</td>
        </tr>
      </tbody>
   </table>

   <table style="border: 1px solid #65a4b4; width: 100%; text-align: left; padding: 10px; font-family: 'Josefin Sans';border-radius: 8px;  border-collapse: collapse; margin-top: 30px;">
      <tr style="background: #65a4b4; color:#fff; font-family: 'Josefin Sans'; font-size: 14px;  border-bottom: 1px solid #65a4b4;">
        <th style="padding: 10px;">DESCRIPTION</th>
        <th style="padding: 10px;">UNIT COST</th>
        <th style="padding: 10px;">QTY</th>
        <th style="padding: 10px;">AMOUNT</th>
      </tr>
      <tbody>  
       @php $subtotal=0;  @endphp
        @foreach($print_data as $price_data)
        <tr style="font-family: 'Josefin Sans'; font-size: 14px;  border-bottom: 1px solid #65a4b4;">
          <td style="padding: 10px;">{{$price_data->service_name}}</td>
          <td style="padding: 10px;"> {{$price_data->cost}}</td>
          <td style="padding: 10px;">{{$price_data->quantity}}</td>
          <td style="padding: 10px;">@php  $subtotal= $subtotal + $price_data->calculate_price; @endphp {{$price_data->calculate_price}} </td>
        </tr>
        @endforeach
         
      </tbody>
   </table>

   <table style="border: 1px solid #65a4b4; width: 100%; text-align: left; padding: 10px; font-family: 'Josefin Sans';border-radius: 8px;  border-collapse: collapse; margin-top: 30px;">
     <tr style="border: 1px solid #fff;">
       <th style="background: #5b97a6; color: #fff; padding: 15px;"><h4 style="margin-bottom: 0px;">Customer’s Info</h4></th>
       <th style="background: #3f5960; text-align: center; color: #fff; padding: 15px;"><h4 style="margin-bottom: 0px;">TOTAL</h4></th>
     </tr>
      <tr>
         <th style="background: #5b97a6; color: #fff; padding-left: 15px; padding-top: 20px;">{{$to_name}}</th>
         <th style="background: #3f5960; width: 500px; font-size: 14px; font-weight: 400; color: #fff; padding-top: 20px; padding-left: 20px;">SUBTOTAL={{$subtotal}}</th>
      </tr>
      <tr>
         <th style="background: #5b97a6; color: #fff; padding-left: 15px;">{{$user_alldata->phone_no,$user_alldata->whatsapp_no}}</th>
         <th style="background: #3f5960; width: 500px; font-size: 14px; font-weight: 400; color: #fff; padding-left: 20px;">DISCOUNT 
          @if($print_data[0]->discount !== '0') 
         = {{$print_data[0]->discount}}
           @endif
         </th>
      </tr>
      <tr>
         <th style="background: #5b97a6; color: #fff; padding-left: 15px;">{{$address}}</th>
         <th style="background: #3f5960; width: 500px; font-size: 14px; font-weight: 400; color: #fff; padding-left: 20px;">(VAT RATE) {{$print_data[0]->vat}} %</th>
      </tr>
      <tr>
         <th style="background: #5b97a6; color: #fff; padding-left: 15px;"><!-- City, ST - ZIP --></th>
         <th style="background: #3f5960; width: 500px; font-size: 14px; font-weight: 400; color: #fff; padding-left: 20px;">VAT</th>
      </tr>
      <tr>
         <th style="background: #5b97a6; color: #fff; padding-left: 15px;">{{$to_email}}</th>
         <th style="background: #3f5960; width: 500px; font-size: 14px; font-weight: 400; color: #fff; padding-left: 20px;">TOTAL= {{ $print_data1 }}</th>
      </tr>
   </table>

</body>
</html>