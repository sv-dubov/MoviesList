<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreSaveRequest;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', ['genres' => $genres]);
    }

    public function create()
    {
        return view('admin.genres.create');
    }

    public function store(GenreSaveRequest $request)
    {
        $data = $request->validated();
        Genre::create($data);
        return redirect()->route('genres.index')->with('status', 'Genre created!');
    }

    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('admin.genres.edit', ['genre' => $genre]);
    }

    public function update(GenreSaveRequest $request, $id)
    {
        $data = $request->validated();
        $genre = Genre::findOrFail($id);
        $genre->update($data);
        return redirect()->route('genres.index')->with('status', 'Genre updated!');
    }

    public function destroy($id)
    {
        Genre::findOrFail($id)->delete();
        return redirect()->route('genres.index')->with('status', 'Genre deleted!');
    }
}
