<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

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
}
