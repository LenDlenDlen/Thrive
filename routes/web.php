<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\businessController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\fundBusinessController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\Post;

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/fund', function () {
    return view('fundPage');
})->name('fund');

Route::get('/yourBusiness', function () {
    return view('yourBusiness');
})->name('yourBusiness');



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
Route::get('/startBusiness', [businessController::class, 'show'])->name('startBusiness');
Route::post('/startBusiness', [businessController::class, 'store'])->name('startBusiness.store');
Route::post('/logout', [loginController::class, 'accountLogout'])->name('accountLogout');
Route::get('/yourBusiness', [businessController::class, 'showBusinessList'])->name('yourBusiness');
Route::get('/business/{id}/images', [businessController::class, 'getBusinessImages']);

Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::post('posts/{post}/reply', [CommentController::class, 'store'])->name('comment.store');
});
