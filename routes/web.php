<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ProfileController;
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
    return view('dashboard');
})->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('games', GameController::class);
    Route::resource('movies', MovieController::class);
    Route::resource('books', BookController::class);
    Route::resource('tags', TagController::class);
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');

require __DIR__.'/auth.php';
