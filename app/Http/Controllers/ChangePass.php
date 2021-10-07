<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
use Facade\FlareClient\View;
use Illuminate\Contracts\Session\Session;
use Image;

class ChangePass extends Controller
{
    public function ChangePassword()
    {

        return view('admin.dashboard.change_password');
    }

    public function UpdatePassword(Request $request)
    {

        $validated = $request->validate(
            [
                'current_password' => 'required',
                'password' => 'required|regex:/^.*(?=.{6,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#@_&*%]).*$/|confirmed',
            ],

        );

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $hashedPassword)) {

            $user = User::find(Auth::id());

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::logout();

            return redirect()->route('login')->with('success', 'Password is Changed Successfully');
        } else {

            return redirect()->back()->with('error', 'Current Password is Invalid');
        }
    }

    public function ProfileUpdate()
    {
        if (Auth::user()) {

            $user = User::find(Auth::user()->id);

            if ($user) {
                return view('admin.dashboard.update_profile', compact('user'));
            }
        }
    }

    public function UpdateUserProfile(Request $request)
    {

        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
            ],

        );

        $user = User::find(Auth::user()->id);

        if ($user) {

            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();

            return redirect()->back()->with('success', 'Profile has been Updated Successfully');
        } else {

            return redirect()->back();
        }
    }


    public function UpdateUserPicture(Request $request)
    {

        $validated = $request->validate(
            [
                'profile_photo' => 'required|mimes:jpg,jpeg,png',

            ]
        );

        $old_image = Auth::user()->profile_photo_path;

        $profile_pic = $request->file('profile_photo');

        if ($profile_pic) {

            $name_gen = hexdec(uniqid()) . '.' . $profile_pic->getClientOriginalExtension();
            Image::make($profile_pic)->resize(500, 400)->save('storage/profile-photos/' . $name_gen);

            $last_img = 'storage/profile-photos/' . $name_gen;

            unlink($old_image);

            $img = User::find(Auth::user()->id);

            if ($img) {

                $img->profile_photo_path = $last_img;

                $img->save();

                return redirect()->back()->with('success', 'Profile has been Updated Successfully');
            } else {

                return redirect()->back();
            }
        }
    }
}
