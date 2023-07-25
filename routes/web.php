<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthControllerAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use Laravel\Socialite\Facades\Socialite;


Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

//admin
    Route::get('/adminregister', [AuthControllerAdmin::class, 'adminregister'])->name('adminregister');
    Route::post('/adminregister', [AuthControllerAdmin::class, 'adminregisterPost'])->name('adminregister');
    Route::get('/adminlogin', [AuthControllerAdmin::class, 'adminlogin'])->name('adminlogin');
    Route::post('/adminlogin', [AuthControllerAdmin::class, 'adminloginPost'])->name('adminlogin');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/homeadmin', [AuthControllerAdmin::class, 'homeadmin']);
    Route::delete('/logout', [AuthControllerAdmin::class, 'logout'])->name('logout');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/welcome', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/pressrelease', [HomeController::class, 'pressrelease'])->name('pressrelease');
Route::get('/studentlist', [HomeController::class, 'studentlist'])->name('studentlist');
Route::get('/graduatehouse', [HomeController::class, 'graduatehouse'])->name('graduatehouse');
Route::get('/awardannounce', [HomeController::class, 'awardannounce'])->name('awardannounce');
Route::get('/accountsetting', [HomeController::class, 'accountsetting'])->name('accountsetting');
Route::get('/contacthistory', [HomeController::class, 'contacthistory'])->name('contacthistory');

