<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\add_fileMassage;
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
            $filePath = $request->file('massage_file');
            

        // บันทึกข้อมูลลงในฐานข้อมูล
        $massageData = [
            'ID_student' => $ID_student,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'massage_name' => $massage_name,
            'massage_cotent' => $massage_cotent,
            'created_at' => Carbon::now(),
        ];
        
        $Massage = Massage::create($massageData);
        $newMassageId = $Massage->id;

        foreach ($filePath as $file) {
            $filePath = $file->store('massage_files', 'public'); // Save image to storage/app/public/massage_files directory
            // สร้างข้อมูลใหม่ในตาราง addfileMassage
            add_fileMassage::create([
                
                'massage_file' => $filePath,
                'massage_id' => $newMassageId
            ]);
        }


            

            if ($Massage !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'ส่งข้อความเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการส่งข้อความเรียบร้อย');
            }
        } 
    }
    
}
