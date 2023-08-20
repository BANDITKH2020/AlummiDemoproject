<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\reward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function reward()
    {
        $query = reward::query();
        $reward = $query->paginate(3);
        return view('Admin.reward.reward',compact('reward'));
    }
    public function savereward()
    {
        return view('Admin.reward.savereward');
    }
    public function edit($id)
    {   $reward = reward::find($id);
        return view('Admin.reward.editreward',compact('reward'));
    }
    public function store(Request $request){
        //ตรวจสอบข้อมูล
        $request->validate(
            [
                'student_id'=>'required',
                'firstname'=>'required',
                'lastname'=>'required',
                'year'=>'required',
                'organizer'=>'required',
                'award_name'=>'required',
                'amount'=>'required',
                'reward_type'=>'required',
            ],
            [
                'student_id.required'=>"กรุณากรอกรหัสนักศึกษา",
                'firstname.required'=>"กรุณากรอกชื่อนักศึกษา",
                'lastname.required'=>"กรุณากรอกนามสกุลนักศึกษา",
                'year.required'=>"กรุณาปีการศึกษาที่จบนักศึกษา",
                'organizer.required'=>"กรุณากรอกชื่อผู้จัด",
                'award_name.required'=>"กรุณากรอกชื่อทุน/รางวัล",
                'amount.required'=>"กรุณากรอกมูลค่าทุน/อันดับ",
                'reward_type.required'=>"กรุณากรอกประเภทรางวัล",
            ]
        );
        
        reward::insert([
            'student_id'=>$request->student_id,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'year'=>$request->year,
            'organizer'=>$request->organizer,
            'award_name'=>$request->award_name,
            'amount'=>$request->amount,
            'reward_type'=>$request->reward_type,
            'created_at'=>Carbon::now()
        ]);

        return redirect()->route('reward')->with('alert',"บันทึกข้อมูลเรียบร้อย");
    }
    public function update(Request $request, $id){
        $request->validate(
            [
                'student_id'=>'required',
                'firstname'=>'required',
                'lastname'=>'required',
                'year'=>'required',
                'organizer'=>'required',
                'award_name'=>'required',
                'amount'=>'required',
                'reward_type'=>'required',
            ],
            [
                'student_id.required'=>"กรุณากรอกรหัสนักศึกษา",
                'firstname.required'=>"กรุณากรอกชื่อนักศึกษา",
                'lastname.required'=>"กรุณากรอกนามสกุลนักศึกษา",
                'year.required'=>"กรุณาปีการศึกษาที่จบนักศึกษา",
                'organizer.required'=>"กรุณากรอกชื่อผู้จัด",
                'award_name.required'=>"กรุณากรอกชื่อทุน/รางวัล",
                'amount.required'=>"กรุณากรอกมูลค่าทุน/อันดับ",
                'reward_type.required'=>"กรุณากรอกประเภทรางวัล",
            ]
        );

        if ($request->isMethod('post')) {
            $reward = $request->all();
            reward::where(['id'=>$id])->update(['student_id'=>$reward['student_id'],'firstname'=>$reward['firstname'],
            'lastname'=>$reward['lastname'],'year'=>$reward['year'],
            'organizer'=>$reward['organizer'],'award_name'=>$reward['award_name'],
            'amount'=>$reward['amount'],'reward_type'=>$reward['reward_type']]);
            return redirect()->route('reward')->with('alert',"แก้ไขข้อมูลเรียบร้อย");
        }
     
        
    }
        public function delete($id){
        //ลบข้อมูลฐาน
        $delete= reward::find($id)->delete();
        return redirect()->back()->with('alert','ลบข้อมูลเรียบร้อย');
    } 
}
