<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('google_id', $user->id)->first();
     
            if($existingUser){
                Auth::login($existingUser);
                return redirect('/User/homeuser');
            }else{
                return redirect('/welcome');
            }
    
        } catch (\Throwable $th) {
          throw $th;
       }
    }
}
