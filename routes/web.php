<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerify;
use App\Http\Controllers\googleController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PostController::class,'homepage'])->name('home');



Route::get('/auth/google/redirect',[googleController::class,'redirect'])->name('google.redirect');
Route::get('/auth/google/callback',[googleController::class,'callback']);

Route::middleware('guest')->group(function(){
    //login routes
    Route::view('/login','auth.login')->name('view.login');
    Route::post('/login',[AuthController::class,'login'])->name('login');

    Route::get('/forgot-password',[PasswordResetController::class,'reset_request'])->name('password.request');
    //register routes
    Route::view('/register','auth.register')->name('view.register');
    Route::post('/register',[AuthController::class,'register'])->name('register');
    //reset password
    Route::post('/forgot-password',[PasswordResetController::class,'send_reset_request'])->name('password.email');
    Route::get('/reset-password/{token}',[PasswordResetController::class,'view_reset'])->name('password.reset');
    Route::post('/reset-password',[PasswordResetController::class,'update_password'])->name('password.update');
});


Route::middleware('auth')->group(function(){
    //logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    //email verify
    Route::get('/verify-email',[EmailVerify::class,'verification_view'])->name('verification.notice');
    Route::post('/verify-email',[EmailVerify::class,'sendverifivation'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('/email/verification/{id}/{hash}',[EmailVerify::class,'verify_email'])->name('verification.verify');
    Route::view('/set-password','auth.set-password')->name('view.set-password');
    Route::post('/set-password',[googleController::class,'set_password'])->name('set.password');
    //Posts
    Route::resource('post',PostController::class)->middleware('verified');
    //views
    Route::view('/profile','user.profile')->middleware('verified')->name('view.profile');
    //user
    Route::post('/profile/delete',[UserController::class,'delete'])->name('delete');
    Route::post('/profile/update',[UserController::class,'update_email_username'])->name('update');
    Route::post('/profile/update-password',[UserController::class,'update_password'])->name('update-password');
});
