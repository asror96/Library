<?php

namespace App\Http\Controllers\Book;
use App\Enums\BookTypeEnum;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
class EditController extends BaseController
{
    function __invoke(Book $book)
    {
        $genre_array= $this->service->genre_array($book);
        $types=BookTypeEnum::cases();
        $users=User::all();
        $genres=Genre::all();
        return view('book.edit',compact('book','types','users','genres','genre_array'));
    }
}
