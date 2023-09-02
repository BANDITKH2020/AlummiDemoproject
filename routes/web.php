<?php

use App\Http\Controllers\activityController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeUserController;
use App\Http\Controllers\NewsandActivitiesController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\surveylinkController;
use App\Http\Controllers\TokenController;
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
Route::get('/home', [HomeController::class,'index'])->name('index');
Route::get('/home/view/{id}', [HomeController::class,'view'])->name('view');
//สมัครสมาชิก google
Route::get('auth/google', [SocialController::class, 'googleRedirect']);
Route::get('auth/google/callback', [SocialController::class, 'loginWithGoogle']);
Route::get('users/login', [SocialController::class, 'login'])->name('login.ris');

//หน้าแรกuser
Route::get('/users/homeuser', [HomeUserController::class, 'homeuser'])->name('homeuser');
Route::get('/User/accountsettinguser', [UserController::class,'accountsettinguser'])->name('accountsettinguser');
Route::get('/User/studentslist', [UserController::class,'studentslist'])->name('studentslist');
Route::get('/User/dashboard', [UserController::class,'dashboard'])->name('dashboard');
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
Route::post('/activity/addImage/{id}',[activityController::class,'addImage'])->name('addImage');
//----------------------จัดการแบบสอบถาม--------------------------------
Route::get('/link/all',[surveylinkController::class,'index'])->name('links');
Route::post('/link/savelink/add', [surveylinkController::class, 'store'])->name('addlinks');
Route::match(['get','post'],'/link/update/{id}',[surveylinkController::class, 'update']);
Route::get('/link/delete/{id}',[surveylinkController::class,'delete']);
Route::get('/search',[surveylinkController::class,'search']);
//--------------จัดการโค้ด------------------------
Route::get('/Token/all',[TokenController::class,'viewtoken'])->name('viewtoken');
Route::post('/Admin/Token/save',  [TokenController::class,'store'])->name('admin.code.save');
Route::get('/Token/delete/{id}',[TokenController::class,'delete']);
//---------------ช่องทางการติดต่อ--------------------
Route::get('/contact/rmutt',[ContactController::class,'contact'])->name('contact');
Route::get('/Admin/graduate/view',[HomeController::class,'graduate'])->name('graduate');
//---------------จัดการกิจกรรม-----------------------
Route::get('/Admin/reward/all',[RewardController::class,'reward'])->name('reward');
Route::get('/Admin/reward/savereward',[RewardController::class,'savereward'])->name('savereward');
Route::post('/Admin/reward/savereward/add', [RewardController::class, 'store'])->name('addreward');
Route::get('/Admin/reward/editreward/{id}',[RewardController::class,'edit']);
Route::post('/Admin/reward/update/{id}',[RewardController::class,'update']);
Route::get('/Admin/reward/delete/{id}',[RewardController::class,'delete']);

