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
        Skill_info::insert([
            'ID_student'=>$ID_student,
            'Skill_name'=>$Skill_name,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");
    }
    public function update(Request $request, $id) 
    { 
        if ($request->isMethod('post')) {
            $Skill_name = $request->input('Skill_name');
            $id = $request->input('id');
            
            Skill_info::find($id)->update([
                'Skill_name'=>$Skill_name,
            ]);
            
            return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");  
        }

    }
    public function delete($id){
        
        $delete= Skill_info::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }


    
}
