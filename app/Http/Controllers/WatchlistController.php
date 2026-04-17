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
            'status' => session('status'),
            'watchlist' => Watchlist::where('user_id', $request->user()->id)
                ->paginate(10)],
        );
    }

    //add movie
    public function store(Request $request){
        //verify if exists register in db
        $exists = Watchlist::where('user_id', $request->user()->id)
            ->where('imdb_id', $request->imdb_id);

        if($exists->count()){
            return redirect()->back()->with('status', 'Already exists.');
        }

        //save movie in db
        Watchlist::create([
            'user_id' => $request->user()->id,
            'imdb_id' => $request->imdb_id,
            'poster' => $request->poster,
            'title' => $request->title,
            'year' => $request->year,
        ]);

        return redirect()->back()->with('status', 'Watchlist added!');
    }

    //remove movie
    public function destroy(Request $request){
        Watchlist::destroy($request->movieId);
        return redirect()->back()->with('status', 'Movie Removed!');
    }
}
