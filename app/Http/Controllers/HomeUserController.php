<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\add_fileMassage;
use App\Models\Contart_info;
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
        $userLoginHistory = LoginHistory::where('user_id', $user->id)->first();
            if ($userLoginHistory) {
                $userLoginHistory->update(['login_at' => now()]);
            }
        $query = newsandactivity::query();
        $searchdata = $request->searchdata;
            switch ($searchdata) {
                case 'all':
                    $query->where('category', 'LIKE', '%งานพบประสังสรรค์%')
                        ->orWhere('category', 'LIKE', '%งานวิชาการ%')
                        ->orWhere('category', 'LIKE', '%งานแข่งขันกีฬา%')
                        ->orWhere('category', 'LIKE', '%กิจกรรมศิษย์เก่าสัมพันธ์%')
                        ->orWhere('category', 'LIKE', '%ข่าวสาร%');
                    break;
                case 'งานพบประสังสรรค์ประจำปี':
                    $query->where('category', 'LIKE', '%งานพบประสังสรรค์%');
                    break;
                case 'อบรมให้ความรู้วิชาการ':
                    $query->where('category', 'LIKE', '%งานวิชาการ%');
                    break;
                case 'งานแข่งขันกีฬาศิษย์เก่าสัมพันธ์':
                    $query->where('category', 'LIKE','%งานแข่งขันกีฬา%');
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
        
        
        
        $department = department::where('ID', 1)->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        return view('users.home', compact('newsandactivity','surveylink','department','contactInfo'));
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
        $surveylink = Surveylink::query()->latest()->first();
        $id = Auth::user()->student_id;
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        $department = department::where('ID', 1)->first();
        return view('users.view',compact('view','contactInfo','surveylink','department'));
    }

    public function viewmassege()
    {   
        $id = Auth::user()->student_id;
        $fileMassage = add_fileMassage::query()->paginate(8);
        $messages = Massage::where('ID_student', $id)->orderBy('created_at', 'desc')->paginate(8);
        $surveylink = Surveylink::query()->latest()->first();
        $contactInfo = Contart_info::where('ID_student', $id)->first();
        $department = department::where('ID', 1)->first();
        return view('users.viewmassege',compact('contactInfo','surveylink','department','messages','fileMassage'));
    }
}
