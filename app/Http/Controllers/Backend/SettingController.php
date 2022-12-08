<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoTable;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $seo = SeoTable::first();
        return view('backend.admin.setting.seo.edit', compact('seo'));
    }

    public function  update(Request $request, $id)
    {
        SeoTable::find($id)->update($request->except('_token'));
        return back()->withSuccess('Seo Updated Successfully');
    }
}
