<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MassageController extends Controller
{
    public function store(Request $request){
        // ตรวจสอบข้อมูล
        $ID_student = Auth::user()->student_id;
        $firstname = Auth::user()->firstname;
        $lastname = Auth::user()->lastname;
        $massage_name = $request->input('massage_name');
        $massage_cotent = $request->input('massage_cotent');
        // ตรวจสอบว่ามีการอัปโหลดไฟล์หรือไม่
        if ($request->hasFile('massage_file')) {
            // บันทึกไฟล์ลงในโฟลเดอร์ที่คุณต้องการ (ตั้งค่าใน config/filesystems.php)
            $file = $request->file('massage_file');
            $filePath = $file->store('massage_files', 'public');
    
            // บันทึกข้อมูลลงในฐานข้อมูล
            $Massage = Massage::insert([
                'ID_student' => $ID_student,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'massage_name' => $massage_name,
                'massage_cotent' => $massage_cotent,
                'massage_file' => $filePath,
                // เก็บเส้นทางไฟล์ลงในฐานข้อมูล
                'created_at' => Carbon::now(),
            ]);
            if ($Massage !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'ส่งข้อมูลเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการส่งข้อมูลเรียบร้อย');
            }
        } else {
            // กรณีไม่มีการอัปโหลดไฟล์
            $Massage = Massage::insert([
                'ID_student' => $ID_student,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'massage_name' => $massage_name,
                'massage_cotent' => $massage_cotent, 
                'massage_file' => '-',
                
                'created_at' => Carbon::now(),
            ]);
            if ($Massage !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'ส่งข้อมูลเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการส่งข้อมูลเรียบร้อย');
            }
        }
    }
    
}
