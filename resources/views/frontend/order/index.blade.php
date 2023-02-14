<!DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title')</title>
<link rel="icon" type="image/x-icon" href="{{ asset('uploads/generalSettings/'.generalSetting()->favicon) }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">
</head>
<body>
    @include('frontend.include.header')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#sl</th>
                <th scope="col">OrderId</th>
                <th scope="col">Date</th>
                <th scope="col">Total</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                       <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ date('d F, Y') }}</td>
                        <td><?php echo $item->total ?></td>
                        <td><?php echo $item->payment_type ?></td>
                        <td>
                            @if($item->status==0)
                                    <button class="btn btn-danger">Order Pending</button>
                                @elseif($item->status==1)
                                    <button class="btn btn-info">Order Received</button>
                                @elseif($item->status==2)
                                    <button class="btn btn-primary">Order Shipped</button>
                                @elseif($item->status==3)
                                    <button class="btn btn-success">Order Done</button>
                                @elseif($item->status==3)
                                    <button class="btn btn-warning">Order Return</button> 
                                @else
                                    <button class="btn btn-danger">Order Cancel</button>                   
                            @endif    



                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
	

	<!-- Cart -->

	
	

	<!-- Newsletter -->

	<!-- Footer -->
<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/js/cart_custom.js') }}"></script>
</body>

</html>



