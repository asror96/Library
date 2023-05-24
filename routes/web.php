<?php
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

Route::group(['prefix'=>'admin'],function () {
    Route::get('', [\App\Http\Controllers\User\IndexController::class,'__invoke'])->name('admin.index');
    Route::prefix('/genres')->group(function (){
        Route::get('', [\App\Http\Controllers\Genre\IndexController::class,'__invoke'])->name('genre.index');
        Route::get('/create', [\App\Http\Controllers\Genre\CreateController::class,'__invoke'])->name('genre.create');
        Route::post('', [\App\Http\Controllers\Genre\StoreController::class,'__invoke'])->name('genre.store');
        Route::get('/{genre}', [\App\Http\Controllers\Genre\ShowController::class,'__invoke'])->name('genre.show');
        Route::get('/{genre}/edit', [\App\Http\Controllers\Genre\EditController::class,'__invoke'])->name('genre.edit');
        Route::patch('/{genre}', [\App\Http\Controllers\Genre\UpdateController::class,'__invoke'])->name('genre.update');
        Route::delete('/{genre}', [\App\Http\Controllers\Genre\DestroyController::class,'__invoke'])->name('genre.delete');
    });
    Route::prefix('/books')->group(function (){
        Route::get('', [\App\Http\Controllers\Book\IndexController::class,'__invoke'])->name('book.index');
        Route::get('/create', [\App\Http\Controllers\Book\CreateController::class,'__invoke'])->name('book.create');
        Route::post('', [\App\Http\Controllers\Book\StoreController::class,'__invoke'])->name('book.store');
        Route::get('/{book}', [\App\Http\Controllers\Book\ShowController::class,'__invoke'])->name('book.show');
        Route::get('/{book}/edit', [\App\Http\Controllers\Book\EditController::class,'__invoke'])->name('book.edit');
        Route::patch('/{book}', [\App\Http\Controllers\Book\UpdateController::class,'__invoke'])->name('book.update');
        Route::delete('/{book}', [\App\Http\Controllers\Book\DestroyController::class,'__invoke'])->name('book.delete');
        Route::post('/search', [\App\Http\Controllers\Book\SearchController::class,'__invoke'])->name('book.search');
    });
    Route::prefix('/users')->group(function (){
        Route::get('', [\App\Http\Controllers\User\IndexController::class,'__invoke'])->name('user.index');
        Route::get('/create', [\App\Http\Controllers\User\CreateController::class,'__invoke'])->name('user.create');
        Route::post('', [\App\Http\Controllers\User\StoreController::class,'__invoke'])->name('user.store');
        Route::get('{user}', [\App\Http\Controllers\User\ShowController::class,'__invoke'])->name('user.show');
        Route::get('/{user}/edit', [\App\Http\Controllers\User\EditController::class,'__invoke'])->name('user.edit');
        Route::patch('{user}', [\App\Http\Controllers\User\UpdateController::class,'__invoke'])->name('user.update');
        Route::delete('/{user}', [\App\Http\Controllers\User\DestroyController::class,'__invoke'])->name('user.delete');
    });
});


