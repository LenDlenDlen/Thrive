<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\fundBusinessController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::middleware(['guest'])->group(function () {
// return view page
Route::get('/register', [registerController::class, 'showRegisterPage'])->name('register');
Route::get('/login', [loginController::class, 'showLoginPage'])->name('login');
Route::post('/register', [registerController::class, 'accountRegister'])->name('accountRegister');
Route::post('/login', [loginController::class,'accountLogin'])->name('accountLogin');

});

Route::middleware(['auth'])->group(function () {
// post data to database
route::get('/fundBusiness', [fundBusinessController::class,'showFundBusiness'])->name('Fund');
route::get('/changePassword', [ForgetPasswordController::class,'showChangePassword'])->name('changePassword');

Route::post('/logout', [loginController::class, 'accountLogout'])->name('accountLogout');
});
