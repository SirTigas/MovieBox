<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Type\Integer;

class MovieService {

    //Performs query on the API
    public function getMovies(string $title, Int $page = 1): array
    {
        $response = Http::get("https://www.omdbapi.com/", [
            "apikey" => config('services.omdb.key'),
            's' => $title,
            'page' => $page,
        ]);

        $data = $response->json();

        return $data['Response'] == 'True' ? $data : [];
    }

    public function getMovieDetails(string $movieID): array{
        $response = Http::get("https://www.omdbapi.com/", [
            "i" => $movieID,
            "apikey" => config('services.omdb.key'),
        ]);

        $data = $response->json();

        if (($data['Response'] ?? 'False') === 'False'){
            return [];
        }

        return $data ?? [];
    }
}
