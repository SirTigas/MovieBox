<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ProfileEditController;
use App\Http\Controllers\Auth\PasswordConfirmationController;


Route::middleware('guest')->group(function () {
    //Register
    route::get('/register', [RegisterController::class, 'index'])->name('register');
    route::post('/register', [RegisterController::class, 'store']);

    //Login
    route::get('/login', [AuthController::class, 'index'])->name('login');
    route::post('/login', [AuthController::class, 'store']);

    //Forgot password
    route::get('/forgot-password', [ForgotPasswordController::class, 'requestPassword'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmail'] )->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'resetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
});

Route::middleware('auth')->group(function () {
    //Logout
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //Email verify
    Route::get('/email/verify', [EmailVerificationController::class, 'notice'] )->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'handler'] )->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationController::class, 'resend'])->middleware('throttle:6,1')->name('verification.send');

    //Profile
    Route::get('/profile', [ProfileEditController::class, 'index'])->name('profile.edit');
    Route::post('/profile/update/email', [ProfileEditController::class, 'updateEmail'])->middleware('password.confirm')->name('profile.update.email');

    //Password Confirmation
    Route::get('/confirm-password', [PasswordConfirmationController::class, 'create'])->name('password.confirm');
    Route::post('/confirm-password', [PasswordConfirmationController::class, 'store'])->middleware('throttle:6,1');
});
