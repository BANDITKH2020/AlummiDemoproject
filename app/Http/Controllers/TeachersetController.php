<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\department;
use App\Models\Surveylink;
use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class TeachersetController extends Controller
{
    public function accTeacher()
    { 
        $id = Auth::user()->id;
        $student_id = Auth::user()->student_id;
        $surveylink = Surveylink::query()->first();
        $contactInfo = Contart_info::where('ID_student', $student_id)->first();
        $user = User::where('id', $id)->first();
        $department = department::where('ID', 1)->first();
        
        return view('teacher.accTeacher',compact('surveylink','contactInfo','user','department'));
    }
    public function store(Request $request)
    {
        $student_id = Auth::user()->student_id;

        // ตรวจสอบว่ามีข้อมูลด้วย student_id หรือไม่
        $existingContact = Contart_info::where('ID_student', $student_id)->first();

        if ($existingContact) {
            // มีข้อมูลอยู่แล้ว ทำการอัปเดตข้อมูล
            $this->updateExistingContact($existingContact, $request);
        } else {
            // ไม่มีข้อมูล ทำการเพิ่มข้อมูลใหม่
            $this->createNewContact($student_id, $request);
        }

        // บันทึกข้อมูลของ User
        if ($request->isMethod('post')) {
            $user = $request->all();
            $id = $request->input('id');
            User::where(['id' => $id])->update(['firstname' => $user['firstname'], 'lastname' => $user['lastname']]);
        }

        return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
    }

    public function updateExistingContact($existingContact, $request)
    {
        
        $image = $request->file('image');
        $prefix = $request->input('prefix');
        $email = $request->input('email');
        $Line = $request->input('Line');
        $Facebook = $request->input('Facebook');
        $Tel = $request->input('Tel');
        $Instagram = $request->input('Instagram');
        $attention = "-";

        // ตรวจสอบว่ามีไฟล์รูปถูกส่งมาหรือไม่
        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            // บันทึกข้อมูล
            $upload_location = 'public/image/profileuser/';
            $full_path = $upload_location . $img_name;
            

            // ลบไฟล์รูปเก่า
            Storage::delete($existingContact->image);

            // ย้ายไฟล์รูปใหม่ไปยัง storage/app/public/image/profileuser/
            $image->storeAs('public/image/profileuser', $img_name);

            $existingContact->image = $img_name;
        }
        $status_contact = $request['status_contact'] == 'true' ? 1 : 0;
        $existingContact->prefix = $prefix;
        $existingContact->ID_email = $email;
        $existingContact->ID_line = $Line;
        $existingContact->ID_facebook = $Facebook;
        $existingContact->telephone = $Tel;
        $existingContact->ID_instagram = $Instagram;
        $existingContact->status_contact = $status_contact;
        $existingContact->ID_student = Auth::user()->student_id;
        $existingContact->attention = $attention;
        $existingContact->save();

        return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
    }

    public function createNewContact($id, Request $request)
    { 
        // ตรวจสอบว่ามีไฟล์รูปถูกส่งมาหรือไม่
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $prefix = $request->input('prefix');
            $email = $request->input('email');
            $Line = $request->input('Line');
            $Facebook = $request->input('Facebook');
            $Tel = $request->input('Tel');
            $Instagram = $request->input('Instagram');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            // บันทึกไฟล์รูปใหม่ไปยัง storage/app/public/image/profileuser/
            $image->storeAs('public/image/profileuser', $img_name);
        } else {
            $img_name = null; // ตั้งค่าเป็น null ในกรณีที่ไม่มีไฟล์รูปถูกส่งมา
        }

        // บันทึกข้อมูล
        $upload_location = 'public/image/profileuser/';
        $full_path = $upload_location . $img_name;
        $status_contact = $request->input('status_contact') == 'true' ? 1 : 0;

        $Contart_info = new Contart_info();
        $Contart_info->image = $img_name;
        $Contart_info->prefix = $prefix;
        $Contart_info->ID_email = $email;
        $Contart_info->ID_line = $Line;
        $Contart_info->ID_facebook = $Facebook;
        $Contart_info->telephone = $Tel;
        $Contart_info->ID_instagram = $Instagram;
        $Contart_info->status_contact = $status_contact;
        $Contart_info->attention = '-'; // หรือตั้งค่าเป็น null ตามความต้องการของคุณ
        $Contart_info->ID_student = Auth::user()->student_id;
        $Contart_info->save();

        return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
    }

}
