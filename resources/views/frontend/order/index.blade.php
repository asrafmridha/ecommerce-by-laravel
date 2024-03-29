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
        <div class="row">    
            <div class="col-lg-5">
              <div class="card">
                @if(Session::has('error_id'))
                    <span class="btn btn-danger">{{ Session::get('error_id') }}</span>
                @endif
                <div class="card-body">
                    <h4>Order Tracking</h4>
                    <form action="{{ route('order.track') }}" method="POST">
                        @csrf
                        <input type="text" name="order_id" class="form-control" placeholder="Order id">
                            <button class="btn btn-primary mt-2"  type="submit">Track Now</button>
                
                    </form>
                </div>
              </div>
            </div>
        </div>
       
        <div class="row m-3">
            <div class="col-lg-3">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center text-success">Total Order</h5>
                            <div class="card-subtitle mb-2 text-muted text-center">{{ $total_orders }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Complete Order</h5>
                            <div class="card-subtitle mb-2 text-muted text-center">{{ $complete_orders }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Cancel Order</h5>
                            <div class="card-subtitle mb-2 text-muted text-center">{{ $cancel_orders }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Return Order</h5>
                            <div class="card-subtitle mb-2 text-muted text-center">{{ $return_orders }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#sl</th>
                <th scope="col">OrderId</th>
                <th scope="col">Date</th>
                <th scope="col">Total</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                       <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->order_id }}</td>
                        <td>{{ date('d F, Y') }}</td>
                        <td>{{ $item->total }} {{ generalSetting()->currency  }}</td>
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
                        <td>
                            <a class="btn btn-success" href="" title="view order"><i class="fa fa-eye"></i></a>
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



