<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function homeuser(){
        return view('User.homeuser');
    }
    function studentlist(){
        return view('User.studentlist');
    }
    function graduatehouse(){
        return view('User.graduatehouse');
    }
    function awardannounce(){
        return view('User.awardannounce');
    }
    function accountsetting(){
        return view('User.accountsetting');
    }
    function contacthistory(){
        return view('User.contacthistory');
    }
}
