<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Models\Genre;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('genre.create');
    }
}
