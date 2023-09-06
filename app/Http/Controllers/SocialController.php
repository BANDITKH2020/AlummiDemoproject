<?php
namespace App\Http\Controllers;
use App\Models\randomcode;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use Illuminate\Support\Facades\Session;
use Exception;
use Auth;
class SocialController extends Controller
{   
   
    
    public function register()
    {
        return view('users.register');
    }
    public function inputgoogle(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $student_id = $request->input('student_id');
        $student_grp = $request->input('student_grp');
        $token_id = $request->input('token_id');
        Session::flush();
        session()->put('firstname', $firstname);
        session()->put('lastname', $lastname);
        session()->put('student_id', $student_id);
        session()->put('student_grp', $student_grp);
        session()->put('token_id', $token_id);
       // session()->save();
      //  session()->keep(['firstname', 'lastname', 'student_id', 'student_grp', 'token']);*/
        //dd($request);
     //   Session::put('login_data', $request->all());
       // SocialController::googleRedirect();
        return redirect('auth/google');
    }
    public function googleRedirect()
    {   
        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {        
       try {
            $user = Socialite::driver('google')->user();
            $id = $user->getId();
            $name = $user->getName();
            $email = $user->getEmail();
            $firstname = session('firstname');
            $lastname = session('lastname');
            $student_id = session('student_id');
            $student_grp = session('student_grp');
            $token_id = session('token_id');
            $existing = User::where('google_id', $id)->first();
            $otherUser = randomcode::where('code', $token_id)->first();
            if ($existing) {
                Auth::login($existing);
                return redirect('/users/homeuser');
            } else {
                $emailteacher = User::where('email', $email)->first();
                if($emailteacher){
                    $emailteacher->update([
                        'google_id' => $id,
                    ]);
                    Auth::login($emailteacher);
                    return redirect('/users/hometeacher')->with('alert','ลงทะเบียนเสร็จสิ้น');
                }
                elseif ($firstname&&$lastname&&$student_id&&$student_grp&&$token_id === null) {
                    return redirect('/')->with('error','กรุณาลงทะเบียนให้ถูกต้อง');
                }else{
                    if ($otherUser && $token_id === $otherUser->code) {
                        $otherUserId = $otherUser->user_id;
                        $user = User::find($otherUserId);
                        $name =  $user->firstname;
                        $createUser = User::create([
                        'firstname' => $firstname,
                        'lastname'=> $lastname,
                        'student_id'=> $student_id,
                        'student_grp'=>  $student_grp,
                        'inviteby'=> $name,
                        'email' => $email,
                        'google_id' => $id,
                        'role_acc' => 'student',
                        'groupleader'=> 'null',
                        'graduatesem'=> Carbon::now()->year + 543,
                        'educational_status'=>'กำลังศึกษา',
                        ]);
                        
                        Auth::login($createUser);
                        return redirect('/users/homeuser')->with('alert','ลงทะเบียนเสร็จสิ้น');
                    }else {
                        Session::flush();
                        return redirect()->back()->with('error', 'รหัสอาจาย์ไม่ถูกต้อง');
                    }

                }
                
            }
            
        } catch (\Throwable $th) {
                return redirect()->back()->with('alert', 'เกิดข้อผิดพลาดในการเข้าสู่ระบบ');
        }
        
    }

}
