<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\newsandactivity;
class HomeUserController extends Controller
{
    public function homeuser(Request $request)
    {
        $query = newsandactivity::query();
        $search = $request->input('search');
        $gender = $request->gender;

        $query->where('title_name', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('created_at', 'LIKE', "%{$search}%");
        
        $newsandactivity = $query->paginate(4);
        return view('users.home', compact('newsandactivity'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
