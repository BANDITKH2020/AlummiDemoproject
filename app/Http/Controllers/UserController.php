<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\Education_infom;
use App\Models\language_skill;
use App\Models\LoginHistory;
use App\Models\Massage;
use App\Models\newsandactivity;
use App\Models\reward;
use App\Models\Skill_info;
use App\Models\Surveylink;
use App\Models\Tranning_info;
use App\Models\User;
use App\Models\Workhistory_info;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\department;
class UserController extends Controller
{
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
        $messages = Massage::orderBy('created_at', 'desc')->get()->groupBy(function ($message) {
            return $message->created_at->format('Y-m-d'); // แยกตามวันที่
        });
        $messages = $messages->map(function ($groupedMessages, $date) {
            $thaiDate = Carbon::parse($date)->addYears(543)->locale('th')->isoFormat('LL');
            return ['date' => $thaiDate,'messages' => $groupedMessages];
        });
        $surveylink = Surveylink::query()->latest()->first();
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('users.studentslist',compact('students','surveylink','messages','LoginHistory','department','contactInfo'));
    }
    public function viewProfile($id){
        $user = User::find($id);
        $student_id = $user->student_id;
        $contactInfo = Contart_info::where('ID_student', $student_id)->first();
        $education_infom = Education_infom::where('ID_student', $student_id)->paginate(1);
        $Workhistory_info = Workhistory_info::where('ID_student', $student_id)->paginate(1);
        $Skill_info = Skill_info::where('ID_student', $student_id)->paginate(1);
        $language_skill = language_skill::where('ID_student', $student_id)->paginate(1);
        $Trainings = Tranning_info::where('ID_student', $student_id)->paginate(1);
        $reward = reward::where('student_id', $student_id)->paginate(1);
        return view('users.viewProfile',compact('user','contactInfo','education_infom','Workhistory_info','Skill_info','language_skill','Trainings','reward'));
    }
}
