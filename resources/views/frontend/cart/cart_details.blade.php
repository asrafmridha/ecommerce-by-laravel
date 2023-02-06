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
                    <div class="col-lg-10 offset-lg-1">
                        <div class="cart_container">
                            <div class="cart_title">Shopping Cart</div>
                            <div class="cart_items">
                            
                                <ul class="cart_list">
                                @foreach($cartDetails as $details)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset('uploads/product/'.$details->options->thumbnails) }}" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $details->name }}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Color</div>
                                                <div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">1</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">{{ $details->qty }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">$2000</div>
                                            </div>
                                              <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div>
                                                <div class="cart_item_text"><a href="{{ route('cart.remove',$details->rowId) }}">X</a></div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            
                            </div>

                            @php
                                
                            @endphp
                            
                            <!-- Order Total -->
                       
                            <div class="order_total">
                                <div class="order_total_content text-md-right">
                                    <div class="order_total_title">Order Total:</div>
                                    <div class="order_total_amount">{{ Cart::total() }}</div>
                                </div>
                            </div>
                            @if(Cart::total()!=0)
                            <a class="btn btn-info" href="">Checkout</a>
                            @endif
                        </div>
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



