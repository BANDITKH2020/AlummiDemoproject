<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\LoginHistory;
use App\Models\Massage;
use App\Models\newsandactivity;
use App\Models\Surveylink;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\department;

class TeacherController extends Controller
{
    public function hometeacher(Request $request)
    {
       if (Auth::check()) {
            $user = Auth::user();
            $loginHistory = LoginHistory::updateOrCreate(
                ['user_id' => $user->id],
                ['login_at' => now()]
            );
            
        }
        $userLoginHistory = LoginHistory::where('user_id', $user->id)->first();
            if ($userLoginHistory) {
                $userLoginHistory->update(['login_at' => now()]);
            }
            
        $query = newsandactivity::query();
        $searchdata = $request->searchdata;
            switch ($searchdata) {
                case 'all':
                    $query->where('category', 'LIKE', '%งานพบประสังสรรค์ประจำปี%')
                        ->orWhere('category', 'LIKE', '%อบรมให้ความรู้วิชาการ%')
                        ->orWhere('category', 'LIKE', '%งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์%')
                        ->orWhere('category', 'LIKE', '%กิจกรรมศิษย์เก่าสัมพันธ์%')
                        ->orWhere('category', 'LIKE', '%ข่าวสาร%');
                    break;
                case 'งานพบประสังสรรค์ประจำปี':
                    $query->where('category', 'LIKE', '%งานพบประสังสรรค์ประจำปี%');
                    break;
                case 'อบรมให้ความรู้วิชาการ':
                    $query->where('category', 'LIKE', '%อบรมให้ความรู้วิชาการ%');
                    break;
                case 'งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์':
                    $query->where('category', 'LIKE','%งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์%');
                    break; 
                case 'กิจกรรมศิษย์เก่าสัมพันธ์':
                    $query->where('category', 'LIKE', '%กิจกรรมศิษย์เก่าสัมพันธ์%');
                    break; 
                case 'ข่าวสาร':
                    $query->where('category', 'LIKE', '%ข่าวสาร%');
                    break;        
            }
       
    
        $surveylink = Surveylink::query()->latest()->first();
        $newsandactivity = $query->paginate(4);
        
        
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        $department = department::where('ID', 1)->first();
        return view('teacher.home', compact('newsandactivity','surveylink','department','contactInfo'));
    }
    public function studentslist(Request $request)
    {   
        $query = User::query();
        $search = $request->input('search');
        $searchdata = $request->input('searchdata');
        if ($searchdata === 'all') {
            $query->where(function ($query) use ($search) {
                $query->where('users.firstname', 'like', '%' . $search . '%')
                    ->orWhere('users.lastname', 'like', '%' . $search . '%')
                    ->orWhere('users.student_grp', 'like', '%' . $search . '%')
                    ->orWhere('users.graduatesem', 'like', '%' . $search . '%');
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('education_infoms.School_name', 'like', '%' . $search . '%')
                    ->orWhere('education_infoms.degree', 'like', '%' . $search . '%');
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('workhistory_infos.Company_name', 'like', '%' . $search . '%')
                    ->orWhere('workhistory_infos.position', 'like', '%' . $search . '%');
            })
            ->orWhere(function ($query) use ($search) {
                $query->where('skill_infos.Skill_name', 'like', '%' . $search . '%');
            })
            ->leftJoin('education_infoms', 'users.student_id', '=', 'education_infoms.ID_student')
            ->leftJoin('workhistory_infos', 'users.student_id', '=', 'workhistory_infos.ID_student')
            ->leftJoin('skill_infos', 'users.student_id', '=', 'skill_infos.ID_student');
        }
        elseif ($searchdata === 'firstname') {
            $query->where('users.firstname', 'like', '%' . $search . '%');
        }
        elseif ($searchdata === 'lastname') {
            $query->where('users.lastname', 'like', '%' . $search . '%');

        }
        elseif ($searchdata === 'student_grp') {
            $query->where('users.student_grp', 'like', '%' . $search . '%');

        }
        elseif ($searchdata === 'graduatesem') {
            $query->where('users.graduatesem', 'like', '%' . $search . '%');

        }
        elseif ($searchdata === 'School_name') {
            $query->leftJoin('education_infoms', 'users.student_id', '=', 'education_infoms.ID_student')
                  ->where('education_infoms.School_name', 'like', '%' . $search . '%');

        } elseif ($searchdata === 'degree') {

            $query->leftJoin('education_infoms', 'users.student_id', '=', 'education_infoms.ID_student')
                  ->where('education_infoms.degree', 'like', '%' . $search . '%');

        } elseif ($searchdata === 'Company_name') 
        {
            $query->leftJoin('workhistory_infos', 'users.student_id', '=', 'workhistory_infos.ID_student')
                  ->where('workhistory_infos.Company_name', 'like', '%' . $search . '%');

        } elseif ($searchdata === 'position') 
        {
            $query->leftJoin('workhistory_infos', 'users.student_id', '=', 'workhistory_infos.ID_student')
                  ->where('workhistory_infos.position', 'like', '%' . $search . '%');

        } elseif ($searchdata === 'Skill_name') 
        {
            $query->leftJoin('skill_infos', 'users.student_id', '=', 'skill_infos.ID_student')
                  ->where('skill_infos.Skill_name', 'like', '%' . $search . '%');
        } 
        $students = $query->select('users.id', 'users.student_id', 'users.firstname', 'users.lastname', 'users.educational_status', 'users.inviteby', 'users.student_grp', 'users.role_acc', 'users.created_at', 'users.active', 'users.email', 'users.graduatesem', 'users.groupleader', 'contart_infos.image')
                    ->whereIn('users.role_acc', ['student', 'teacher'])
                    ->leftJoin('contart_infos', 'users.student_id', '=', 'contart_infos.ID_student')
                    ->paginate(10);
        $LoginHistory = LoginHistory::query()->get(); 
        $surveylink = Surveylink::query()->latest()->first();
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('teacher.studentslist',compact('students','surveylink','LoginHistory','department','contactInfo'));
    }

    public function graduate_teacher(Request $request)
    {
        
        $query = User::query();

        $search = $request->input('search');
        $searchdata = $request->searchdata;
        if (!empty($search)) {
            switch ($searchdata) {
                case 'all':
                    $query->where('graduatesem', 'LIKE', "%{$search}%")
                        ->orWhere('student_id', 'LIKE', "%{$search}%")
                        ->orWhere('student_grp', 'LIKE', "%{$search}%")
                        ->orWhere('firstname', 'LIKE', "%{$search}%")
                        ->orWhere('lastname', 'LIKE', "%{$search}%");
                    break;
                case 'graduatesem':
                    $query->where('graduatesem', 'LIKE', "%{$search}%");
                    break;
                case 'student_id':
                    $query->where('student_id', 'LIKE', "%{$search}%");
                    break;
                case 'student_grp':
                    $query->where('student_grp', 'LIKE', "%{$search}%");
                    break;
                case 'firstname':
                    $query->where('firstname', 'LIKE', "%{$search}%");
                    break;
                case 'lastname':
                    $query->where('lastname', 'LIKE', "%{$search}%");
                    break;
            }
        }
        $users = $query
            ->select('student_id', 'firstname', 'lastname', 'graduatesem','Term')
            ->where('role_acc', 'student')
            ->where('educational_status', 'จบการศึกษา')
            ->paginate(7);
        $surveylink = Surveylink::query()->latest()->first();
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('teacher.graduate', compact('users','surveylink','department','contactInfo'));
    }
    public function view($id)
    {
        $view = newsandactivity::with('images')->find($id);
        $surveylink = Surveylink::query()->latest()->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        
        $department = department::where('ID', 1)->first();
        return view('teacher.view',compact('view','contactInfo','surveylink','department'));
    }
}
