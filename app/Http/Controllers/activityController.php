<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class activityController extends Controller
{
    public function index(){
        return view('admin.activity.index');
    }
    public function saveactivitys(){
        return view('admin.activity.saveactivity');
    }
}
