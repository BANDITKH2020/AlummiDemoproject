<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RMUTT_Alumni;
use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterAdminController extends Controller
{
    public function registerAdmin()
    {
        return view('Admin.registerAdmin');
    }
    public function addAdmin(Request $request)
    {
        $request->validate(
            [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname'=> $request->lastname,
            'student_id'=> 'Admin',
            'student_grp'=> 'Admin',
            'graduatesem'=> 'null',
            'Term'=> 'null',
            'inviteby'=> Auth::user()->firstname .' '.Auth::user()->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'google_id' => 'Admin',
            'role_acc' => 'Admin',
            'groupleader'=> 'Admin',
            'educational_status'=> 'Admin',
        ]);
        if ($user->wasRecentlyCreated !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        } 
        

    }
    public function registerTeacher()
    {
        return view('Admin.registerTeacher');
    }
    public function addteacher(Request $request)
    {
        $request->validate(
            [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                
            ]
        );
        $randomStudentID = rand(10000, 99999);
        while (User::where('student_id', 'S' . $randomStudentID)->exists()) {
            $randomStudentID = rand(10000, 99999);
        }
        
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname'=> $request->lastname,
            'student_id'=> 'S' . $randomStudentID,
            'student_grp'=> 'อาจารย์',
            'graduatesem'=> 'teacher',
            'Term'=> 'teacher',
            'inviteby'=> Auth::user()->firstname .' '.Auth::user()->lastname,
            'email' => $request->email,
            'google_id' => 'null',
            'role_acc' => 'teacher',
            'groupleader'=> 'ไม่เป็นหัวหน้า',
            'educational_status'=> 'teacher',
        ]);

        $role_acc = User::where('role_acc', 'like', '%teacher%')->latest()->first();
            if ($role_acc->role_acc =='teacher') {
                    $userEmail = $role_acc->email;
                    $customEmail = new RMUTT_Alumni('ขอเชิญอาจารย์เข้าสู่ระบบศิษย์เก่าภาควิชาวิศวกรรมคอมพิวเตอร์');
                    Mail::to($userEmail)->send($customEmail);
                    return redirect()->back()->with('alert',"บันทึกข้อมูลและส่งข้อความเรียบร้อย");
            }else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            } 
              
        
    }
}
