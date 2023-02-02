@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="h4">Create genre</h1>
            <div class="mt-1 mb-4">
                <a class="btn btn-success" href="{{ route('genres.index') }}">{{ __('Genres list') }}</a>
            </div>
            <form method="POST" action="{{ route('genres.store') }}">
                @csrf
                @method('POST')
                <div class="col-md-6">
                    <label for="title" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" name="name"
                           value="{{ old('name') }}">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </form>
        </div>
    </div>
@endsection
