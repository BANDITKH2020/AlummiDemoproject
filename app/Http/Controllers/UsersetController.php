<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\department;
use App\Models\Education_infom;
use App\Models\language_skill;
use App\Models\Massage;
use App\Models\Skill_info;
use App\Models\Surveylink;
use App\Models\Tranning_info;
use App\Models\User;
use App\Models\Workhistory_info;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UsersetController extends Controller
{
    public function accountuser()
    {
        $student_id = Auth::user()->student_id;

        // ดึงข้อมูล Contart_info ด้วย student_id
        $contactInfo = Contart_info::where('ID_student', $student_id)->first();
        $education_infom = Education_infom::where('ID_student', $student_id)->first();
        $Workhistory_info = Workhistory_info::where('ID_student', $student_id)->first();
        $Skill = Skill_info::where('ID_student', $student_id)->first();
        $language = language_skill::where('ID_student', $student_id)->first();
        $Tranning = Tranning_info::where('ID_student', $student_id)->first();
        $surveylink = Surveylink::query()->latest()->first();
        // ดึงข้อมูล User ด้วย student_id
        $user = User::where('student_id', $student_id)->first();
        $department = department::where('ID', 1)->first();

        $contact = Contart_info::where('ID_student', $student_id)->paginate(2);
        $education = Education_infom::where('ID_student', $student_id)->orderby('endyear','asc')->paginate(2);
        $Workhistory = Workhistory_info::where('ID_student', $student_id)->paginate(3);
        $Skill_info = Skill_info::where('ID_student', $student_id)->paginate(3);
        $language_skill = language_skill::where('ID_student', $student_id)->paginate(1);
        $Tranning_info = Tranning_info::where('ID_student', $student_id)->paginate(2);


        $countone = Contart_info::where('attention', 'like', '%งานพบประสังสรรค์%')->first();
        $counttwo = Contart_info::where('attention', 'like', '%งานวิชาการ%')->first();
        $countthree = Contart_info::where('attention', 'like', '%งานแข่งขันกีฬา%')->first();
        $countfour = Contart_info::where('attention', 'like', '%กิจกรรมศิษย์เก่าสัมพันธ์%')->first();
        $countOthers = Contart_info::whereNotNull('attention')
        ->where(function ($query) {
            $query->where('attention', 'not like', '%งานพบประสังสรรค์%')
                ->orWhere('attention', 'not like', '%งานวิชาการ%')
                ->orWhere('attention', 'not like', '%งานแข่งขันกีฬา%')
                ->orWhere('attention', 'not like', '%กิจกรรมศิษย์เก่าสัมพันธ์%');
        })
        ->first();
        if ($countOthers !== null) {
        $countOthers->attention = str_replace('งานพบประสังสรรค์','',$countOthers->attention);
        $countOthers->attention = str_replace('งานวิชาการ','',$countOthers->attention);
        $countOthers->attention = str_replace('งานแข่งขันกีฬา','',$countOthers->attention);
        $countOthers->attention = str_replace('กิจกรรมศิษย์เก่าสัมพันธ์','',$countOthers->attention);
        $countOthers->attention = trim($countOthers->attention);
        }
        
        return view('users.accsettinguser', compact('contactInfo', 'user', 'education_infom',
         'Workhistory_info', 'contact', 'education', 'Workhistory','Skill_info','language_skill',
         'Skill','language','Tranning_info','Tranning','surveylink','department','countone','counttwo','countthree','countfour','countOthers'));
    }
    public function store(Request $request)
    {
        $student_id = Auth::user()->student_id;

        // ตรวจสอบว่ามีข้อมูลด้วย student_id หรือไม่
        $existingContact = Contart_info::where('ID_student', $student_id)->first();

        if ($existingContact) {
            // มีข้อมูลอยู่แล้ว ทำการอัปเดตข้อมูล
            $this->updateExistingContact($existingContact, $request);
        } else {
            // ไม่มีข้อมูล ทำการเพิ่มข้อมูลใหม่
            $this->createNewContact($student_id, $request);
        }

        // บันทึกข้อมูลของ User
        if ($request->isMethod('post')) {
            $user = $request->all();
            $id = $request->input('id');
            User::where(['id' => $id])->update(['firstname' => $user['firstname'], 'lastname' => $user['lastname']]);
        }
        return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
    }

    public function updateExistingContact($existingContact, $request)
    {
        $image = $request->file('image_profile');
        $prefix = $request->input('prefix');
        $categoryall = $request->input('categoryall');
        $category1 = $request->input('category1');
        $category2 = $request->input('category2');
        $category3 = $request->input('category3');
        $category4 = $request->input('category4');
        $email = $request->input('email');
        $Line = $request->input('Line');
        $Facebook = $request->input('Facebook');
        $Tel = $request->input('Tel');
        $Instagram = $request->input('Instagram');
        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;

            // บันทึกข้อมูล
            $upload_location = 'public/image/profileuser/';
            $full_path = $upload_location . $img_name;
            

            // ลบไฟล์รูปเก่า
            Storage::delete($existingContact->image);

            // ย้ายไฟล์รูปใหม่ไปยัง storage/app/public/image/profileuser/
            $image->storeAs('public/image/profileuser', $img_name);

            $existingContact->image = $img_name;
        }
        $status_contact = $request['status_contact'] == 'true' ? 1 : 0;
        $existingContact->prefix = $prefix;
        $existingContact->ID_email = $email;
        $existingContact->ID_line = $Line;
        $existingContact->ID_facebook = $Facebook;
        $existingContact->telephone = $Tel;
        $existingContact->ID_instagram = $Instagram;
        $existingContact->status_contact = $status_contact;
        $existingContact->ID_student = Auth::user()->student_id;

        if ($categoryall == null) {
            if ($category1 == null && $category2==null&&$category3==null&&$category4==null) {
                $existingContact->save();
            }else
            {
                $existingContact->attention = $category1 . ' ' . $category2 . ' ' . $category3 . ' ' . $category4;
            }
        } else {
            $existingContact->attention = $category1 . ' ' . $category2 . ' ' . $category3 . ' ' . $category4 . ' ' . $categoryall;
        }

        $existingContact->save();
        if ($existingContact !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติส่วนตัว");
            
        }
    }

    public function createNewContact($student_id, $request)
    {
        if ($request->hasFile('image_profile')) {
        $image = $request->file('image_profile');
        $prefix = $request->input('prefix');
        $categoryall = $request->input('categoryall');
        $category1 = $request->input('category1');
        $category2 = $request->input('category2');
        $category3 = $request->input('category3');
        $category4 = $request->input('category4');
        $email = $request->input('email');
        $Line = $request->input('Line');
        $Facebook = $request->input('Facebook');
        $Tel = $request->input('Tel');
        $Instagram = $request->input('Instagram');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        // บันทึกไฟล์รูปใหม่ไปยัง storage/app/public/image/profileuser/
        $image->storeAs('public/image/profileuser', $img_name);
        } else {
            $img_name = null;
            return redirect()->back()->with('error', "กรุณาเพิ่มรูปโปรไฟล์");
        }
        // บันทึกข้อมูล
        $upload_location = 'public/image/profileuser/';
        $full_path = $upload_location . $img_name;
        $status_contact = $request['status_contact'] == 'on' ? 1 : 0;
        $Contart_info = new Contart_info();
        $Contart_info->image = $img_name;
        $Contart_info->prefix = $prefix;
        $Contart_info->ID_email = $email;
        $Contart_info->ID_line = $Line;
        $Contart_info->ID_facebook = $Facebook;
        $Contart_info->telephone = $Tel;
        $Contart_info->ID_instagram = $Instagram;
        $Contart_info->status_contact = $status_contact;
        $Contart_info->ID_student = $student_id;

        if ($categoryall == null) {
            $Contart_info->attention = $category1 . ' ' . $category2 . ' ' . $category3 . ' ' . $category4;
        } else {
            $Contart_info->attention = $category1 . ' ' . $category2 . ' ' . $category3 . ' ' . $category4. ' ' . $categoryall;
        }
        $Contart_info->save();
        if ($Contart_info !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', "อัปเดตประวัติส่วนตัวเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติส่วนตัว");
            
        }
    }
}

       
        
        
        


