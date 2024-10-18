<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\businessController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/fund', function () {
    return view('fundPage');
})->name('fund');
Route::get('/startBusiness', function () {
    return view('startBusinessPage');
})->name('startBusiness');

Route::post('/startBusiness', [businessController::class, 'store'])->name('startBusiness.store');


// return view page
Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/login', [loginController::class, 'showLoginPage'])->name('login');
// route::get();

// post data to database
Route::post('/register', [registerController::class, 'accountRegister'])->name('accountRegister');
Route::post('/login', [loginController::class,'accountLogin'])->name('accountLogin');
Route::get('/logout', [loginController::class, 'accountLogout'])->name('accountLogout');
