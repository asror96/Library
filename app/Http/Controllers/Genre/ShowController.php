<?php
namespace App\Http\Controllers\Genre;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class ShowController extends Controller
{
    public function __invoke(Genre $genre)
    {
        return view('genre.show',compact('genre'));
    }
}
