<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function moviesList()
    {
        return MovieResource::collection(Movie::with('genres')->paginate(10));
    }

    public function movieById($movie_id)
    {
        return MovieResource::collection(Movie::with('genres')->where('id', '=', $movie_id)->get());
    }
}
