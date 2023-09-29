<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Skill_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillInfoController extends Controller
{
    
    public function storeSkill(Request $request)
    {
        $ID_student = Auth::user()->student_id;
        $Skill_name = $request->input('Skill_name');
        $Skill_info = Skill_info::insert([
            'ID_student'=>$ID_student,
            'Skill_name'=>$Skill_name,
            'created_at'=>Carbon::now()
        ]);
        if ($Skill_info !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
    }
    public function update(Request $request, $id) 
    { 
        if ($request->isMethod('post')) {
            $Skill_name = $request->input('Skill_name');
            $id = $request->input('id');
            
            $Skill_info = Skill_info::find($id)->update([
                'Skill_name'=>$Skill_name,
            ]);
            if ($Skill_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->route('reward')->with('alert',"บันทึกข้อมูลเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->route('reward')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            }
        }

    }
    public function delete($id){
        
        $delete= Skill_info::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }


    
}
