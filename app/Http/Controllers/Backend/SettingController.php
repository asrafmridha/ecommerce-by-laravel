<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
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

    public function generalSetting_index()
    {
        $generalSettings = GeneralSetting::first();
        return view('backend.admin.generalSetting.index', compact('generalSettings'));
    }
}
