<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

route::inertia('/', 'Home')->name('home');

route::middleware('guest')->group(function () {
    route::get('/movie', SearchController::class)->name('movie.search');
});
