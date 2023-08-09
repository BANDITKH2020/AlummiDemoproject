<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\newsandactivity;
class HomeUserController extends Controller
{
    public function homeuser()
    {
        $query = newsandactivity::query();
        $newsandactivity = $query->paginate(3);
        return view('users.home', compact('newsandactivity'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
