<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('loginPage');
});
Route::get('/register', function () {
    return view('registerPage');
});

Route::get('/about', function() {
    return view('about');
});

Route::post('/post', [PostController::class, 'post'])->name('post');

Route::get('/login', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/register', [loginController::class, 'showLoginPage'])->name('login');
// Route::post('/registration', [registerController::class, 'register']);
