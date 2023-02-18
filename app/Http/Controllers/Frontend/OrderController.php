<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function order_place(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            'country'   => 'required',
            'address'   => 'required',
            'email'     => 'required|email',
            'zip'       => 'required',
        ]);
        // dd($request->all());
        if ($request->payment_type == 'Hand Cash') {
            $order = array();
            $order['user_id']     = Auth::user()->id;
            $order['c_name']     = $request->name;
            $order['c_phone']     = $request->phone;
            $order['c_email']    = $request->email;
            $order['c_country']   = $request->country;
            $order['c_zipcode']  = $request->zip;
            $order['c_address']  = $request->address;
            $order['payment_type'] = $request->payment_type;
            if (Session::has('coupon')) {
                $order['total']           = Cart::total();
                $order['coupon_code']     = Session::get('coupon')['name'];
                $order['coupon_discount'] = Session::get('coupon')['discount'];
                $order['after_discount']  = Session::get('coupon')['after_discount'];
                $order['subtotal']        =    Cart::subtotal();
            } else {
                $order['subtotal']       =    Cart::subtotal();
                $order['total']           =    Cart::total();
            }
            $order['order_id'] = rand(00001, 9000000);
            $order['date'] = date('d-m-Y');
            $order['month'] = date('F');
            $order['year'] = date('Y');
            // insertGetId for get id when data save
            $order_id = Order::insertGetId($order);

            Mail::to($request->email)->send(new InvoiceMail($order));

            $contents = Cart::content();


            $order_details = new Order_detail();
            foreach ($contents as $content) {
                $order_details->order_id = $order_id;
                $order_details->product_id = $content->id;
                $order_details->product_name = $content->name;
                $order_details->quantity = $content->qty;
                $order_details->single_price = $content->price;
                $order_details->subtotal_price = $content->price * $content->qty;
                $order_details->save();
            }
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            return redirect()->route('home')->withSuccess('Order Placed Successfully');
            // Amarpay Payment Gateway
        } elseif ($request->payment_type == 'AmarPay') {
            $amarpay = DB::table('payment_gateways')->first();
            if ($amarpay->store_id == null) {
                return back()->with('error', 'Please Set Your Id First');
            } else {
                if ($amarpay->status == 1) {

                    $url = 'https://secure.aamarpay.com/request.php';
                } else {

                    $url = 'https://sandbox.aamarpay.com/request.php';
                }

                // live url https://secure.aamarpay.com/request.php
                $fields = array(
                    'store_id' => $amarpay->store_id, //store id will be aamarpay,  contact integration@aamarpay.com for test/live id
                    'amount' => Cart::total(), //transaction amount
                    'payment_type' => 'VISA', //no need to change
                    'currency' => 'BDT',  //currenct will be USD/BDT
                    'tran_id' => rand(1111111, 9999999), //transaction id must be unique from your end
                    'cus_name' => $request->name,  //customer name
                    'cus_email' => $request->email, //customer email address
                    'cus_add1' => $request->address,  //customer address
                    'cus_add2' => 'Mohakhali DOHS', //customer address
                    'cus_city' => 'Dhaka',  //customer city
                    'cus_state' => 'Dhaka',  //state
                    'cus_postcode' => '1206', //postcode or zipcode
                    'cus_country' => $request->country,  //country
                    'cus_phone' => $request->phone, //customer phone number
                    'cus_fax' => 'Not¬Applicable',  //fax
                    'ship_name' => 'ship name', //ship name
                    'ship_add1' => 'House B-121, Road 21',  //ship address
                    'ship_add2' => 'Mohakhali',
                    'ship_city' => 'Dhaka',
                    'ship_state' => 'Dhaka',
                    'ship_postcode' => '1212',
                    'ship_country' => 'Bangladesh',
                    'desc' => 'payment description',
                    'success_url' => route('success'), //your success route
                    'fail_url' => route('fail'), //your fail route
                    'cancel_url' => 'http://localhost/foldername/cancel.php', //your cancel url
                    'opt_a' => $request->country,  //optional paramter
                    'opt_b' => $request->city,
                    'opt_c' => $request->phone,
                    'opt_d' => $request->address,
                    'signature_key' => $amarpay->signature_key
                ); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

                $fields_string = http_build_query($fields);

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_VERBOSE, true);
                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));
                curl_close($ch);

                $this->redirect_to_merchant($url_forward);
            }
        }
    }

    function redirect_to_merchant($url)
    {

?>
        <html xmlns="http://www.w3.org/1999/xhtml">

        <head>
            <script type="text/javascript">
                function closethisasap() {
                    document.forms["redirectpost"].submit();
                }
            </script>
        </head>

        <body onLoad="closethisasap();">

            <form name="redirectpost" method="post" action="<?php echo 'https://sandbox.aamarpay.com/' . $url; ?>"></form>
            <!-- for live url https://secure.aamarpay.com -->
        </body>

        </html>
<?php
        exit;
    }

    public function success(Request $request)
    {
        $order = array();
        $order['user_id']     = Auth::user()->id;
        $order['c_name']     = $request->cus_name;
        $order['c_phone']     = $request->opt_c;
        $order['c_email']    = $request->cus_email;
        $order['c_country']   = $request->opt_a;
        // $order['c_zipcode']  = $request->zip;
        $order['c_address']  = $request->opt_d;
        // $order['payment_type'] = $request->payment_type;
        if (Session::has('coupon')) {
            $order['total']           = Cart::total();
            $order['coupon_code']     = Session::get('coupon')['name'];
            $order['coupon_discount'] = Session::get('coupon')['discount'];
            $order['after_discount']  = Session::get('coupon')['after_discount'];
            $order['subtotal']        =    Cart::subtotal();
        } else {
            $order['subtotal']       =    Cart::subtotal();
            $order['total']           =    Cart::total();
        }
        $order['order_id'] = rand(00001, 9000000);
        $order['date'] = date('d-m-Y');
        $order['month'] = date('F');
        $order['year'] = date('Y');
        // insertGetId for get id when data save
        $order_id = Order::insertGetId($order);

        Mail::to(Auth::user()->email)->send(new InvoiceMail($order));

        $contents = Cart::content();


        $order_details = new Order_detail();
        foreach ($contents as $content) {
            $order_details->order_id = $order_id;
            $order_details->product_id = $content->id;
            $order_details->product_name = $content->name;
            $order_details->quantity = $content->qty;
            $order_details->single_price = $content->price;
            $order_details->subtotal_price = $content->price * $content->qty;
            $order_details->save();
        }
        Cart::destroy();
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        return redirect()->route('home')->withSuccess('Order Placed Successfully');

        return $request;
    }

    public function fail(Request $request)
    {
        return $request;
    }

    public function order_list()
    {

        $banner_product = Product::where('status', 'on')->latest()->first();
        $categorires = Category::all();
        $featured = Product::where('featured', 'on')->where('status', 'on')->orderBy('id', 'DESC')->limit(8)->get();
        $orders = DB::table('orders')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->take(10)->get();
        $total_orders = DB::table('orders')->where('user_id', Auth::user()->id)->count();
        $complete_orders = DB::table('orders')->where('user_id', Auth::user()->id)->where('status', 3)->count();
        $return_orders = DB::table('orders')->where('user_id', Auth::user()->id)->where('status', 4)->count();
        $cancel_orders = DB::table('orders')->where('user_id', Auth::user()->id)->where('status', 5)->count();
        return view('frontend.order.index', compact('categorires', 'banner_product', 'featured', 'orders', 'total_orders', 'complete_orders', 'return_orders', 'cancel_orders'));
    }

    public function order_track(Request $request)
    {
        $check = DB::table('orders')->where('order_id', $request->order_id)->first();
        if (!$check) {
            return back()->with('error_id', 'Invalid Product Id');
        } else {
            $categorires = Category::all();
            $order_details = Order_detail::where('id', $check->id)->get();
            return view('frontend.order.track_result', compact('categorires', 'order_details', 'check'));
        }
    }

    //For admin
    public function order_list_admin()
    {
        $orders = Order::all();
        return view('backend.customerOrder.index',compact('orders'));
    }
}
