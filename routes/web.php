<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('genres', GenreController::class)->except('show')->parameters(['genre' => 'id']);
Route::resource('movies', MovieController::class)->parameters(['movie' => 'id']);
Route::get('/movies/toggle/{id}', [MovieController::class, 'status'])->name('movies.status');
