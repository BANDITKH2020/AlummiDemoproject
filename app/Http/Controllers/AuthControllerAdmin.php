<?php

namespace App\Http\Controllers;

use App\Models\newsandactivity;
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

        $user->firstname = 'admin';
        $user->lastname = 'admin';
        $user->email = $request->email;
        $user->student_id = 'admin';
        $user->student_grp = 'admin';
        $user->Token_id='123465';
        $user->google_id='-';
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

        return redirect()->route('welcome');
    }
    public function homeadmin()
    {   $newsandactivity=newsandactivity::paginate(3);
        return view('/Admin/homeadmin',compact('newsandactivity'));

    }
}


