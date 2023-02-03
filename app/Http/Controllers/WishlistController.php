<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    public function wishlist($id)
    {

        if (Auth::check()) {
            $check = DB::table('wishlists')->where('product_id', $id)->where('user_id', Auth::id())->first();
            if ($check) {
                return back()->with('error', 'Product Alreay in Wishlist');
            } else {
                $wishlist = new Wishlist();
                $wishlist->user_id      = Auth::user()->id;
                $wishlist->product_id   = $id;
                $wishlist->save();
                return back()->with('message', 'Product Add in Wishlist');
            }
        } else {
            return back()->with('error', 'Please Login First');
        }
    }
}
