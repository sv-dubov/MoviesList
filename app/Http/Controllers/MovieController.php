<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieSaveRequest;
use App\Models\Genre;
use App\Models\Movie;
use App\Services\MovieImageService;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected MovieImageService $movieImageService;

    public function __construct(MovieImageService $movieImageService)
    {
        $this->movieImageService = $movieImageService;
    }

    public function index()
    {
        $movies = Movie::with('genres')->latest()->get();
        return view('admin.movies.index', ['movies' => $movies]);
    }

    public function create()
    {
        $genres = Genre::select('id', 'name')->get();
        return view('admin.movies.create', compact('genres'));
    }

    public function store(MovieSaveRequest $request)
    {
        $data = $request->validated();
        $movie = Movie::create($data);
        $movie->genres()->attach($request->genres);
        $this->movieImageService->uploadImage($movie, $request->validated()['poster'] ?? []);
        return redirect()->route('movies.index')->with('status', 'Movie created!');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::select('id', 'name')->get();
        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function update(MovieSaveRequest $request, $id)
    {
        $data = $request->validated();
        $movie = Movie::findOrFail($id);
        if ($request->has('poster')) {
            $this->movieImageService->removeImage($movie->poster);
        }
        $movie->update($data);
        $movie->genres()->sync((array)$request->input('genres'));
        $this->movieImageService->uploadImage($movie, $request->validated()['poster'] ?? []);
        return redirect()->route('movies.index')->with('status', 'Movie updated!');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $this->movieImageService->removeImage($movie->poster);
        $movie->delete();
        return redirect()->route('movies.index')->with('status', 'Movie deleted!');
    }

    public function status($id)
    {
        $movie = Movie::find($id);
        $movie->toggleStatus();
        return redirect()->back();
    }
}
