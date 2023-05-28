<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'api','prefix' => 'auth'],function ($router) {
    Route::post('login', [\App\Http\Controllers\API\AuthController::class,'login']);
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
Route::group(['middleware'=>'jwt.auth'],function (){
    Route::patch('/updateBook',[\App\Http\Controllers\API\BookController::class,'update']);
    Route::delete('/deleteBook',[\App\Http\Controllers\API\BookController::class,'delete']);
    Route::patch('/updateUser',[\App\Http\Controllers\API\UserController::class,'update']);
});
Route::get('/getBookArray',[\App\Http\Controllers\API\BookController::class,'getBookArray']);
Route::post('/getBook',[\App\Http\Controllers\API\BookController::class,'getBook']);
Route::get('/getAuthorArray',[\App\Http\Controllers\API\UserController::class,'getAuthorArray']);
Route::post('/getAuthor',[\App\Http\Controllers\API\UserController::class,'getAuthor']);

Route::get('/getGenreArray',[\App\Http\Controllers\API\GenreController::class,'getGenreArray']);
