<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\randomcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function viewtoken(){
        $randomcode = randomcode::paginate(3);
        return view('Admin.Token.token',compact('randomcode'));
    }
    public function store(Request $request)
    {
        $randomCode = $request->input('random_code'); // รับรหัสสุ่มจาก request
        $selectedDateTime = $request->input('selected_date_time'); // รับวันที่และเวลาจาก request

        // ทำการบันทึกลงในฐานข้อมูล (ตามโมเดลที่คุณได้สร้าง)
        $randomCodeModel = new randomcode();
        $randomCodeModel->code = $randomCode;
        $randomCodeModel->end_date = $selectedDateTime; // กำหนดวันที่และเวลาที่สร้าง
        $randomCodeModel->user_id = Auth::user()->id;

        if ($randomCodeModel->save()) {
            // บันทึกสำเร็จ
            return response()->json(['alert' => 'บันทึกข้อมูลเรียบร้อย', 'createdAt' => $randomCodeModel->created_at]);
        } else {
            // บันทึกไม่สำเร็จ
            return response()->json(['alert' => 'บันทึกข้อมูลไม่สำเร็จ'], 500);
        }
    }

    public function delete($id){
        //ลบข้อมูลฐาน
        $delete= randomcode::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }
}
