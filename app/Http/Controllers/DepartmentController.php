<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function contact()
    {
        $department = department::where('ID', 1)->first();
        return view('Admin.contact.Contact',compact('department'));
    }
    public function store(Request $request)
    {
        // ตรวจสอบว่ามีข้อมูลด้วย student_id หรือไม่
        $department = department::where('ID', 1)->first();

        if (!$department) {
            // มีข้อมูลอยู่แล้ว ทำการอัปเดตข้อมูล
            $this->createNewContact($request);
        } else {
            // ไม่มีข้อมูล ทำการเพิ่มข้อมูลใหม่
            $this->updateExistingContact($department, $request);
        }
        return redirect()->back();
    }
    public function createNewContact(Request $request)
    {
        $newDepartment = new department;
        $newDepartment->address = $request->input('address'); // แทน column1 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $newDepartment->contact_time = $request->input('contact_time'); // แทน column2 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $newDepartment->phone_number = $request->input('phone_number');
        $newDepartment->facebook = $request->input('facebook');
        $newDepartment->map = $request->input('map');
        $newDepartment->web = $request->input('web');
        $newDepartment->save();
        if ($newDepartment->wasRecentlyCreated !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert',"บันทึกข้อมูลติดต่อภาควิชาเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูลติดต่อภาควิชา');
        } 
        
    }
    public function updateExistingContact($department, $request)
    {
        $department = department::where('ID', 1)->first();
        $address = $request->input('address');
        $contact_time = $request->input('contact_time');
        $phone_number = $request->input('phone_number');
        $facebook = $request->input('facebook');
        $web = $request->input('web');
        $map = $request->input('map');
        $department->address = $address; // แทน column1 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $department->contact_time = $contact_time; // แทน column2 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $department->phone_number = $phone_number;
        $department->facebook = $facebook;
        $department->map = $map;
        $department->web = $web;
        if ($department->save()) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert',"อัพเดตข้อมูลติดต่อภาควิชาเรียบร้อย");
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการอัพเดตข้อมูลติดต่อภาควิชา');
        } 
    }
}
