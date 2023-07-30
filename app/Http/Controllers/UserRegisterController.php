<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserRegisterController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->only(['firstname', 'lastname', 'student_grp', 'graduatesem', 'Token_id']);
        User::create($data);

        // ทำการ redirect หลังจากบันทึกข้อมูลเสร็จสิ้น
        return redirect()->route('homeuser')->with('success', 'ลงทะเบียนสำเร็จ');
    }
}
