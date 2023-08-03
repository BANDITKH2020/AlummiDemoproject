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
}
