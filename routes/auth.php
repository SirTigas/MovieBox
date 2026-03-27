<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;


Route::middleware('guest')->group(function () {
    //Register
    route::get('/register', [RegisterController::class, 'index'])->name('register');
    route::post('/register', [RegisterController::class, 'store']);

    //Login
    route::get('/login', [AuthController::class, 'index'])->name('login');
    route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    //Logout
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Email verify
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'] )->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'] )->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');
});
