<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Illuminate\Http\Request;

class NewsandActivitiesController extends Controller
{
    public function index(){
        $newsandactivity = newsandactivity::paginate(3);
        return view('admin.new.index',compact('newsandactivity'));
    }
    public function savenews(){
        return view('admin.new.savenews');
    }
   
}
