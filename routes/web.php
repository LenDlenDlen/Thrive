<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('loginPage');
});
Route::get('/register', function () {
    return view('registerPage');
});

// return view page
Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/login', [loginController::class, 'showLoginPage'])->name('login');

// post data to database
Route::post('/register', [registerController::class, 'accountRegister'])->name('accountRegister');
Route::post('/login', [loginController::class,'accountLogin'])->name('accountLogin');
