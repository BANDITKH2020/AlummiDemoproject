<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\department;
use App\Models\LoginHistory;
use App\Models\Massage;
use App\Models\Surveylink;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\newsandactivity;
use Illuminate\Support\Facades\Session;
class HomeUserController extends Controller
{
    public function homeuser(Request $request)
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
        $department = department::where('ID', 1)->first();
        return view('users.home', compact('newsandactivity','surveylink','messages','department'));
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
    public function view($id)
    {
        $view = newsandactivity::with('images')->find($id);
        $messages = Massage::orderBy('created_at', 'desc')->get()->groupBy(function ($message) {
            return $message->created_at->format('Y-m-d'); // แยกตามวันที่
        });
        $messages = $messages->map(function ($groupedMessages, $date) {
            $thaiDate = Carbon::parse($date)->addYears(543)->locale('th')->isoFormat('LL');
            return ['date' => $thaiDate,'messages' => $groupedMessages];
        });
        $surveylink = Surveylink::query()->first();
        return view('users.view',compact('view'));
    }
   
}
