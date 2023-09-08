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
        return redirect()->back()->with('alert', 'บันทึกข้อมูลติดต่อภาควิชาเรียบร้อย');
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
        return redirect()->back()->with('alert', 'บันทึกข้อมูลติดต่อภาควิชาเรียบร้อย');
    }
    public function updateExistingContact($department, $request)
    {
        $department->address = $request->input('address'); // แทน column1 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $department->contact_time = $request->input('contact_time'); // แทน column2 ด้วยชื่อคอลัมน์ที่คุณต้องการ
        $department->phone_number = $request->input('phone_number');
        $department->facebook = $request->input('facebook');
        $department->map = $request->input('map');
        $department->web = $request->input('web');
        $department->save();
        return redirect()->back()->with('alert', 'แก้ไขข้อมูลติดต่อภาควิชาเรียบร้อย');
    }
}
