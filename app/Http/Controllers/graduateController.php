<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Massage;
use App\Models\Surveylink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class graduateController extends Controller
{
    public function graduate(Request $request)
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
        
        return view('Admin.graduate.graduate', compact('users'));
        

    }
    public function graduateuser(Request $request)
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
        return view('users.graduate', compact('users','surveylink','messages'));
        

    }
}
