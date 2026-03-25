<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthController;

Route::middleware('guest')->group(function () {
    route::get('/register', [RegisterController::class, 'index'])->name('register');
    route::post('/register', [RegisterController::class, 'store']);

    route::get('/login', [AuthController::class, 'index'])->name('login');
    route::post('/login', [AuthController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
