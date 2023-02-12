<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Subtotal;
use Session;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout()
    {
        $banner_product = Product::where('status', 'on')->latest()->first();
        $categorires = Category::all();
        $featured = Product::where('featured', 'on')->where('status', 'on')->orderBy('id', 'DESC')->limit(8)->get();
        $cartDetails = Cart::content();
        // return response()->json($cartDetails);
        return view('frontend.checkout.index', compact('categorires', 'cartDetails'));
    }

    public function apply_coupon(Request $request)
    {
        $request->validate([

            'coupon' => 'required',
        ]);

        // dd((int)Cart::subtotal());



        $check = Cupon::where('cupon_code', $request->coupon)->first();
        if ($check) {
            // if (date('Y-m-d', strtotime(date('Y-m-d'))) <= date('Y-m-d', strtotime($check->valid_date))) {
            //     echo 'done';
            // } else {
            //     echo 'old Coupon';
            // }
            // dd(Carbon::now()->format('Y-m-d'));

            if (Carbon::now()->format('Y-m-d') <= date('Y-m-d', strtotime($check->valid_date))) {
                session::put('coupon', [
                    'name'              => $check->cupon_code,
                    'discount'          => $check->cupon_amount,
                    'after_discount'    => Cart::subtotal() - $check->cupon_amount,
                ]);
                return back();
            } else {
                return back()->with('error', 'Date Expired!');
            }
        } else {
            return back()->with('error', 'Invalid Coupon!');
        }
    }

    public function coupon_remove()
    {
        session::forget('coupon');
        return back();
    }
}
