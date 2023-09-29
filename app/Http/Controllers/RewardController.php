<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\reward;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function reward(Request $request)
    {
        $query = reward::query();
        $search = $request->input('search');
        $searchdata = $request->searchdata;

    // Apply search filters
    if (!empty($search)) {
        switch ($searchdata) {
            case 'all':
                $query->where('student_id', 'LIKE', "%{$search}%")
                    ->orWhere('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('year', 'LIKE', "%{$search}%")
                    ->orWhere('organizer', 'LIKE', "%{$search}%")
                    ->orWhere('award_name', 'LIKE', "%{$search}%")
                    ->orWhere('amount', 'LIKE', "%{$search}%");
                break;
            case 'student_id':
                $query->where('student_id', 'LIKE', "%{$search}%");
                break;
            case 'firstname':
                $query->where('firstname', 'LIKE', "%{$search}%");
                break;
            case 'lastname':
                $query->where('lastname', 'LIKE', "%{$search}%");
                break; 
            case 'year':
                $query->where('year', 'LIKE', "%{$search}%");
                break;
            case 'organizer':
                $query->where('organizer', 'LIKE', "%{$search}%");
                break;   
            case 'award_name':
                $query->where('award_name', 'LIKE', "%{$search}%");
                break;
            case 'amount':
                $query->where('amount', 'LIKE', "%{$search}%");
                break;    
        }
    }
        $reward = $query->orderBy('year', 'desc')->paginate(3);
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
        
        $reward = reward::insert([
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
        if ($reward !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->route('reward')->with('alert',"บันทึกข้อมูลเรียบร้อย");
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->route('reward')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
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
            $reward = reward::where(['id'=>$id])->update(['student_id'=>$reward['student_id'],'firstname'=>$reward['firstname'],
            'lastname'=>$reward['lastname'],'year'=>$reward['year'],
            'organizer'=>$reward['organizer'],'award_name'=>$reward['award_name'],
            'amount'=>$reward['amount'],'reward_type'=>$reward['reward_type']]);
            if ($reward !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->route('reward')->with('alert',"บันทึกข้อมูลเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->route('reward')->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            }
        }
    }
        public function delete($id){
        //ลบข้อมูลฐาน
        $delete= reward::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    } 
}
