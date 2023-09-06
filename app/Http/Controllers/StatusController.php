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
            ], 
            [
                'graduatesem.required'=>"กรุณาป้อนชื่อผู้ใช้",
            ]
        );
        $selectedIds = explode(',', $request->input('selectedIds')); // แปลงเป็นแอร์เรย์
        $graduatesem = $request->input('graduatesem');
        
        
        User::whereIn('id', $selectedIds)
        ->update(['graduatesem' => $graduatesem,
        'educational_status' => 'จบการศึกษา']);

        return redirect()->back()->with('alert', 'ปรับสถานะสำเร็จ');
    }
}
