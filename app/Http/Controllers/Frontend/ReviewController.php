<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'rating' => 'required',
        ]);
        $review = new Review();
        $review->user_id    = Auth::id();
        $review->product_id = $request->product_id;
        $review->review     = $request->review;
        $review->rating     = $request->rating;
        $review->save();
        return back()->withSuccess('Thank You For Your Review');
    }
}
