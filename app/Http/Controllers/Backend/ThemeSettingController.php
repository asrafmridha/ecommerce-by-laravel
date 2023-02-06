<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ThemeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeSettingController extends Controller
{
    public function color()
    {
        $data = ThemeSetting::where('user_id', Auth::id())->first();
        if ($data == null) {

            $create_setting = new ThemeSetting();
            $create_setting->user_id = Auth::id();
            $create_setting->theme = 'dark-layout';
            $create_setting->nav   = 'expanded';
            $create_setting->save();
        } else {

            if ($data->theme == 'light-layout') {
                $data->theme = 'dark-layout';
            } else if ($data->theme == 'dark-layout') {
                $data->theme = 'light-layout';
            }

            $data->update();
        }

        die();
    }

    public function toggle()
    {
        $data = ThemeSetting::where('user_id', Auth::id())->first();
                 

        if ($data->nav == 'expanded') {
            $data->nav = 'collapsed';
        } else if ($data->nav == 'collapsed') {
            $data->nav = 'expanded';
        }

        $data->update();

        die();
    }
}
