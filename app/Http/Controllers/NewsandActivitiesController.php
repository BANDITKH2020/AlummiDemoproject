<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class NewsandActivitiesController extends Controller
{
    public function index(Request $request)
{
    $query = newsandactivity::query();

    $search = $request->input('search');
    $gender = $request->gender;

    // Apply search filters
    if (!empty($search)) {
        switch ($gender) {
            case 'all':
                $query->where('title_name', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%");
                break;
            case 'title_name':
                $query->where('title_name', 'LIKE', "%{$search}%");
                break;
            case 'created_at':
                $query->where('created_at', 'LIKE', "%{$search}%");
                break;
        }
    }
    if ($query->where('cotent_type', '1')->exists()) {
        $newsandactivity = $query->paginate(3);
    }else{
        $newsandactivity = $query->paginate(3);
    }
    // Paginate the results after applying the filters
   

    return view('admin.new.index', compact('newsandactivity'));
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
                'title_image'=>'required|mimes:jpg,jpeg,png|max:3000',
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
        $objective='';
        $cotent_type='1';
        
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
            'cotent_type'=>$cotent_type,
            'event_date'=>Carbon::now(),
            'created_at'=>Carbon::now()
        ]);
        $title_image->move($upload_location,$img_name);
        return redirect()->route('news')->with('alert',"บันทึกข้อมูลเรียบร้อย");

        
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
