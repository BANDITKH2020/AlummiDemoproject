<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class activityController extends Controller
{
    public function index(){
        return view('admin.activity.index');
    }
    public function saveactivitys(){
        return view('admin.activity.saveactivity');
    }
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'title_name'=>'required',
                'cotent'=>'required',
                'title_image'=>'required|mimes:jpg,jpeg,png',
                'objective'=>'required',
                'category'=>'required',
                
            ],
            [
                'title_name.required'=>"กรุณาป้อนชื่อหัวข้อกิจกรรมครับ",
                'cotent.required'=>"กรุณาป้อนเนื้อหากิจกรรมครับ",
                'objective.required'=>"กรุณาป้อนเนื้อหาวัตถุประสงค์ครับ",
                'title_image.required'=>"กรุณาใส่ภาพประกอบกิจกรรมครับ", 
                'title_image.mimes'=>"กรุณาไฟล์ภาพเป็น jpg, jpeg, png ครับ", 
            ]
           
        );

        //เข้ารหัสรูปภาพ
        
       

        $title_image = $request->file('title_image');
        //generate ชื่อภาพ
        $name_gen = hexdec(uniqid());

        //ดึ่งนามสกุลไฟล์ภาพ
        $img_ext = strtolower($title_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
    
        //บันทึกข้อมูล
        $upload_location = 'image/newsandactivity/';
        $full_path = $upload_location.$img_name;

        newsandactivity::insert([
            'title_name'=>$request->title_name,
            'cotent'=>$request->cotent,
            'title_image'=>$full_path,
            'category'=>$request->category,
            'objective'=>$request->objective,
            'created_at'=>Carbon::now()
        ]);
        $title_image->move($upload_location,$img_name);
        return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");

        
    }
}
