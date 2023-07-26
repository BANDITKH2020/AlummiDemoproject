<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthControllerAdmin extends Controller
{
    public function adminregister()
    {
        return view('adminregister');
    }

    public function adminregisterPost(Request $request)
    {
        $user = new User();

        $user->firstname = 'null';
        $user->lastname = 'null';
        $user->email = $request->email;
        $user->graduatesem = 'null';
        $user->student_grp = 'null';
        $user->google_id = 'null';
        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function adminlogin()
    {
        return view('adminlogin');
    }

    public function adminloginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credetials)) {
            return redirect('/Admin/homeadmin')->with('success', 'Login Success');
        }

        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('adminlogin');
    }
    public function homeadmin()
    {
        return view('/Admin/homeadmin');
    }
}


