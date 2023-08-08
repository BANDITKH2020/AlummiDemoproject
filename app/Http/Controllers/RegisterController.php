<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    public function registergoogleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function registerWithGoogle()
    {
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('google_id', $user->id)->first();
     
            if($existingUser){
                
                return redirect('/welcome');
            }else{
                $createUser = User::create([
                    'firstname' =>'null',
                    'lastname' =>'null',
                    'student_id' =>'null',
                    'student_grp' =>'null',
                    'token_id' =>'null',
                    'email' => $user->email,
                    'google_id' => $user->id,
                    // 'password' => encrypt('admin@123')
                ]);
    
                Auth::login($createUser);
                return redirect('/User/homeuser');
            }
    
        } catch (\Throwable $th) {
          throw $th;
       }
    }
}
