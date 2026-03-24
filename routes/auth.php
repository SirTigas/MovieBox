<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::middleware('guest')->group(function () {
    route::inertia('/register', 'Auth/Register')->name('register');
    route::post('/register', [RegisterController::class, 'store']);
});
