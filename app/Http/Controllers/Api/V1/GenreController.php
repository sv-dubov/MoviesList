<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\GenreMovieResource;
use App\Http\Resources\GenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genresList()
    {
        return GenreResource::collection(Genre::all());
    }

    public function moviesByGenre($genre_id)
    {
        return GenreMovieResource::collection(Genre::with('movies')->where('id', '=', $genre_id)->paginate(10));
    }
}
