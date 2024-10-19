<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\businessController;
use App\Http\Controllers\fundBusinessController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/fund', function () {
    return view('fundPage');
})->name('fund');

Route::get('/startBusiness', function () {
    return view('startBusinessPage');
})->name('startBusiness');



Route::middleware(['guest'])->group(function () {
// return view page
Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/login', [loginController::class, 'showLoginPage'])->name('login');
Route::post('/register', [registerController::class, 'accountRegister'])->name('accountRegister');
Route::post('/login', [loginController::class,'accountLogin'])->name('accountLogin');
});

Route::middleware(['auth'])->group(function () {
// post data to database
Route::get('/fundBusiness', [fundBusinessController::class,'showFundBusiness'])->name('fundBusiness');
Route::get('/changePassword', [ForgetPasswordController::class,'showChangePassword'])->name('changePassword');
route::get('/fundBusiness/category/{category}', [fundBusinessController::class,'showByCategory'])->name('FundByCategory');

Route::post('/startBusiness', [businessController::class, 'store'])->name('startBusiness.store');
Route::post('/logout', [loginController::class, 'accountLogout'])->name('accountLogout');
});
