<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

use Cart;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart(Request $request)
    {

        $product = Product::where('id', $request->id)->first();
        Cart::add([
            'id'    => $product->id,
            'name'  => $product->name,
            'qty'   => 1,
            'price' => $product->selling_price,
            'weight' => 1,
            'options' => ['thumnails' => $product->thumbnails],

        ]);
        return back()->withSuccess("Added Cart Successfully");
    }

    public function allcart()
    {
        $data = array();
        $data['cart_qty']   = Cart::count();
        $data['cart_total'] = Cart::total();
        return response()->json($data);
    }

    public function cartDetails()
    {
        $banner_product = Product::where('status', 'on')->latest()->first();
        $categorires = Category::all();
        $featured = Product::where('featured', 'on')->where('status', 'on')->orderBy('id', 'DESC')->limit(8)->get();
        $cartDetails = Cart::content();
        // return response()->json($cartDetails);
        return view('frontend.cart.cart_details', compact('categorires', 'cartDetails'));
    }
}
