@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="h4">Create movie</h1>
            <div class="mt-1 mb-4">
                <a class="btn btn-success" href="{{ route('movies.index') }}">{{ __('Movies list') }}</a>
            </div>
            <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="col-md-6 mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="genres" class="form-label">Genre</label>
                    <select id="genres" name="genres[]" class="form-select form-control @error('genres') is-invalid @enderror" multiple>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}">
                                {{ $genre->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('genres')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="poster" class="form-label">Poster</label>
                    <input type="file" class="form-control @error('poster') is-invalid @enderror" id="poster" name="poster">
                    @error('poster')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
