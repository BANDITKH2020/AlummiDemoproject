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
                    $query->where('student_id', 'LIKE', "%{$search}%")
                        ->orWhere('firstname', 'LIKE', "%{$search}%")
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
                case 'graduatesem':
                    $query->where('graduatesem', 'LIKE', "%{$search}%");
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
                    ->paginate(10);
            
            
        return view('Admin.manage.manage_account',compact('users'));
    }
    public function update(Request $request, $id) 
    { 
        if ($request->isMethod('post')) {
            $user = $request->all();
            $activeValue = $user['active'] == 'true' ? 1 : 0;
            User::where(['id'=>$id])->update(['student_id'=>$user['student_id'],'firstname'=>$user['firstname'],'lastname'=>$user['lastname'],'student_grp'=>$user['student_grp'],'groupleader'=>$user['groupleader'],'active'=>$activeValue]);
            return redirect()->back()->with('alert',"บันทึกข้อมูลเรียบร้อย");  
        }

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
        return redirect()->back()->with('alert','ลบผู้ใช้งานเรียบร้อย');
    }  

 
 
}
