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
    public function index()
    {
        //หน้าแรก admin
        $query = newsandactivity::query();
        $newsandactivity = $query->paginate(4);
        return view('Admin.home', compact('newsandactivity'));
    }
    public function welcome()
    {
        return view('welcomeproject');
    }
}
