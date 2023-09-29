<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Workhistory_info;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkhistoryInfoController extends Controller
{
    public function store(Request $request)
    {
        
        $ID_student = Auth::user()->student_id;
        $startdate_m = $request->input('startdate_m');
        $startdate_y = $request->input('startdate_y');
        $startdate=$startdate_m.'-'.$startdate_y;
        $enddate_m = $request->input('enddate_m');
        $enddate_y = $request->input('enddate_y');
        $enddate_end=$enddate_m.'-'.$enddate_y;//
        $enddate = $request->input('enddate');
        $Company_name = $request->input('Company_name');
        $position = $request->input('position');
        $salary = $request->input('salary');
        $Company_add = $request->input('Company_add');
        $desctiption = $request->input('desctiption') ?? '-';
        $worktype = $request->input('worktype');
        $startdate = Carbon::createFromFormat('m-Y', $startdate)->format('Y-m-d');
        $enddate_end = Carbon::createFromFormat('m-Y', $enddate_end)->format('Y-m-d');
        if ($enddate === 'on') {
            $now = Carbon::now();
            $thaiYear = $now->addYears(543)->format('m-Y'); 
            $parsedDate = Carbon::createFromFormat('m-Y', $thaiYear)->format('Y-m-d');
            $Workhistory_info = Workhistory_info::insert([
                'ID_student'=>$ID_student,
                'startdate'=>$startdate,
                'enddate'=>$parsedDate,
                'Company_name'=>$Company_name,
                'position'=>$position,
                'salary'=>$salary,
                'Company_add'=>$Company_add,
                'desctiption'=>$desctiption,
                'worktype'=>$worktype,
                'created_at'=>Carbon::now()
            ]);  
            if ($Workhistory_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', "อัปเดตประวัติการทำงานเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติการทำงาน");
                
            }
        }else
        {
            $Workhistory_info =  Workhistory_info::insert([
                'ID_student'=>$ID_student,
                'startdate'=>$startdate,
                'enddate'=>$enddate_end,
                'Company_name'=>$Company_name,
                'position'=>$position,
                'salary'=>$salary,
                'Company_add'=>$Company_add,
                'desctiption'=>$desctiption,
                'worktype'=>$worktype,
                'created_at'=>Carbon::now()
            ]); 
            if ($Workhistory_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', "อัปเดตประวัติการทำงานเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติการทำงาน");
                
            }
        }
        
        
    }
    public function update(Request $request, $id){

        
        $ID_student = Auth::user()->student_id;
        $id = $request->input('id');
        $startdate_m = $request->input('startdate_m');
        $startdate_y = $request->input('startdate_y');
        $startdate=$startdate_m.'-'.$startdate_y;
        $enddate_m = $request->input('enddate_m');
        $enddate_y = $request->input('enddate_y');
        $enddate_end=$enddate_m.'-'.$enddate_y;//
        $enddate = $request->input('enddate');
        $Company_name = $request->input('Company_name');
        $position = $request->input('position');
        $salary = $request->input('salary');
        $Company_add = $request->input('Company_add');
        $desctiption = $request->input('desctiption') ?? '-';
        $worktype = $request->input('worktype');
        $startdate = Carbon::createFromFormat('m-Y', $startdate)->format('Y-m-d');
        $enddate_end = Carbon::createFromFormat('m-Y', $enddate_end)->format('Y-m-d');
        if ($enddate === 'on') {
            $now = Carbon::now();
            $thaiYear = $now->addYears(543)->format('m-Y'); 
            $parsedDate = Carbon::createFromFormat('m-Y', $thaiYear)->format('Y-m-d');
            $Workhistory_info =  Workhistory_info::find($id)->update([
                'ID_student'=>$ID_student,
                'startdate'=>$startdate,
                'enddate'=>$parsedDate,
                'Company_name'=>$Company_name,
                'position'=>$position,
                'salary'=>$salary,
                'Company_add'=>$Company_add,
                'desctiption'=>$desctiption,
                'worktype'=>$worktype,
                
            ]);  
            if ($Workhistory_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', "อัปเดตประวัติการทำงานเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติการทำงาน");
                
            }
        }else
        {
            $Workhistory_info =  Workhistory_info::find($id)->update([
                'ID_student'=>$ID_student,
                'startdate'=>$startdate,
                'enddate'=>$enddate_end,
                'Company_name'=>$Company_name,
                'position'=>$position,
                'salary'=>$salary,
                'Company_add'=>$Company_add,
                'desctiption'=>$desctiption,
                'worktype'=>$worktype,
                
            ]); 
            if ($Workhistory_info !== false) {
                // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
                return redirect()->back()->with('alert', "อัปเดตประวัติการทำงานเรียบร้อย");
            } else {
                // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
                return redirect()->back()->with('error', "เกิดข้อผิดพลาดในการอัพเดตประวัติการทำงาน");
                
            }
        }
        
        
    }
    public function delete($id){
        
        $delete= Workhistory_info::find($id)->delete();
        if ($delete !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ลบข้อมูลเรียบร้อย');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในลบข้อมูล');
        }
    }
}
