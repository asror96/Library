<?php
namespace App\Http\Controllers\Genre;
use App\Http\Controllers\Controller;
use App\Models\Genre;

class DestroyController extends Controller
{
    public function __invoke(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
