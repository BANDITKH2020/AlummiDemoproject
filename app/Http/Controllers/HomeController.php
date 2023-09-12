<?php

namespace App\Http\Controllers;

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
        //หน้าแรก admin
        $query = newsandactivity::query();
        $search = $request->input('search');
        $gender = $request->gender;

        // Apply search filters
   
        $query->where('title_name', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('created_at', 'LIKE', "%{$search}%");
       
    
    
        $newsandactivity = $query->paginate(10);
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
