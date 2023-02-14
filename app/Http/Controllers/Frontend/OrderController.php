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
        $order = array();
        // dd('hlw');
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
    }

    public function order_list()
    {

        $banner_product = Product::where('status', 'on')->latest()->first();
        $categorires = Category::all();
        $featured = Product::where('featured', 'on')->where('status', 'on')->orderBy('id', 'DESC')->limit(8)->get();
        $orders = DB::table('orders')->orderBy('id', 'DESC')->take(10)->get();
        return view('frontend.order.index', compact('categorires', 'banner_product', 'featured', 'orders'));
    }
}
