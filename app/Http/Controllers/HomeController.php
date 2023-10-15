<?php

namespace App\Http\Controllers;

use App\Models\LoginHistory;
use App\Models\newsandactivity;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->active == 0) {
            Auth::logout();
            return redirect()->route('loginAdmin')->with('error', 'บัญชีของคุณถูกปิดการใช้งาน');
        }
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
        //หน้าแรก admin
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
    
    
        $newsandactivity = $query->paginate(4);
        return view('Admin.home', compact('newsandactivity'));
    }
    public function welcome()
    {
        return view('welcomeproject');
    }
    public function view($id)
    {
        $view = newsandactivity::with('images')->find($id);
        return view('Admin.view',compact('view'));
    }
    
    
    
}
