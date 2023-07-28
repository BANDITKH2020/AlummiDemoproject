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
        return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");

        
    }
    public function edit($id){
        $newsandactivity = newsandactivity::find($id);
        return view('admin.new.editnews',compact('newsandactivity'));
    }
    public function update(Request $request, $id){
        $request->validate(
            [
                'title_name'=>'required',
                'cotent'=>'required',
                
            ],
            [
                'title_name.required'=>"กรุณาป้อนชื่อหัวข้อข่าวครับ",
                'cotent.required'=>"กรุณาป้อนเนื้อหาข่าวครับ",
                
            ]
        );
        $title_image = $request->file('title_image');
        //อัพเดตภาพและชื่อ
        if($title_image){
            $name_gen = hexdec(uniqid());

            //ดึ่งนามสกุลไฟล์ภาพ
            $img_ext = strtolower($title_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
        
            //บันทึกข้อมูล
            $upload_location = 'image/newsandactivity/';
            $full_path = $upload_location.$img_name;

            
            //อัพเดตข้อมูล
            newsandactivity::find($id)->update([
                'title_name'=>$request->title_name,
                'cotent'=>$request->cotent,
                'title_image'=>$full_path,
            ]);

            //ลบภาพเก่าแทนภาพใหม่
            $old_image = $request->old_image;
            unlink($old_image);
            $title_image->move($upload_location,$img_name);
            return redirect()->route('news')->with('alert',"อัพเดตข้อมูลเรียบร้อย");
    
        }else{
           //อัพเดตชื่อ 
           newsandactivity::find($id)->update([
                'title_name'=>$request->title_name,
                'cotent'=>$request->cotent,
                
            ]);
            return redirect()->route('news')->with('alert',"อัพเดตข้อมูลเรียบร้อย");
        }
    }
    public function delete($id){
        //ลบภาพ
        $img = newsandactivity::find($id)->title_image;
        unlink($img);
        
        //ลบข้อมูลฐาน
        $delete= newsandactivity::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    }
   
}
