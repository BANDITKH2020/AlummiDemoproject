<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;

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
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]
        );
        User::create([
            'firstname' => $request->firstname,
            'lastname'=> 'null',
            'student_id'=> 'Admin',
            'student_grp'=> 'Admin',
            'graduatesem'=> 'null',
            'inviteby'=> 'Admin',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'google_id' => 'Admin',
            'role_acc' => 'Admin',
            'groupleader'=> 'Admin',
            'educational_status'=> 'Admin',
        ]);
        return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");

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
        User::create([
            'firstname' => $request->firstname,
            'lastname'=> $request->lastname,
            'student_id'=> 'S' . $randomStudentID,
            'student_grp'=> 'teacher',
            'graduatesem'=> 'teacher',
            'inviteby'=> 'teacher',
            'email' => $request->email,
            'google_id' => 'null',
            'role_acc' => 'teacher',
            'groupleader'=> 'ไม่เป็นหัวหน้า',
            'educational_status'=> 'teacher',
        ]);
        return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");

    }
}
