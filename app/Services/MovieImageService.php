<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieImageService
{
    protected Movie $movie;

    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    public function uploadImage(Movie $movie, $poster)
    {
        if ($poster == null) {
            return;
        }

        $filename = Str::random(10) . '.' . $poster->extension();
        $poster->storeAs('public/uploads/movies', $filename);
        $movie->poster = $filename;
        $movie->save();
    }

    public function removeImage($poster)
    {
        if ($poster != null) {
            Storage::delete('public/uploads/movies/' . $poster);
        }
    }
}
