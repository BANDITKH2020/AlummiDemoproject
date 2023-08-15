<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Validator;

use Exception;
use Auth;
class SocialController extends Controller
{   
    public function login()
    {
        return view('users.login');
    }
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function loginWithGoogle()
    {
        try {
    
            $user = Socialite::driver('google')->stateless()->user();
            $existingUser = User::where('google_id', $user->id)->first();
     //เขียนส่วนนี้
            if($existingUser){
                Auth::login($existingUser);
                return redirect('/users/homeuser');
            }else{
                $createUser = User::create([
                    'firstname' =>$user->name,
                    'lastname' =>'null',
                    'student_id' =>'null',
                    'student_grp' =>'null',
                    'token_id' =>'null',
                    'email' => $user->email,
                    'google_id' => $user->id,
                    // 'password' => encrypt('admin@123')
                ]);
    
                Auth::login($createUser);
                return redirect('/users/homeuser');
            }
    
        } catch (\Throwable $th) {
          throw $th;
       }
    }
}