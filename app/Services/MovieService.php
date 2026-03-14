<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MovieService {

    //Performs query on the API
    public function getMovies(string $title): array
    {
        $response = Http::get("http://www.omdbapi.com/", [
            "apikey" => config('services.omdb.key'),
            's' => $title,
        ]);

        $data = $response->json();

        if (($data['Response'] ?? 'False') === 'False'){
            return [];
        }
        return $data["Search"] ?? [];
    }
}
