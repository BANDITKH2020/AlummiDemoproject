<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\newsandactivity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function accountsettinguser()
    {
        $newsandactivity=newsandactivity::paginate(3);
        return view('users.accountsettinguser',compact('newsandactivity'));
    }
}
