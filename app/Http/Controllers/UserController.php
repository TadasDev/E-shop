<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('login');

    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('profile.edit',compact('user'));
    }

    public function edit(Request $request): RedirectResponse
    {

        $user = Auth::user();
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->save();  // Update the data

        return redirect()->route('profile.edit')->with('message','your profile details have been updated');
    }


}

