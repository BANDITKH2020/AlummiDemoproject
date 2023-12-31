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
        $recaptcha = $request->input('g-recaptcha-response');
        
        session()->put('firstname', $firstname);
        session()->put('lastname', $lastname);
        session()->put('student_id', $student_id);
        session()->put('student_grp', $student_grp);
        session()->put('token_id', $token_id);
        session()->put('recaptcha', $recaptcha);
        $student_id = User::where('student_id', $student_id)->first();
        if ($student_id) {
            Session::flush();
            return redirect()->back()->with('error','กรุณากรอกรหัสนักศึกษาให้ถูกต้อง');
        }
        if (!$recaptcha) {
            return redirect()->back()->with('error', 'กรุณาตอบคำถาม reCAPTCHA');
        }
        // ตรวจสอบคำตอบของ reCAPTCHA ด้วย Google reCAPTCHA API
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
            $recaptcha = session('recaptcha');
            $existing = User::where('google_id', $id)->first();
            $otherUser = randomcode::where('code', $token_id)->first();
            $nowDate = Carbon::now();
            $formattedDate = $nowDate->format('Y-m-d H:i:s');
            $emailteacher = User::where('email', $email)->where('role_acc','teacher')->first();
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LebpBooAAAAAGKjwxVakaAsE64472muJOpCQMm9&response={$recaptcha}");
            $responseKeys = json_decode($response, true);
            if ($existing) { 
                if ($existing->active === 1) {//ตรวจสอบสถานะบัญชี
                    if ($existing->role_acc === 'student') {//ตรวจสอบrole ผู้ใช้
                        Auth::login($existing);
                        return redirect('/users/homeuser');
                    }else{
                        Auth::login($existing);
                        return redirect('/users/hometeacher');
                    }
                }
                else{
                    return redirect('/')->with('error','กรุณาใช้บัญชีที่ลงทะเบียนในการเข้าสู่ระบบ');
                }
            }
            elseif ($emailteacher) {
                $emailteacher->update([
                    'google_id' => $id,
                ]);
                Auth::login($emailteacher);
                return redirect('/users/hometeacher')->with('alert','ลงทะเบียนเสร็จสิ้น');
            }
            elseif ($token_id === null) {
                return redirect('/')->with('error','คุณยังไม่ได้ลงทะเบียน กรุณาสมัครสมาชิก');
            }
            elseif (intval($responseKeys["success"]) === 0) {
                return redirect()->back()->with('error', 'reCAPTCHA ไม่ถูกต้อง');
            }
            else{
                
                if (intval($responseKeys["success"]) === 1) { //ตรวจสอบ recapcha
                    
                    if ($otherUser && $token_id === $otherUser->code ) {
                        
                        if ($otherUser && ($otherUser->end_date < $formattedDate) ) {
                            
                            Session::flush();
                            return redirect()->back()->with('error', 'รหัสอาจาย์หมดอายุ');
                        }else{
                            
                            $otherUserId = $otherUser->user_id;
                            $user = User::find($otherUserId);
                            if ($user == null) {
                            return redirect()->back()->with('error', 'รหัสนี้ไม่สามารถใช้งานได้ กรุณาเปลี่ยนรหัสใหม่');
                            }else{
                                $name =  $user->firstname . " ". $user->lastname;
                                $createUser = User::create([
                                'firstname' => $firstname,
                                'lastname'=> $lastname,
                                'student_id'=> $student_id,
                                'student_grp'=>  $student_grp,
                                'inviteby'=> $name,
                                'email' => $email,
                                'google_id' => $id,
                                'role_acc' => 'student',
                                'groupleader'=> 'ไม่เป็นหัวหน้า',
                                'graduatesem'=> Carbon::now()->year + 543,
                                'Term'=> '-',
                                'educational_status'=>'กำลังศึกษา',
                                ]);
                                
                                Auth::login($createUser);
                                return redirect('/users/homeuser')->with('alert','ลงทะเบียนเสร็จสิ้น');
                            }
                            
                        }
                    }else {
                        Session::flush();
                        return redirect()->back()->with('error', 'รหัสอาจาย์ไม่ถูกต้อง');
                    }
                }

            }
            
        } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการเข้าสู่ระบบ');
        }
        
    }

}
