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

    <div class="super_container">
	

	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart_container card p-1">
                        <div class="cart_title text-center">Billing Address</div>
                        <form action="">
                            <div class="row p-4">
                                <div class="form-group col-lg-6">
                                    <label for="">Customer Name</label>
                                    <input type="text" class="form-control" value="{{ ucwords(Auth::user()->name) }}" name="name" placeholder="Customer Name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Customer Phone</label>
                                    <input type="text" class="form-control" value="{{ ucwords(Auth::user()->phone) }}" name="phone" placeholder="Customer Name">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Country</label>
                                    <input type="text" class="form-control"  name="country" placeholder="Customer Country">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="">Shipping Address</label>
                                    <input type="text" class="form-control"  name="address" placeholder="Customer Address">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control"  name="email" placeholder="Customer Email">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control"  name="zip" placeholder="Customer Zip Code">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="">Extra Address</label>
                                    <input type="text" class="form-control"  name="e_address" placeholder="Customer Extra Address">
                                </div>
                                 <div class="form-group col-lg-6">
                                    <label for="">Extra Phone</label>
                                    <input type="text" class="form-control"  name="e_phone" placeholder="Customer Extra Phone">
                                </div>
                                <strong>Payment Method</strong>
                                <div class="row ml-5">
                                    <div class="form-group col-lg-4 ">
                                        <label for="">Paypal</label>
                                        <input type="radio" class="form-control mt-1" name="payment_type">
                                    </div>
                                     <div class="form-group col-lg-4">
                                        <label for="">SSL COMMERZ</label>
                                        <input type="radio" class="form-control" name="payment_type">
                                    </div>

                                     <div class="form-group col-lg-4">
                                        <label for="">Hand Cash</label>
                                        <input type="radio" class="form-control" name="payment_type">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group ml-3">
                                <button type="submit" class="btn btn-info">Order Place</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <label for="">Subtotal: {{ Cart::subtotal() }} {{ generalSetting()->currency }}</label>
                        <label for="">Coupon:</label>
                        <label for="">Tax:</label>
                    @if(!Session::has('coupon'))
                        <form action="{{ route('apply.coupon') }}" method="POST">
                            @csrf

                            <div class="p-4">
                                @if(Session::has('error'))
                                    <p class="alert alert-info">{{ Session::get('error') }}</p>
                                @endif
                                @if(Session::has('success'))
                                    <p class="alert alert-info">{{ Session::get('success') }}</p>
                                @endif
                                <label for="">Coupon Apply</label>
                                <input type="text" class="form-control" name="coupon" placeholder="Coupon Code">
                                @error('coupon')
                                <span class="text text-danger">{{ $message }}</span>
                                @enderror
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-info">Apply</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    </div>
                 
                </div>
		    </div> 
            
	    </div>

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



