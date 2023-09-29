<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\randomcode;
use Auth;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\Surveylink;
class TokenTeacherController extends Controller
{
    public function viewtoken(){
        $randomcode = randomcode::orderBy('end_date','desc')->paginate(3);
        $department = department::where('ID', 1)->first();
        $surveylink = Surveylink::query()->latest()->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('teacher.token',compact('randomcode','department','surveylink','contactInfo'));
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
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
}
