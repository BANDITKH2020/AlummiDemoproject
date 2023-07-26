<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function pressrelease()
    {
        return view('pressrelease');
    }

    public function studentlist()
    {
        return view('studentlist');
    }
    public function graduatehouse()
    {
        return view('graduatehouse');
    }
    public function awardannounce()
    {
        return view('awardannounce');
    }
    public function accountsetting()
    {
        return view('accountsetting');
    }
    public function contacthistory()
    {
        return view('contacthistory');
    }
    
}
