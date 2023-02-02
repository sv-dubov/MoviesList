@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Movies</h1>
            <div class="mt-1 mb-4">
                <a class="btn btn-success" href="{{ route('movies.create') }}">{{ __('Add movie') }}</a>
            </div>
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">
                            Id
                        </th>
                        <th scope="col">
                            Title
                        </th>
                        <th scope="col">
                            Genre
                        </th>
                        <th scope="col">
                            Change status
                        </th>
                        <th scope="col">
                            Show
                        </th>
                        <th scope="col">
                            Edit
                        </th>
                        <th scope="col">
                            Delete
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($movies as $movie)
                        <tr class="text-center">
                            <th scope="row">
                                {{$movie->id}}
                            </th>
                            <td class="text-start">
                                {{$movie->title}}
                            </td>
                            <td>
                                @foreach ($movie->genres as $singleGenre)
                                    <span class="badge bg-secondary">{{ $singleGenre->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($movie->is_published == 1)
                                    <a href="{{ route('movies.status', $movie->id) }}">
                                        <span class="badge bg-danger">Unpublish</span>
                                    </a>
                                @else
                                    <a href="{{ route('movies.status', $movie->id) }}">
                                        <span class="badge bg-success">Publish</span>
                                    </a>
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-info" href="{{ route('movies.show', $movie->id) }}">Show</a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST"
                                      onsubmit="return confirm('{{ trans('Are you sure?') }}');"
                                      style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
