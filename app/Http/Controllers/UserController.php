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
    public function studentslist()
    {   
        $query = User::query();
        $students = User::select('users.id', 'users.student_id', 'users.firstname', 'users.lastname', 'users.educational_status', 'users.inviteby', 'users.student_grp', 'users.role_acc', 'users.created_at', 'users.active', 'users.email', 'users.graduatesem', 'users.groupleader', 'contart_infos.image')
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
        $surveylink = Surveylink::query()->first();
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
