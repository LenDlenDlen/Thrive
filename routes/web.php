<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;

Route::get('/', function () {
    return view('app');
});

Route::get('/login', function () {
    return view('loginPage');
});
Route::get('/register', function () {
    return view('registerPage');
});

Route::get('/login', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/register', [loginController::class, 'showLoginPage'])->name('login');
// Route::post('/registration', [registerController::class, 'register']);
