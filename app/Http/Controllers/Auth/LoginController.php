<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
    $user = Socialite::driver('google')->user();

    // ตรวจสอบหรือสร้างผู้ใช้ในฐานข้อมูลของคุณ
    $existingUser = User::where('google_id', $user->getId())->first();

    if (!$existingUser) {
        $newUser = new User();
        $newUser->name = $user->getName();
        $newUser->email = $user->getEmail();
        $newUser->google_id = $user->getId();
        $newUser->save();

        Auth::login($newUser);

        return redirect()->intended('/');
    } else {
        Auth::login($existingUser);
        return redirect()->intended('/');
    }

}

}
