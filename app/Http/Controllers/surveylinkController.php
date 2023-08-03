<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Surveylink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class surveylinkController extends Controller
{
    public function index(){
       
        $surveylink = Surveylink::paginate(3);
        return view('admin.link.index',compact('surveylink'));
    }
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'graduatedyear'=>'required',
                'link'=>'required',
            ],
            [
                'graduatedyear.required'=>"กรุณาป้อนปีการศึกษาที่จบ",
                'link.required'=>"กรุณาป้อนลิงก์แบบสอบถาม",
            ]
        );
        
        Surveylink::insert([
            'graduatedyear'=>$request->graduatedyear,
            'link'=>$request->link,
            'created_at'=>Carbon::now()
        ]);
        
        return redirect()->route('links')->with('alert',"บันทึกข้อมูลเรียบร้อย");  
    }
    
    public function update(Request $request, $id){
        if ($request->isMethod('post')) {
            $surveylink = $request->all();
            Surveylink::where(['id'=>$id])->update(['graduatedyear'=>$surveylink['graduatedyear'],'link'=>$surveylink['link']]);
            return redirect()->route('links')->with('alert',"บันทึกข้อมูลเรียบร้อย");  
        }
    }
    public function delete($id){
        //ลบข้อมูลฐาน
        $delete= Surveylink::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }

}
