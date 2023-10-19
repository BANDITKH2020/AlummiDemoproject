<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status(Request $request)
    {
        $query = User::query();

        $search = $request->input('search');
        $searchdata = $request->searchdata;
        if (!empty($search)) {
            switch ($searchdata) {
                case 'all':
                    $query->where('student_id', 'LIKE', "%{$search}%")
                        ->orWhere('firstname', 'LIKE', "%{$search}%")
                        ->orWhere('lastname', 'LIKE', "%{$search}%")
                        ->orWhere('graduatesem', 'LIKE', "%{$search}%")
                        ->orWhere('student_grp', 'LIKE', "%{$search}%")
                        ->orwhere('Term', 'LIKE', "%{$search}%")
                        ->orWhere('educational_status', 'LIKE', "%{$search}%");
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
                case 'graduatesem':
                    $query->where('graduatesem', 'LIKE', "%{$search}%");
                    break;
                case 'Term':
                    $query->where('Term', 'LIKE', "%{$search}%");
                    break;
                case 'student_grp':
                    $query->where('student_grp', 'LIKE', "%{$search}%");
                    break;
                case 'educational_status':
                    $query->where('educational_status', 'LIKE', "%{$search}%");
                     break;
            }
        }
        $users = $query
                ->select('id','student_id','firstname', 'lastname', 'educational_status', 'graduatesem','student_grp')
                ->where('role_acc', 'student')
                ->paginate(10);
        return view('Admin.student.status',compact('users'));
    }
    public function graduatesem_up(Request $request)
    {
        $request->validate(
            [
                'graduatesem' => 'required',
                'Term'=>'required'
            ], 
            [
                'graduatesem.required'=>"กรุณาป้อนปีการศึกษาที่จบ",
                'Term.required'=>"กรุณาป้อนภาคเรียน"
            ]
        );
        $selectedIds = explode(',', $request->input('selectedIds')); // แปลงเป็นแอร์เรย์
        $graduatesem = $request->input('graduatesem');
        $Term = $request->input('Term');
        
        $user = User::whereIn('id', $selectedIds)
        ->update(['graduatesem' => $graduatesem,
        'educational_status' => 'จบการศึกษา','Term' => $Term]);
        if ($user === 0) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการปรับสถานะภาพ');
            
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('alert', 'ปรับสถานะสำเร็จ');
        }
        if ($user !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert', 'ปรับสถานะสำเร็จ');
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการปรับสถานะภาพ');
        }
    }
    public function Editstatus(Request $request)
    {
        $request->validate(
            [
                'graduatesem' => 'required',
            ], 
            [
                'graduatesem.required'=>"กรุณาป้อนปีการศึกษาที่จบเพื่อแก้ไข",
            ]
        );
        $graduatesem = $request->input('graduatesem');
        $user = User::where('graduatesem', 'like', "%{$graduatesem}%")->get();

        if ($user->isNotEmpty()) {
            // ถ้ามีผู้ใช้ที่ตรงกับเงื่อนไขค้นหา
            $user->each(function ($u) {
                $u->update([
                    'educational_status' => 'กำลังศึกษา',
                    'Term' => '-',
                ]);
            });

            return redirect()->back()->with('alert', 'ปรับสถานะสำเร็จ');
        } else {
            // ถ้าไม่มีผู้ใช้ที่ตรงกับเงื่อนไขค้นหา
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการปรับสถานะภาพ');
        }

    }
}
