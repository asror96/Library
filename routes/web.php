<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::prefix('admin')->group(function () {
    Route::get('', [UserController::class,'index'])->name('admin.index');

    Route::get('/genres', [GenreController::class,'index'])->name('genre.index');
    Route::get('/genres/create', [GenreController::class,'create'])->name('genre.create');
    Route::post('/genres', [GenreController::class,'store'])->name('genre.store');
    Route::get('/genres/{genre}', [GenreController::class,'show'])->name('genre.show');
    Route::get('/genres/{genre}/edit', [GenreController::class,'edit'])->name('genre.edit');
    Route::patch('/genres/{genre}', [GenreController::class,'update'])->name('genre.update');
    Route::delete('/genres/{genre}', [GenreController::class,'destroy'])->name('genre.delete');

    Route::get('/books', [BookController::class,'index'])->name('book.index');
    Route::get('/books/create', [BookController::class,'create'])->name('book.create');
    Route::post('/books', [BookController::class,'store'])->name('book.store');
    Route::get('/books/{book}', [BookController::class,'show'])->name('book.show');
    Route::get('/books/{book}/edit', [BookController::class,'edit'])->name('book.edit');
    Route::patch('/books/{book}', [BookController::class,'update'])->name('book.update');
    Route::delete('/books/{book}', [BookController::class,'destroy'])->name('book.delete');
});


