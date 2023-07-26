<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NewsandActivitiesController extends Controller
{
    public function index(){
        $newsandactivity = newsandactivity::paginate(3);
        return view('admin.new.index',compact('newsandactivity'));
    }
    public function savenews(){
        return view('admin.new.savenews');
    }
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'title_name'=>'required',
                'cotent'=>'required',
                'title_image'=>'required|mimes:jpg,jpeg,png'
            ],
            [
                'title_name.required'=>"กรุณาป้อนชื่อหัวข้อข่าวครับ",
                'cotent.required'=>"กรุณาป้อนเนื้อหาข่าวครับ",
                'title_image.required'=>"กรุณาใส่ภาพประกอบบริการครับ", 
                'title_image.mimes'=>"กรุณาไฟล์ภาพเป็น jpg, jpeg, png ครับ", 
            ]
           
        );

        //เข้ารหัสรูปภาพ
        $category= 'news';
        $objective='-';

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
            'category'=>$category,
            'objective'=>$objective,
            'created_at'=>Carbon::now()
        ]);
        $title_image->move($upload_location,$img_name);
        return redirect()->back()->with('success',"บันทึกข้อมูลเรียบร้อย");

        
    }
   
}
