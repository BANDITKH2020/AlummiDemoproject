<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\randomcode;
use Auth;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\Surveylink;
class TokenTeacherController extends Controller
{
    public function viewtoken(){
        $randomcode = randomcode::paginate(3);
        $department = department::where('ID', 1)->first();
        $surveylink = Surveylink::query()->first();
        return view('teacher.token',compact('randomcode','department','surveylink'));
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
        $randomCodeModel->save();
    
        return response()->json(['alert' => 'บันทึกข้อมูลเรียบร้อย', 'createdAt' => $randomCodeModel->created_at]);
    }
    public function delete($id){
        //ลบข้อมูลฐาน
        $delete= randomcode::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }
}
