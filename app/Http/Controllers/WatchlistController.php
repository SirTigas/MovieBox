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
        //validate fields
        $fields = $request->validate([
            'imdb_id' => 'required|string|max:20|alpha_num',
            'title' => 'required|string|max:200',
            'poster' => 'nullable|url|max:500',
            'year' => 'nullable|digits:4|integer',
        ]);

        //verify if exists register in db
        $exists = Watchlist::where('user_id', $request->user()->id)
            ->where('imdb_id', $request->imdb_id);

        if($exists->count()){
            return redirect()->back()->with('status', 'Already exists.');
        }

        //save movie in db
        Watchlist::create($fields);

        return redirect()->back()->with('status', 'Watchlist added!');
    }

    //remove movie
    public function destroy(Request $request){
        $item = Watchlist::where('user_id', $request->user()->id)
            ->where('imdb_id', $request->imdb_id);
        $item->delete();

        return redirect()->back()->with('status', 'Movie Removed!');
    }
}
