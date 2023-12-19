<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Tee-Short</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />

      <style type="text/css">

        .center
        {

            margin: auto;
            width: 70%;
            padding: 30px;
            text-align: center;
        }

        table,th,td
        {

            border: 1px solid black;
        }

        .th_deg
        {

            padding: 10px;
            background-color: #dc3545;
            font-size: 20px;
            font-weight: bold;
        }


      </style>
   </head>
   <body>

         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <div class="center">


                <table>


                        <tr>

                            <th class="th_deg">Product_title</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Order Date</th>
                            <th class="th_deg">Payment Status</th>
                            <th class="th_deg">Delivery Status</th>
                            <th class="th_deg">Cancel Order</th>


                        </tr>


                        @foreach($order as $order)
                        <tr>

                                <td><a href="{{ url('product_details', $order->product_id) }}">{{$order->product_title}}</a></td>
                                <td>{{$order->quantity}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                <td>{{$order->payment_status}}</td>
                                <td>{{$order->delivery_status}}</td>
                                <td>
                                    @if($order->delivery_status=='processing')
                                    <a onclick="return confirm('Are you sure to cancel this Order?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>

                                    @else

                                    <p style="color: blue;">Not Allowed</p>

                                    @endif
                                </td>

                        </tr>
                        @endforeach

                </table>

         </div>


      <!-- footer end -->
      
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>