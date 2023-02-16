<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentGateWayController extends Controller
{
    public function index()
    {
        $amarpay = DB::table('payment_gateways')->first();
        $surjopay = DB::table('payment_gateways')->skip(1)->first();
        $sslcommerz = DB::table('payment_gateways')->skip(2)->first();

        return view('backend.payment_gateway.index', compact('amarpay', 'surjopay', 'sslcommerz'));
    }

    public function amarpay_update(Request $request, $id)
    {
        $data = [];
        $data['gateway_name']       = $request->amarpay_gateway_name;
        $data['store_id']           = $request->amarpay_store_id;
        PaymentGateway::find($id)->update($data);
        return back()->withSuccess("Updated Successfully");
    }
}
