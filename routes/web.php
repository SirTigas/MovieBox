<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WatchlistController;

route::inertia('/', 'Home')->name('home');

//Movie search
route::get('/movie', [SearchController::class, 'searchMovies'])->name('movie.search');

//Movie Detail
route::get('/movie-detail/{movieID}', [searchController::class, 'searchMovieDetail'])->name('movie.detail');

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    route::get('/watchlist', [WatchlistController::class, 'index'])->name('watchlist');
    route::post('/watchlist', [WatchlistController::class, 'store'])->name('watchlist.store');
    route::delete('/watchlist', [WatchlistController::class, 'destroy'])->name('watchlist.destroy');
});
