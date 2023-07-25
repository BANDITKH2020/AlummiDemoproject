<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function userregister()
    {
        return view('userregister');
    }

    public function userregisterPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function userlogin()
    {
        return view('userlogin');
    }

    public function userloginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/home')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function userlogout()
    {
        Auth::logout();

        return redirect()->route('userlogin');
    }
}
