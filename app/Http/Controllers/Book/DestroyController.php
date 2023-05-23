<?php

namespace App\Http\Controllers\Book;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Book_Genre;
class DestroyController extends Controller
{
    function __invoke(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
