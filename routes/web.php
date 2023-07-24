<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('/pressrelease', [HomeController::class, 'pressrelease'])->name('pressrelease');
Route::get('/studentlist', [HomeController::class, 'studentlist'])->name('studentlist');
Route::get('/graduatehouse', [HomeController::class, 'graduatehouse'])->name('graduatehouse');
Route::get('/awardannounce', [HomeController::class, 'awardannounce'])->name('awardannounce');

