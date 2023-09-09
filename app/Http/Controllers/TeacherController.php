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
        /*$userLoginHistory = LoginHistory::where('user_id', $user->id)->first();
            if ($userLoginHistory) {
                $userLoginHistory->update(['login_at' => now()]);
            }*/
        $query = newsandactivity::query();
        $search = $request->input('search');
        $gender = $request->gender;

    // Apply search filters
   
        $query->where('title_name', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('created_at', 'LIKE', "%{$search}%");
       
    
        $surveylink = Surveylink::query()->first();
        $newsandactivity = $query->paginate(4);
        
        $messages = Massage::orderBy('created_at', 'desc')->get()->groupBy(function ($message) {
            return $message->created_at->format('Y-m-d'); // แยกตามวันที่
        });
        $messages = $messages->map(function ($groupedMessages, $date) {
            $thaiDate = Carbon::parse($date)->addYears(543)->locale('th')->isoFormat('LL');
            return ['date' => $thaiDate,'messages' => $groupedMessages];
        });
        $id = Auth::user()->id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        $department = department::where('ID', 1)->first();
        return view('teacher.home', compact('newsandactivity','surveylink','messages','department','contactInfo'));
    }
    public function studentslist()
    {   
        $query = User::query();
        $student = $query
            ->select('id','student_id', 'firstname', 'lastname', 'educational_status','inviteby','student_grp','role_acc','created_at','active','email','graduatesem','groupleader')
            ->whereIn('role_acc', ['student', 'teacher'])
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
        $id = Auth::user()->id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('teacher.studentslist',compact('student','surveylink','messages','LoginHistory','department','contactInfo'));
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
            ->select('student_id', 'firstname', 'lastname', 'graduatesem')
            ->where('role_acc', 'student')
            ->where('educational_status', 'จบการศึกษา')
            ->paginate(10);
        $surveylink = Surveylink::query()->first();
        $messages = Massage::orderBy('created_at', 'desc')->get()->groupBy(function ($message) {
            return $message->created_at->format('Y-m-d'); // แยกตามวันที่
        });
        $messages = $messages->map(function ($groupedMessages, $date) {
            $thaiDate = Carbon::parse($date)->addYears(543)->locale('th')->isoFormat('LL');
            return ['date' => $thaiDate,'messages' => $groupedMessages];
        });
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('teacher.graduate', compact('users','surveylink','messages','department','contactInfo'));
    }
}
