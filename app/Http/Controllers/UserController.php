<?php

namespace App\Http\Controllers;

use App\Models\newsandactivity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function homeuser()
    {   $newsandactivity=newsandactivity::paginate(3);
        return view('User.homeuser',compact('newsandactivity'));
    }
    public function accountsettinguser()
    {
        $newsandactivity=newsandactivity::paginate(3);
        return view('User.accountsettinguser',compact('newsandactivity'));
    }


}
