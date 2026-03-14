<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    //Returns array of movies
    public function __invoke(Request $request, MovieService $movieService){
        $movies = [];

        if($request->filled('search')){
            $movies = $movieService->getMovies($request->search);
        }

        return Inertia::render('Movies/Movie', [
            'movies' => $movies,
            'filters' => $request->search,
        ]);
    }
}
