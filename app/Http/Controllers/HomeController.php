<?php

namespace App\Http\Controllers;

use App\Models\newsandactivity;
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
        //หน้าแรก admin
        $query = newsandactivity::query();
        $search = $request->input('search');
        $gender = $request->gender;

    // Apply search filters
   
     $query->where('title_name', 'LIKE', "%{$search}%")
     ->orWhere('category', 'LIKE', "%{$search}%")
     ->orWhere('created_at', 'LIKE', "%{$search}%");
       
    
    
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
    public function graduate()
    {
        return view('Admin.graduate.graduate');
    }
}
