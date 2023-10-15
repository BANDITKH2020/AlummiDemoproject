<?php

namespace App\Http\Controllers;

use App\Events\UserDeleted;
use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\Education_infom;
use App\Models\language_skill;
use App\Models\LoginHistory;
use App\Models\Skill_info;
use App\Models\Tranning_info;
use App\Models\User;
use App\Models\Workhistory_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ManageAccountController extends Controller
{
    public function manage(Request $request)
    {
        $query = User::query();

        $search = $request->input('search');
        $searchdata = $request->searchdata;

        if (!empty($search)) {
            switch ($searchdata) {
                case 'all':
                    $query->Where('firstname', 'LIKE', "%{$search}%")
                        ->orWhere('lastname', 'LIKE', "%{$search}%")
                        ->orWhere('graduatesem', 'LIKE', "%{$search}%")
                        ->orWhere('student_grp', 'LIKE', "%{$search}%")
                        ->orWhere('active', $search);   
                    break;
                case 'firstname':
                    $query->where('firstname', 'LIKE', "%{$search}%");
                    break;
                case 'lastname':
                    $query->where('lastname', 'LIKE', "%{$search}%");
                    break;
                case 'role_acc':
                    if ($search === 'อาจารย์' || $search === 'teacher') {
                        $search = 'teacher';
                    } elseif ($search === 'ผู้ดูแลระบบ' || $search === 'Admin') {
                        $search = 'Admin';
                    }elseif ($search === 'ศิษย์เก่า' || $search === 'student'){
                        $search = 'student';
                    }
                    $query->where('role_acc', $search);
                    break;
                case 'student_grp':
                    $query->where('student_grp', 'LIKE', "%{$search}%");
                    break;
                case 'active':
                    // Convert search value 'true' or 'false' to 1 or 0
                    if ($search === 'เปิด' || $search === '1') {
                        $search = 1;
                    } elseif ($search === 'ปิด' || $search === '0') {
                        $search = 0;
                    }
                    $query->where('active', $search);
                    break;    
            }
        

                $users = $query->paginate(10); // แบ่งหน้าโดยแสดง 10 รายการต่อหน้า
                return view('Admin.manage.manage_account',compact('users'));
        }

        
        
            
            $users = $query->select('users.id', 'users.student_id', 'users.firstname', 'users.lastname', 'users.educational_status', 'users.inviteby', 'users.student_grp', 'users.role_acc', 'users.created_at', 'users.active', 'users.email', 'users.graduatesem', 'users.groupleader', 'login_histories.login_at')
                    ->whereIn('users.role_acc', ['student', 'teacher','Admin'])
                    ->leftJoin('login_histories', 'users.id', '=', 'login_histories.user_id')
                    ->orderBy('login_at', 'desc')
                    ->paginate(10);
            
            
        return view('Admin.manage.manage_account',compact('users'));
    }
    public function update(Request $request, $id) 
{ 
    if ($request->isMethod('post')) {
        $userInput = $request->all();
        $activeValue = $userInput['active'] == 'true' ? 1 : 0;

        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'ไม่พบผู้ใช้ที่คุณต้องการแก้ไข');
        }

        $user->student_id = $userInput['student_id'];
        $user->firstname = $userInput['firstname'];
        $user->lastname = $userInput['lastname'];
        $user->student_grp = $userInput['student_grp'];
        $user->groupleader = $userInput['groupleader'];
        $user->active = $activeValue;
        
        if ($user->save()) {
            return redirect()->back()->with('alert', 'บันทึกข้อมูลเรียบร้อย');
        } else {
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
        }
    }

    // Handle cases when the request is not a POST request, if needed.
}

    public function delete($id){
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->with('alert', 'ไม่พบผู้ใช้งาน');
        }
        $student_id = $user->student_id;
        Contart_info::where('ID_student', $student_id)->delete();
        Education_infom::where('ID_student', $student_id)->delete();
        Workhistory_info::where('ID_student', $student_id)->delete();
        Skill_info::where('ID_student', $student_id)->delete();
        language_skill::where('ID_student', $student_id)->delete();
        Tranning_info::where('ID_student', $student_id)->delete();
        $user->delete();
        if ($user !== false) {
            // กระทำเมื่อข้อมูลถูกสร้างขึ้นใหม่
            return redirect()->back()->with('alert',"ลบผู้ใช้งานเรียบร้อย");  
        } else {
            // กระทำเมื่อข้อมูลมีอยู่แล้วในฐานข้อมูล
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการลบผู้ใช้งาน');
        }
    }  

 
 
}
