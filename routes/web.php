<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthControllerAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/userregister', [AuthController::class, 'userregister'])->name('userregister');
    Route::post('/userregister', [AuthController::class, 'userregisterPost'])->name('userregister');
    Route::get('/userlogin', [AuthController::class, 'userlogin'])->name('userlogin');
    Route::post('/userlogin', [AuthController::class, 'userloginPost'])->name('userlogin');
});

//admin
    Route::get('/adminregister', [AuthControllerAdmin::class, 'adminregister'])->name('adminregister');
    Route::post('/adminregister', [AuthControllerAdmin::class, 'adminregisterPost'])->name('adminregister');
    Route::get('/adminlogin', [AuthControllerAdmin::class, 'adminlogin'])->name('adminlogin');
    Route::post('/adminlogin', [AuthControllerAdmin::class, 'adminloginPost'])->name('adminlogin');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/Admin/homeadmin', [AuthControllerAdmin::class, 'homeadmin']);
    Route::delete('/logout', [AuthControllerAdmin::class, 'logout'])->name('logout');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');


Route::get('/User/homeuser', [UserController::class, 'homeuser'])->name('homeuser'); // หน้าข่าว
Route::get('/User/studentlist', [UserController::class, 'studentlist'])->name('studentlist'); // หน้ารายชื่อนักศึกษา
Route::get('/User/graduatehouse', [UserController::class, 'graduatehouse'])->name('graduatehouse'); // ทำเนียบ
Route::get('/User/awardannounce', [UserController::class, 'awardannounce'])->name('awardannounce'); // รางวัลประกาศ
Route::get('/User/accountsetting', [UserController::class, 'accountsetting'])->name('accountsetting'); // ตั้งค่าโปรไฟล์
Route::get('/User/contacthistory', [UserController::class, 'contacthistory'])->name('contacthistory'); // ประวัติการติดต่อ

