<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\News_Alumni;
use App\Models\newsandactivity;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class NewsandActivitiesController extends Controller
{
    public function index(Request $request)
{
    $query = newsandactivity::query();

    $title_name = $request->input('title_name');
    $updated_at = $request->input('updated_at');
    $News = $request->input('News');
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
    if ($query->where('cotent_type', '1')->exists()) {
        $newsandactivity = $query->orderBy('updated_at', 'desc')->paginate(10);
    }else{
        $newsandactivity = $query->where('cotent_type', '1')->orderBy('updated_at', 'desc')->paginate(10);
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
        $category= 'ข่าวสาร';
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

        $new = new newsandactivity();
        $new->title_name = $request->title_name;
        $new->cotent = $request->cotent;
        $new->title_image = $full_path;
        $new->category = $category;
        $new->objective = $objective;
        $new->cotent_type = $cotent_type;
        $new->event_date = Carbon::now();
        $new->created_at = Carbon::now();
        $new->save();
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
                    $customEmail = new News_Alumni('ข่าวสารจากภาควิชาวิศวกรรมคอมพิวเตอร์');
                    Mail::bcc($batch)->send($customEmail);
                }
        
            // The following code will execute if there are no errors
            return redirect()->route('news')->with('alert', "บันทึกข้อมูลและส่งข้อความเรียบร้อย");
        } catch (\Exception $e) {
            // Handle the exception here
            return redirect()->route('news')->with('error', 'เกิดข้อผิดพลาดในการส่งข้อความ');
        }  
    }
    public function edit($id){
        $newsandactivity = newsandactivity::find($id);
        return view('admin.new.editnews',compact('newsandactivity'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'title_name' => 'required',
            'cotent' => 'required',
            'title_image' => 'nullable|mimes:jpg,jpeg,png|max:3000',
        ], [
            'title_name.required' => 'กรุณาป้อนชื่อหัวข้อข่าวครับ',
            'cotent.required' => 'กรุณาป้อนเนื้อหาข่าวครับ',
            'title_image.mimes' => 'กรุณาไฟล์ภาพเป็น jpg, jpeg, png ครับ',
        ]);
    
        $new = newsandactivity::find($id);
    
        if (!$new) {
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
            $new->title_name = $request->title_name;
            $new->cotent = $request->cotent;
            $new->title_image = $full_path;
    
            $title_image->move($upload_location, $img_name);
        } else {
            // Update data without changing the image
            $new->title_name = $request->title_name;
            $new->cotent = $request->cotent;
        }
        if ($new->save()) {
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
    public function viewnew($id)
    {
        $view = newsandactivity::with('images')->find($id);
        return view('admin.new.viewNew',compact('view'));
    }
}
