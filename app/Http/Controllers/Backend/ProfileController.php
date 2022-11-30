<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function myprofile()
    {
        return view('backend.admin.myprofile.profile');
    }

    public function profile_update(Request $request, $id)
    {

        $request->validate([
            'image' => 'required|image',

        ]);

        // $data = User::where('id', $id);
        $data = User::find($id);
        if ($data->image == null) {

            $image = $request->image;
            $filename = time() . '.' . $image->extension();
            $location = public_path('uploads/user/');
            $image->move($location, $filename);
            $data->image = $filename;
            $data->save();
            return back()->withSuccess('Profile picture upload Successfully');
        } else {
            if ($image = $request->image) {
                $filename = time() . '.' . $image->extension();
                $location = public_path('uploads/user/');
                $image->move($location, $filename);
                $data->image = $filename;
            }
            $data->update();
            return back()->withSuccess('Profile picture updated Successfully');
        }
    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'email' => 'required|email'
        ]);

        $data = User::find($id);
        if ($data->phone == null || $data->about == null) {
            $data->phone = $request->phone;
            $data->about = $request->about;
            $data->save();
            return back()->withSuccess(' saved Successfully');
        } else {
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->about = $request->about;
            $data->email = $request->email;
            $data->update();
            return back()->withSuccess(' updated Successfully');
        }
    }

    public function reset_password(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}
