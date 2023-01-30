<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $banner_product = Product::where('status', 'on')->latest()->first();
        $categorires = Category::all();
        return view('frontend.home', compact('categorires', 'banner_product'));
    }
}
