<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Watchlist;

class WatchlistController extends Controller
{
    //display watchlist page
    public function index(Request $request){
        return Inertia::render('WatchList', [
            'watchlist' => Watchlist::where('user_id', $request->user()->id)
                ->paginate(10)
        ]);
    }

    //add movie
    public function store(Request $request){

    }
}
