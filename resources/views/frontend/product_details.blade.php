{{-- @php
	$dataArr = is_array($single_product->images) ? $dataArr : array($single_product->images);
	foreach ($dataArr as  $value) {
		$a[]=$value;
	}
	dd($a);
@endphp --}}

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet') }}" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/product_responsive.css') }}">


</head>

<body>

<div class="super_container">
	
	<!-- Header -->
   @include('frontend.include.header')

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">
				<!-- Images -->
				<div class="col-lg-1">
					<ul class="image_list">
						@php
						  $images=json_decode($single_product->images,true);
						  $colors=json_decode($single_product->color,true);	
		
						  $sizes=json_decode($single_product->size,true);	
						@endphp
						@foreach($images as $image)
						
                         <li data-image="images/single_4.jpg"><img src="{{ asset('uploads/product/'.$image) }}" alt=""></li>
						 @endforeach
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-4 order-lg-2">
					<div class="image_selected">
						<img src="{{ asset('uploads/product/'.$single_product->thumbnails) }}" alt="product Image"></div>
				</div>

				<!-- Description -->
				<div class="col-lg-3 order-3">
					<div class="product_description">
						<div class="product_category">{{ $single_product->category->category_name }} > {{ $single_product->subcategory->sub_category_name }} </div>
						<div class="product_name">{{ $single_product->name }}</div>
						<div class="">Brand: {{ $single_product->brand->brand_name }} </div>
						<div class="">Stock: {{ $single_product->stock_quantity }} </div>
						<div class="">Unit: {{ $single_product->unit }} </div>

						<div>

							<i class="fa-regular fa-star"></i>
							<i class="fa-regular fa-star"></i>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
						</div>
						{{-- <div class="product_text"><p>{{ $single_product->description }}</p></div> --}}
						<div class="order_info d-flex flex-row">
							<form action="#">
								<div class="clearfix" style="z-index: 1000;">

									<div class="form-group">
										<div class="row">
										@isset($single_product->size)
							
											<div class="col-lg-6">
												<label for="">Size</label>
												<select name="size" id="" class="form-control form-control-sm" style="min-width: 100px">
													@foreach ($sizes as $size)
													<option value="">{{ $size }}</option>
													@endforeach
												</select>
											</div>
										@endisset
										@isset($single_product->color)	
											<div class="col-lg-6">
												<label for="">Color</label>
												<select name="size" id="" class="form-control form-control-sm"
												style="min-width: 100px">
													@foreach($colors as $color)
													<option value="">{{ $color }}</option>
													@endforeach
												</select>
											</div>
										@endisset	
										</div>
									</div>

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[1-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									{{-- <ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul> --}}

								</div>

								<div class="product_price">$2000</div>
								<div class="button_container">
									<button type="button" class="button cart_button">Add to Cart</button>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
							</form>
						</div>
					</div>
				</div>	

				<div class="col-lg-2 order-9">
					<strong class="text-muted">Pickup POint Of This Product</strong> <br>
					<i class="fa fa-map">{{ $single_product->pickuppoint->pickup_point_address }}</i>
				</div>
			</div>
		</div>
	</div> <br> <br>

	<div class="row">
		<div class="col-lg-12">
			<div class="card card-header">
				<div class="  offset-5">
					<h4>Product Details of : {{ $single_product->name }}</h4>
				</div>
				<div class="card-body offset-5">
					{{ $single_product->description }}
				</div>
			</div>
		</div>
	</div>

	<div class="row m-2">
	    
			<div class="col-6 offset-1 mt-2 card">
				<strong class="h4">Rating and Review of: </strong>
			</div>
		<form action="{{ route('review.store') }}" method="POST">
				@csrf
			<div class="col-6 offset-1">
				<div class="form-group">
					@if(Session::has('success'))
					 	<p class="alert alert-info">{{ Session::get('success') }}</p>
					@endif
					<label for="details">Write Your Review</label>
					<textarea name="review" id="" cols="30" rows="5"></textarea>
					@error('review')
						<div class="alert alert-danger">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                            </div>
					@enderror
				</div>
					<input type="hidden" value="{{ $single_product->id }}" name="product_id">
				<div class="form-group col-3">
					<label for="">Select Your Review</label>
					<select name="rating" id="" class="form-control" style="min-width: 150px">
						<option value="1">1 Star</option>
						<option value="2">2 Star</option>
						<option value="3">3 Star</option>
						<option value="4">4 Star</option>
						<option value="5">5 Star</option>	
					</select>
						@error('rating')
							<div class="alert alert-danger">
                                <div class="alert-body">
                                    {{ $message }}
                                </div>
                            </div>
						@enderror
						@if (Auth::check())
							<button type="submit" class="btn btn-primary
								mt-2">Submit</button>
							@else
							<p>Please Login First For Review Product</p>
						@endif
					</div>
			</div>
		</form>	
	</div>

	{{-- all Review of This Product --}}
       <strong class="text-center offset-5 mt-5 mb-5">All Review OF : {{ $single_product->name }}</strong>
	   
	<div class="row">
		@foreach ($reviews as $review)
	
		<div class="col-lg-4 card offset-1">
			<div class="card-header">
				{{ $review->user->name }} ({{ date('d F, Y'), strtotime($review->created_at) }})
			</div>
			<div class="card-body">
				{{ $review->review }} 
				<div>
					<i class="fa-solid fa-star"></i>
				</div>
			</div>
		</div>
		@endforeach
		
	</div>



	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Related Product</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							@foreach ($related_products as $item)
								
							
							<!-- Recently Viewed Item -->
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image">
										<img src="{{ asset('uploads/product/'.$item->thumbnails) }}" alt="{{ $item->name }}"></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">{{ $item->selling_price }}</div>
										<div class="viewed_name"><a href="#">{{ $item->name }}</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
							@endforeach
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">OneTech</a></div>
						</div>
						<div class="footer_title">Got Question? Call Us 24/7</div>
						<div class="footer_phone">+38 068 005 3570</div>
						<div class="footer_contact_text">
							<p>17 Princess Road, London</p>
							<p>Grester London NW18JR, UK</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Find it Fast</div>
						<ul class="footer_list">
							<li><a href="#">Computers & Laptops</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Smartphones & Tablets</a></li>
							<li><a href="#">TV & Audio</a></li>
						</ul>
						<div class="footer_subtitle">Gadgets</div>
						<ul class="footer_list">
							<li><a href="#">Car Electronics</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="#">Video Games & Consoles</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Cameras & Photos</a></li>
							<li><a href="#">Hardware</a></li>
							<li><a href="#">Computers & Laptops</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Customer Care</div>
						<ul class="footer_list">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order Tracking</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">Returns / Exchange</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Product Support</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
<script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
<script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
<script src="{{ asset('frontend/js/product_custom.js') }}"></script>
</body>

</html>