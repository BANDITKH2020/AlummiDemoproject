<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contart_info;
use App\Models\department;
use App\Models\Massage;
use App\Models\reward;
use App\Models\Surveylink;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class RewardUserController extends Controller
{
    public function reward(Request $request)
    {
        $query = reward::query();
        $search = $request->input('search');
        $searchdata = $request->searchdata;

    // Apply search filters
    if (!empty($search)) {
        switch ($searchdata) {
            case 'all':
                $query->where('student_id', 'LIKE', "%{$search}%")
                    ->orWhere('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('year', 'LIKE', "%{$search}%")
                    ->orWhere('organizer', 'LIKE', "%{$search}%")
                    ->orWhere('award_name', 'LIKE', "%{$search}%")
                    ->orWhere('amount', 'LIKE', "%{$search}%");
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
            case 'year':
                $query->where('year', 'LIKE', "%{$search}%");
                break;
            case 'organizer':
                $query->where('organizer', 'LIKE', "%{$search}%");
                break;   
            case 'award_name':
                $query->where('award_name', 'LIKE', "%{$search}%");
                break;
            case 'amount':
                $query->where('amount', 'LIKE', "%{$search}%");
                break;    
        }
    }
        $reward = $query->paginate(3);
        $surveylink = Surveylink::query()->first();
        $messages = Massage::orderBy('created_at', 'desc')->get()->groupBy(function ($message) {
            return $message->created_at->format('Y-m-d'); // แยกตามวันที่
        });
        $messages = $messages->map(function ($groupedMessages, $date) {
            $thaiDate = Carbon::parse($date)->addYears(543)->locale('th')->isoFormat('LL');
            return ['date' => $thaiDate,'messages' => $groupedMessages];
        });
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('users.reward',compact('reward','surveylink','messages','department','contactInfo'));
    }
}
