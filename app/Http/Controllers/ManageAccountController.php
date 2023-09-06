<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LoginHistory;
use App\Models\User;
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

        
        
        $users = $query
            ->select('id','student_id', 'firstname', 'lastname', 'educational_status','inviteby','student_grp','role_acc','created_at','active','email','graduatesem','groupleader')
            ->where('role_acc', 'student','teacher')
            ->paginate(10);
            
            $user_id = Auth::user()->id;
            $loginHistory = LoginHistory::find($user_id);
            $login_at = isset($loginHistory) ? $loginHistory->login_at : null;
            
        return view('Admin.manage.manage_account',compact('users','login_at'));
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
        $delete= User::find($id)->delete();
        return redirect()->back()->with('alert','ลบผู้ใช้งานเรียบร้อย');
    }  

 
 
}
