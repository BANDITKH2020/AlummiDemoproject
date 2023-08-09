<?php

use App\Http\Controllers\activityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsandActivitiesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\surveylinkController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthControllerAdmin;
use App\Http\Controllers\HomeController;


use App\Http\Controllers\UserRegisterController;


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/userregister', [AuthController::class, 'userregister'])->name('userregister');
    Route::get('/userlogin', [AuthController::class, 'userlogin'])->name('userlogin');

});

//ลงทะเบียน
Route::get('auth/google/register', [RegisterController::class, 'registergoogleRedirect']);
Route::get('auth/google/callback', [RegisterController::class, 'registerWithGoogle']);
//เข้าสู่ระบบ
Route::get('auth/google', [LoginController::class, 'googleRedirect']);
Route::get('auth/google/callback', [LoginController::class, 'loginWithGoogle']);
//admin
    Route::get('/adminregister', [AuthControllerAdmin::class, 'adminregister'])->name('adminregister');
    Route::post('/adminregister', [AuthControllerAdmin::class, 'adminregisterPost'])->name('adminregister');
    Route::get('/adminlogin', [AuthControllerAdmin::class, 'adminlogin'])->name('adminlogin');
    Route::post('/adminlogin', [AuthControllerAdmin::class, 'adminloginPost'])->name('adminlogin');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/Admin/homeadmin', [AuthControllerAdmin::class, 'homeadmin']);
    Route::get('/User/homeuser', [UserController::class,'homeuser'])->name('homeuser');
    Route::get('/User/accountsettinguser', [UserController::class,'accountsettinguser'])->name('accountsettinguser');
    Route::delete('/logout', [AuthControllerAdmin::class, 'logout'])->name('logout');
});

Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');





Route::post('/userregister', [UserRegisterController::class, 'register'])->name('register');
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
