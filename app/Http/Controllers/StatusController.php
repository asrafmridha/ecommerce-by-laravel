<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function featured($id)
    {
        $featured = Product::find($id);
        if ($featured->featured == "on") {
            $featured->featured = 'off';
        } else if ($featured->featured  == "off") {
            $featured->featured = 'on';
        } else {
            $featured->featured = 'on';
        }

        $featured->update();
        return back()->withSuccess('Featured Updated Successfully');
    }

    public function today_deal($id)
    {
        $today_deal = Product::find($id);
        if ($today_deal->today_deal == "on") {
            $today_deal->today_deal = 'off';
        } else if ($today_deal->today_deal  == "off") {
            $today_deal->today_deal = 'on';
        } else {
            $today_deal->today_deal = 'on';
        }

        $today_deal->update();
        return back()->withSuccess('Today Deal Updated Successfully');
    }

    public function status($id)
    {
        $status = Product::find($id);
        if ($status->status == "on") {
            $status->status = 'off';
        } else if ($status->status  == "off") {
            $status->status = 'on';
        } else {
            $status->status = 'on';
        }

        $status->update();
        return back()->withSuccess('status Updated Successfully');
    }
}
