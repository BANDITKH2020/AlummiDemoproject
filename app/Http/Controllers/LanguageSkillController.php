<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\language_skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageSkillController extends Controller
{
    public function storeLanguage(Request $request)
    {
        $ID_student = Auth::user()->student_id;
        $language = $request->input('language');
        $listening = $request->input('listening');
        $speaking = $request->input('speaking');
        $reading = $request->input('reading');
        $writing = $request->input('writing');
       $language_skill = language_skill::insert([
            'ID_student'=>$ID_student,
            'language'=>$language,
            'listening'=>$listening,
            'speaking'=>$speaking,
            'reading'=>$reading,
            'writing'=> $writing,
            'created_at'=>Carbon::now()
        ]);
        if ($language_skill !== false) {
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
            $id = $request->input('id');
            $language = $request->input('language');
            $listening = $request->input('listening');
            $speaking = $request->input('speaking');
            $reading = $request->input('reading');
            $writing = $request->input('writing');
            
            $language_skill = language_skill::find($id)->update([
                'language'=>$language,
                'listening'=>$listening,
                'speaking'=>$speaking,
                'reading'=>$reading,
                'writing'=> $writing,
            ]);
            
            if ($language_skill !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert',"อัพเดตข้อมูลเรียบร้อย");  
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการอัพเดตข้อมูล');
            }
        }

    }
    public function delete($id){
        
        $delete= language_skill::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
}
