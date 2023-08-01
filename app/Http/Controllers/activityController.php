<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class activityController extends Controller
{
    public function index(){
        $query = newsandactivity::query();
        
        if ($query->where('cotent_type','2')->exists()) {
            $activity = $query->paginate(3);
        }
        return view('admin.activity.index',compact('activity'));
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
                'category.required'=>"กรุณาเลือกประเภทกิจกรรมครับ", 
            ]
           
        );
        $title_image = $request->file('title_image');
        //generate ชื่อภาพ
        $name_gen = hexdec(uniqid());

        //ดึ่งนามสกุลไฟล์ภาพ
        $img_ext = strtolower($title_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
    
        //บันทึกข้อมูล
        $upload_location = 'image/newsandactivity/';
        $full_path = $upload_location.$img_name;
        
        $cotent_type='2';
        $category = $request->category;
            switch ($category) {
                case '1':
                    $category='งานพบประสังสรรค์';
                    newsandactivity::insert([
                        'title_name'=>$request->title_name,
                        'cotent'=>$request->cotent,
                        'title_image'=>$full_path,
                        'category'=>$category,
                        'objective'=>$request->objective,
                        'cotent_type'=>$cotent_type,
                        'created_at'=>Carbon::now()
                    ]);
                    break;
                case '2':
                    $category='งานวิชาการ';
                    newsandactivity::insert([
                        'title_name'=>$request->title_name,
                        'cotent'=>$request->cotent,
                        'title_image'=>$full_path,
                        'category'=>$category,
                        'objective'=>$request->objective,
                        'cotent_type'=>$cotent_type,
                        'created_at'=>Carbon::now()
                    ]);
                    break;
                case '3':
                    $category='งานแข่งขันกีฬา';
                    newsandactivity::insert([
                        'title_name'=>$request->title_name,
                        'cotent'=>$request->cotent,
                        'title_image'=>$full_path,
                        'category'=>$category,
                        'objective'=>$request->objective,
                        'cotent_type'=>$cotent_type,
                        'created_at'=>Carbon::now()
                    ]);
                    break;
                case '4':
                    newsandactivity::insert([
                        'title_name'=>$request->title_name,
                        'cotent'=>$request->cotent,
                        'title_image'=>$full_path,
                        'category'=>$request->categoryall,
                        'objective'=>$request->objective,
                        'cotent_type'=>$cotent_type,
                        'created_at'=>Carbon::now()
                    ]);
                    break;
            }
        
        $title_image->move($upload_location,$img_name);
        return redirect()->route('activitys')->with('alert',"บันทึกข้อมูลเรียบร้อย");

        
    }
}
