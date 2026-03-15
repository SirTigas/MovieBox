<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;

route::inertia('/', 'Home')->name('home');

//Movie search
route::get('/movie', SearchController::class)->name('movie.search');

//Movie Detail
route::get('/movie-detail/{movieID}', [searchController::class, 'searchMovieDetail'])->name('movie.detail');
