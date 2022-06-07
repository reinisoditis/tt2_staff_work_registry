<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view("profile", ['user' => $user]);
    }

    public function update(UpdateProfileRequest $request)
    {
        auth()->user()->update($request->only('name', 'email'));

        if ($request->input('password')) {
            auth()->user()->update([
                'password' => bcrypt($request->input('password'))
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profile saved successfully');
    }

    public function update_avatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/images/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar=$filename;
            $user->save();

            return redirect()->route('profile');
        }
    }
}
