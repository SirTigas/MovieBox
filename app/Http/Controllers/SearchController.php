<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    //Returns array of movies
    public function searchMovies(Request $request, MovieService $movieService){
        $movies = [];
        $search = $request->search;
        $page = $request->input('page', 1);

        //search movie list
        if($search){
            $movies = $movieService->getMovies($search, $page);
        }

        // return movie list
        return Inertia::render('Movies/Movie', [
            'movies' => $movies,
            'search' => $search,
            'currentPage' => $page,
        ]);
    }

    //Return details about specific movie
    public function searchMovieDetail(Request $request, MovieService $movieService){
        $movieDetails = [];

        if($request->movieID){
            $movieDetails = $movieService->getMovieDetails($request->movieID);
        }

        return Inertia::render('Movies/MovieDetail', [
            'movieDetails' => $movieDetails,
            'status' => session('status'),
        ]);
    }
}
