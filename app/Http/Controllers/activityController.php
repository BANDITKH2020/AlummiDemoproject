<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\Activity_Alumni;
use App\Models\newsandactivity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class activityController extends Controller
{
    public function index(Request $request){
        $query = newsandactivity::query();
        $category = $request->input('category');
        $title_name = $request->input('title_name');
        $updated_at = $request->input('updated_at');
        $News = $request->input('News');
    // Apply search filters
    if (!empty($News)) {
        switch ($News) {
            case '1':
                $query->where('title_name', 'LIKE', "%{$title_name}%");
                break;
            case '2':
                $query->where('updated_at', 'LIKE', "%{$updated_at}%");
                break;
        }
    }
        if (!empty($category)) {
            switch ($category) {
                case 'all':
                    if ($category ==='all') {
                        $category=null;
                    }
                    if ($category===null) {
                        $query->where('cotent_type','2');
                        break;
                    }
                    $query->where('category', 'LIKE', "%{$category}%")
                        ->orWhere('category', 'LIKE', "%{$category}%")
                        ->orWhere('category', 'LIKE', "%{$category}%")
                        ->orWhere('category', 'LIKE', "%{$category}%");
                    break;
                case 'งานพบปะสังสรรค์':
                    $query->where('category', 'LIKE', "%{$category}%");
                    break;
                case 'งานวิชาการ':
                    $query->where('category', 'LIKE', "%{$category}%");
                    break;
                case 'งานแข่งขันกีฬา':
                    $query->where('category', 'LIKE', "%{$category}%");
                    break;
                case 'กิจกรรมศิษย์เก่าสัมพันธ์':
                    $query->where('category', 'LIKE', "%{$category}%");
                    break;
            }
            
        }
        
        if ($query->where('cotent_type','2')->exists()) {
            $activitys = $query->where('cotent_type','2')->orderBy('updated_at', 'desc')->paginate(10);
        }else{
            $activitys = $query->where('cotent_type','2')->orderBy('updated_at', 'desc')->paginate(10);
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
                $category = 'งานพบประสังสรรค์';
                break;
            case '2':
                $category = 'งานวิชาการ';
                break;
            case '3':
                $category = 'งานแข่งขันกีฬา';
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
        
        $users = User::where('role_acc', 'like', '%student%')->get();
        try {
                $userEmails = [];
                foreach ($users as $user) {
                    $userEmails[] = $user->email;
                }
                    $batchSize = 30;
                    $recipientBatches = array_chunk($userEmails, $batchSize);

                foreach ($recipientBatches as $batch) {
                    $customEmail = new Activity_Alumni('ข่าวกิจกรรมจากภาควิชาวิศวกรรมคอมพิวเตอร์');
                    Mail::bcc($batch)->send($customEmail);
                }
        
            // The following code will execute if there are no errors
            return redirect()->route('activitys')->with('alert', "บันทึกข้อมูลและส่งข้อความเรียบร้อย");
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->route('activitys')->with('error', 'เกิดข้อผิดพลาดในการส่งข้อความ');
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
            return redirect()->route('activitys')->with('alert', 'บันทึกข้อมูลเรียบร้อย');
        } else {
            return redirect()->route('activitys')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
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

    public function viewactivity($id)
    {
        $view = newsandactivity::with('images')->find($id);
        return view('admin.activity.viewactivity',compact('view'));
    }
    
}
