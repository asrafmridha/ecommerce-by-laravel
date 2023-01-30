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

    public function generalSetting_update(Request $request, $id)
    {


        // dd($request->all());
        // Form Validation
        $request->validate([
            'logo'              => 'image',
            'favicon'           => 'image',

            'phone'             => 'required',
            'address'           => 'required',
            'email'             => 'required|email',
            'currency'          => 'required',
            'meta_title'        => 'required',
            'meta_description'  => 'required',
            'meta_keywords'     => 'required',
            'footer_description' => 'required',
            'alter_phone'       =>  'required',
            'alter_email'       =>  'required|email',
            'copyright_text'    =>   'required',
            'email_image'       =>  'image',
            'location_image'    =>   'image',
            'phone_image'       =>   'image',
            'company_name'      =>   'required',
        ]);

        $generalSetting = GeneralSetting::find($id);
        //  Logo
        if ($request->hasFile('logo')) {

            $logo = $request->file('logo');
            $filename = 'logo.' . $logo->extension('logo');
            $location = public_path('uploads/generalSettings/');
            $logo->move($location, $filename);

            $generalSetting->logo = $filename;
        }

        //  Favicon
        if ($request->hasFile('favicon')) {

            $favicon = $request->file('favicon');
            $favicon_filename = 'favicon.' . $favicon->extension('favicon');
            $favicon_location = public_path('uploads/generalSettings/');
            $favicon->move($favicon_location, $favicon_filename);

            $generalSetting->favicon = $favicon_filename;
        }

        //location image
        if ($request->hasFile('location_image')) {
            if ($image = $request->location_image) {
                $filename   = time() . '.' . $image->getClientOriginalExtension();
                $location   = public_path('uploads/generalSettings/');
                $image->move($location, $filename);
                $generalSetting->location_image = $filename;
            }
        }
        //Phone image
        if ($request->hasFile('phone_image')) {
            if ($image = $request->phone_image) {
                $filename   = time() . '.' . $image->getClientOriginalExtension();
                $location   = public_path('uploads/generalSettings/');
                $image->move($location, $filename);
                $generalSetting->phone_image = $filename;
            }
        }
        //Email image

        if ($request->hasFile('email_image')) {
            if ($image = $request->email_image) {
                $filename   = time() . '.' . $image->getClientOriginalExtension();
                $location   = public_path('uploads/generalSettings/');
                $image->move($location, $filename);
                $generalSetting->email_image = $filename;
            }
        }
        $generalSetting->currency           = $request->currency;
        $generalSetting->email              = $request->email;
        $generalSetting->phone              = $request->phone;
        $generalSetting->address            = $request->address;
        $generalSetting->meta_title         = $request->meta_title;
        $generalSetting->meta_description   = $request->meta_description;
        $generalSetting->meta_keywords      = $request->meta_keywords;
        $generalSetting->footer_description = $request->footer_description;
        $generalSetting->copyright_text     = $request->copyright_text;
        $generalSetting->alter_email        = $request->alter_email;
        $generalSetting->alter_phone        =  $request->alter_phone;
        $generalSetting->company_name       =  $request->company_name;
        $generalSetting->update();

        return back()->withSuccess('Updated Successfully');
    }
}
