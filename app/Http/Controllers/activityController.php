<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class activityController extends Controller
{
    public function index(Request $request){
        $query = newsandactivity::query();
        $search = $request->input('search');
        $searchdata = $request->searchdata;
        
    // Apply search filters
        if (!empty($search)) {
            switch ($searchdata) {
                case 'all':
                    $query->where('title_name', 'LIKE', "%{$search}%")
                        ->orWhere('category', 'LIKE', "%{$search}%")
                        ->orWhere('created_at', 'LIKE', "%{$search}%");
                    break;
                case 'title_name':
                    $query->where('title_name', 'LIKE', "%{$search}%");
                    break;
                case 'category':
                    $query->where('category', 'LIKE', "%{$search}%");
                    break;
                case 'created_at':
                    $query->where('created_at', 'LIKE', "%{$search}%");
                    break;
            }
        }

        if ($query->where('cotent_type','2')->exists()) {
            $activitys = $query->paginate(10);
        }else{
            $activitys = $query->paginate(10);
        }
        return view('admin.activity.index', compact('activitys'));
    }
    public function saveactivitys(){
        return view('admin.activity.saveactivity');
    }
    public function store(Request $request){
        // Validation
        $request->validate([
            'title_name' => 'required',
            'cotent' => 'required',
            'title_image' => 'required|mimes:jpg,jpeg,png',
            'objective' => 'required',
            'category' => 'required',
            'event_date' => 'required|date', // Add validation for event_date
        ], [
            'title_name.required' => 'กรุณาป้อนชื่อหัวข้อกิจกรรมครับ',
            'cotent.required' => 'กรุณาป้อนเนื้อหากิจกรรมครับ',
            'objective.required' => 'กรุณาป้อนเนื้อหาวัตถุประสงค์ครับ',
            'title_image.required' => 'กรุณาใส่ภาพประกอบกิจกรรมครับ', 
            'title_image.mimes' => 'กรุณาไฟล์ภาพเป็น jpg, jpeg, png ครับ', 
            'category.required' => 'กรุณาเลือกประเภทกิจกรรมครับ', 
            'event_date.required' => 'กรุณาใส่วันที่จัดกิจกรรมครับ',
            'event_date.date' => 'รูปแบบวันที่ไม่ถูกต้อง',
        ]);
    
        // Generate image name and path
        $title_image = $request->file('title_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($title_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $upload_location = 'image/newsandactivity/';
        $full_path = $upload_location . $img_name;
    
        // Determine category based on user selection
        $category = '';
        switch ($request->category) {
            case '1':
                $category = 'งานพบประสังสรรค์ประจำปี';
                break;
            case '2':
                $category = 'อบรมให้ความรู้วิชาการ';
                break;
            case '3':
                $category = 'งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์';
                break;
            case '4':
                $category = 'กิจกรรมศิษย์เก่าสัมพันธ์';
                break;
            case '5':
                $category = $request->categoryall;
                break;
        }
    
        // Insert the activity
        $cotent_type = '2';
        $activity = new newsandactivity();
        $activity->title_name = $request->title_name;
        $activity->cotent = $request->cotent;
        $activity->title_image = $full_path;
        $activity->category = $category;
        $activity->objective = $request->objective;
        $activity->cotent_type = $cotent_type;
        $activity->event_date = $request->event_date;
        $activity->created_at = Carbon::now();
        $activity->save();
        $title_image->move($upload_location,$img_name);
         
        if ($activity) {
            return redirect()->route('activitys')->with('alert', 'บันทึกข้อมูลเรียบร้อย');
        } else {
            return redirect()->route('activitys')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
    }
    public function edit($id){
        $activity = newsandactivity::find($id);
        return view('admin.activity.editactivity',compact('activity'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title_name' => 'required',
            'cotent' => 'required',
            'objective' => 'required',
        ], [
            'title_name.required' => 'กรุณาป้อนชื่อหัวข้อกิจกรรมครับ',
            'cotent.required' => 'กรุณาป้อนเนื้อหากิจกรรมครับ',
            'objective.required' => 'กรุณาป้อนเนื้อหาวัตถุประสงค์ครับ',
        ]);
        $activity = newsandactivity::find($id);
    
        if (!$activity) {
            return redirect()->back()->with('error', 'ไม่พบข่าวที่คุณต้องการแก้ไข');
        }
    
        // Check if a new image file is being uploaded
        if ($request->hasFile('title_image')) {
            $title_image = $request->file('title_image');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($title_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $upload_location = 'image/newsandactivity/';
            $full_path = $upload_location . $img_name;
    
            // Delete the old image file if it exists
            $img = newsandactivity::find($id)->title_image;
            unlink($img);
    
            // Update data with new image path
            $activity->title_name = $request->title_name;
            $activity->cotent = $request->cotent;
            $activity->objective = $request->objective;
            $activity->title_image = $full_path;
    
            $title_image->move($upload_location, $img_name);
        } else {
            // Update data without changing the image
            $activity->title_name = $request->title_name;
            $activity->cotent = $request->cotent;
            $activity->objective = $request->objective;
        }
        if ($activity->save()) {
            return redirect()->route('news')->with('alert', 'บันทึกข้อมูลเรียบร้อย');
        } else {
            return redirect()->route('news')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
    }
    
    public function delete($id){
        //ลบภาพ
        $img = newsandactivity::find($id)->title_image;
        unlink($img);
        
        //ลบข้อมูลฐาน
        $delete= newsandactivity::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
    public function addImage(Request $request, $id)
    {
        $newsandactivity = newsandactivity::findOrFail($id);

        if ($request->hasFile('addImage')) {
            $images = $request->file('addImage');

            foreach ($images as $image) {
                $imagePath = $image->store('activity_images', 'public'); // Save image to storage/app/public/activity_images directory
                $newsandactivity->images()->create(['image_path' => $imagePath]);
            }

            return redirect()->back()->with('alert', 'รูปภาพถูกเพิ่มเรียบร้อยแล้ว');
        }

        return redirect()->back()->with('error', 'ไม่พบรูปภาพที่อัพโหลด');
    }
}
