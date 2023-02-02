@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="mt-1 mb-4">
                <a class="btn btn-success" href="{{ route('movies.index') }}">{{ __('Movies list') }}</a>
            </div>
            <h1>{{$movie->title}}</h1>
            <div class="mt-1 mb-4">
                @foreach ($movie->genres as $singleGenre)
                    <span class="badge bg-secondary">{{ $singleGenre->name }}</span>
                @endforeach
            </div>
            <div class="mt-1 mb-4">
                <img src="{{$movie->getPoster()}}" alt="{{$movie->title}} poster" class="img-fluid mt-4 mb-4"/>
            </div>
            <div class="mt-1 mb-4">
                <p class="fs-13 text-muted">{{$movie->created_at->format('d M Y H:i')}}</p>
            </div>
            <div class="mt-1 mb-4">
                @if($movie->is_published == 1)
                    <a href="{{ route('movies.status', $movie->id) }}">
                        <span class="badge bg-danger">Unpublish</span>
                    </a>
                @else
                    <a href="{{ route('movies.status', $movie->id) }}">
                        <span class="badge bg-success">Publish</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection
