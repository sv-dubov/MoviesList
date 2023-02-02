@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1>Genres</h1>
            <div class="mt-1 mb-4">
                <a class="btn btn-success" href="{{ route('genres.create') }}">{{ __('Add genre') }}</a>
            </div>
            <div class="table-responsive-md">
                <table class="table table-bordered">
                    <thead>
                    <tr class="text-center">
                        <th scope="col">
                            Id
                        </th>
                        <th scope="col">
                            Name
                        </th>
                        <th scope="col">
                            Created at
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
                    @foreach ($genres as $genre)
                        <tr class="text-center">
                            <th scope="row">
                                {{$genre->id}}
                            </th>
                            <td class="text-start">
                                {{$genre->name}}
                            </td>
                            <td>
                                {{$genre->created_at->format('d M Y H:i')}}
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('genres.edit', $genre->id) }}">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('genres.destroy', $genre->id) }}" method="POST"
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
