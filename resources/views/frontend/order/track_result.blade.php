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

    <div class="container mt-5">
        <h4 class="text-center">Order Details</h4>
        <div class="row m-3">
            <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            Name    : {{ $check->c_name}} <br>
                            Phone   : {{ $check->c_phone}}<br>
                            Order Id: {{ $check->order_id }}<br>
                            Status  : @if($check->status==0) <button class="btn btn-danger btn-sm">Pending</button> @endif<br>
                            Date    : {{ date('d F,Y'),strtotime($check->c_name) }} <br>
                            Subtotal: {{ $check->subtotal }} <br>
                            Total: {{ $check->total }}<br>
                        </div>
                    </div>
                    
            </div>
            
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                          <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#Sl</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order_details as $item)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->single_price }}</td>
                                        <td>{{ $item->subtotal_price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                </div> 
            </div>
        </div>

       
      
        
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



