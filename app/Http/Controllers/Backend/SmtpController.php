<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Smtp;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function index()
    {
        $smtp = Smtp::first();
        return view('backend.admin.smtp.edit', compact('smtp'));
    }

    public function  update(Request $request, $id)
    {
        Smtp::find($id)->update($request->except('_token'));
        return back()->withSuccess('Smptp Updated Successfully');
    }
}
