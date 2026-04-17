<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Watchlist extends Model
{
    //
    Protected $fillable = [
        'user_id',
        'imdb_id',
        'title',
        'poster',
        'year',
    ];

    //relationship
    public function user(){
        return $this->belongsTo(User::class);
    }
}
