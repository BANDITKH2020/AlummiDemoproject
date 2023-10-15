<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tranning_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TranningInfoController extends Controller
{
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $ID_student = Auth::user()->student_id;
        $Certi_name = $request->input('Certi_name');
        $Organize_name = $request->input('Organize_name');
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        if ($startdate > $enddate) {
            return redirect()->back()->with('error', "วันทำงานไม่สอดคล้องกัน");
        }
        $Tranning_info =Tranning_info::insert([
            'ID_student'=>$ID_student,
            'Certi_name'=>$Certi_name,
            'Organize_name'=>$Organize_name,
            'startdate'=>$startdate,
            'enddate'=>$enddate,
            'created_at'=>Carbon::now()
        ]);
        if ($Tranning_info !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'บันทึกข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
    }

    public function update(Request $request, $id) 
    { 
        if ($request->isMethod('post')) {
            $id = $request->input('id');
            $Certi_name = $request->input('Certi_name');
            $Organize_name = $request->input('Organize_name');
            $startdate = $request->input('startdate');
            $enddate = $request->input('enddate');
            if ($startdate > $enddate) {
                return redirect()->back()->with('error', "วันฝึกอบรมไม่สอดคล้องกัน");
            }
            $Tranning_info = Tranning_info::find($id)->update([
                'Certi_name'=>$Certi_name,
                'Organize_name'=>$Organize_name,
                'startdate'=>$startdate,
                'enddate'=>$enddate,
            ]);
            if ($Tranning_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'บันทึกข้อมูลเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            }
        }

    }
    public function delete($id){
        
        $delete= Tranning_info::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
}
