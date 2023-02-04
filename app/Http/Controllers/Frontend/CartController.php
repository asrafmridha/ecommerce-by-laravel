<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

use Cart;
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

        ]);
        return response()->json([
            'success' => "Add to Cart Successfully",
        ]);
    }
}
