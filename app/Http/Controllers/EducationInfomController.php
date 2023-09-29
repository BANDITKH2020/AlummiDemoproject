<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Education_infom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationInfomController extends Controller
{
    public function store(Request $request)
    {
        $student_id = Auth::user()->student_id;
        $School_name = $request->input('School_name');
        $degree = $request->input('degree');
        $field_study = $request->input('field_study');
        $faculty_study = $request->input('faculty_study');
        $endyear = $request->input('endyear');
        $gpa = $request->input('gpa');
        $schooltype = $request->input('schooltype');
        
        $Education_infom = new Education_infom();
        $Education_infom->ID_student = $student_id;
        $Education_infom->School_name = $School_name;
        $Education_infom->degree =$degree;
        $Education_infom->field_study = $field_study;
        $Education_infom->faculty_study = $faculty_study;
        $Education_infom->endyear = $endyear;
        $Education_infom->gpa = $gpa;
        $Education_infom->schooltype = $schooltype;
        $Education_infom->created_at = Carbon::now();
        $Education_infom->save();
        if ($Education_infom->wasRecentlyCreated) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'อัปเดตประวัติกาศึกษาเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการอัปเดตประวัติกาศึกษา');
        }
    }

    public function update(Request $request, $id){
        if ($request->isMethod('post')) {
            $Education_infom = $request->all();
            $Education = Education_infom::where(['id'=>$id])->update(['School_name'=>$Education_infom['School_name'],'degree'=>$Education_infom['degree'],'field_study'=>$Education_infom['field_study'],'faculty_study'=>$Education_infom['faculty_study'],
            'endyear'=>$Education_infom['endyear'],'gpa'=>$Education_infom['gpa'],'schooltype'=>$Education_infom['schooltype']]); 

            if ($Education !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', 'อัปเดตประวัติกาศึกษาเรียบร้อย');
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการอัปเดตประวัติกาศึกษา');
            }
        }

        
    }

    public function delete($id){
        
        $delete= Education_infom::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
   
}
