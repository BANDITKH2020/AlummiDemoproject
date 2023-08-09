<?php

use App\Http\Controllers\activityController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\NewsandActivitiesController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\surveylinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcomeproject');
});
Route::get('/welcome', [HomeController::class,'welcome'])->name('welcome');
Auth::routes();
//สมัครAdmin
Route::get('/loginAdmin', [HomeController::class,'index'])->name('index');

//สมัครสมาชิก google
Route::get('auth/google', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);
Route::get('users/login', [SocialController::class, 'login'])->name('login.ris');

//หน้าแรกuser
Route::get('/users/homeuser', [HomeUserController::class, 'homeuser'])->name('homeuser');
Route::get('/User/accountsettinguser', [UserController::class,'accountsettinguser'])->name('accountsettinguser');
//ออกจากระบบ
Route::delete('/logout', [HomeUserController::class, 'logout'])->name('logout');
//---------------------ข่าว-----------------------
Route::get('/new/all', [NewsandActivitiesController::class, 'index'])->name('news');
Route::get('/new/savenews', [NewsandActivitiesController::class, 'savenews'])->name('savenews');
Route::post('/new/savenews/add', [NewsandActivitiesController::class, 'store'])->name('addsavenews');
Route::get('/new/editnews/{id}',[NewsandActivitiesController::class,'edit']);
Route::post('/new/update/{id}',[NewsandActivitiesController::class,'update']);
Route::get('/new/delete/{id}',[NewsandActivitiesController::class,'delete']);
//----------------------กิจกรรม--------------------
Route::get('/activity/all',[activityController::class,'index'])->name('activitys');
Route::get('/activity/saveactivity', [activityController::class, 'saveactivitys'])->name('saveactivitys');
Route::post('/activity/saveactivity/add', [activityController::class, 'store'])->name('addactivitys');
Route::get('/activity/editactivity/{id}',[activityController::class,'edit']);
Route::post('/activity/update/{id}',[activityController::class,'update']);
Route::get('/activity/delete/{id}',[activityController::class,'delete']);
//----------------------จัดการแบบสอบถาม--------------------------------
Route::get('/link/all',[surveylinkController::class,'index'])->name('links');
Route::post('/link/savelink/add', [surveylinkController::class, 'store'])->name('addlinks');
Route::match(['get','post'],'/link/update/{id}',[surveylinkController::class, 'update']);
Route::get('/link/delete/{id}',[surveylinkController::class,'delete']);
Route::get('/search',[surveylinkController::class,'search']);