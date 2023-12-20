<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')



    <style type="text/css">

        .title_deg
        {
            text-align: center;
            font-size: 30px;
            font-weigth: bold;
            padding-bottom: 40px;


        }

        .table_deg
        {
            border: 2px solid white;
            width: 100%;
            margin: auto;
            text-align: center;

        }

        .th_deg
        {

            background-color: #fc424a;
        }

        .image_size
        {

            width: 200px;
            height: 150px;
        }




    </style>

  </head>
  <body>
    <div class="container-scroller">
    @include('admin.sidebar')
        <!-- partial -->
    @include('admin.header')



    <div class="main-panel">
            <div class="content-wrapper">



            <h1 class="title_deg">All Orders</h1>


            <div style="padding-left: 400px; padding-bottom: 30px;">

                <form action="{{url('search')}}" method="get">



                    @csrf


                    <input type="text" style="color: black;" name="search" placeholder="Search For Something">

                    <input type="submit" value="Search" class="btn btn-outline-primary">


                    </form>
            
            </div>


            <table class="table_deg">
                <tr class="th_deg">
                    <th style="padding: 10px;">Name</th>
                    <th style="padding: 10px;">Email</th>
                    <th style="padding: 10px;">Address</th>
                    <th style="padding: 10px;">Phone</th>
                    <th style="padding: 10px;">Product title</th>
                    <th style="padding: 10px;">Quantity</th>
                    <th style="padding: 10px;">Price</th>
                    <th style="padding: 10px;">Order Date</th>
                    <th style="padding: 10px;">Payment Status</th>
                    <th style="padding: 10px;">Delivery Status</th>
                    <th style="padding: 10px;">Actions</th>
                    <th style="padding: 10px;">Delivered</th>
                    <th style="padding: 10px;">Print PDF</th>
                    <th style="padding: 10px;"> Send Email</th>
                    
                </tr>

                        @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>

                        <td>
                            @if($order->delivery_status != 'delivered')
                                <a href="{{ route('packed', $order->id) }}" class="btn btn-warning">Packed</a>
                                <a href="{{ route('shipped', $order->id) }}" class="btn btn-success">Shipped</a>
                            @else
                                <p style="color: green;">Order Delivered</p>
                            @endif
                        </td>

                        <!-- Actions for 'Delivered' -->
                        <td>
                            @if($order->delivery_status == 'shipped')
                                <a href="{{ route('delivered', $order->id) }}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a>
                            @elseif($order->delivery_status == 'delivered')
                                <p style="color: green;">Delivered</p>
                            @else
                                <!-- Show an empty space if neither 'shipped' nor 'delivered' -->
                                &nbsp;
                            @endif
                        </td>

                        <td>
                        <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>


                        <td>
                        <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>

                        </td>
                        
                    </tr>

                    @empty

                    <tr>
                        <td colspan="16">
                            No Data Found!
                        </td>
                    </tr>

                    @endforelse


            </table>

             </div>
    </div>


    
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>