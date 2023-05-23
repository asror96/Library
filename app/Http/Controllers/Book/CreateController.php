<?php

namespace App\Http\Controllers\Book;
use App\Enums\BookTypeEnum;
use App\Models\Genre;
use App\Models\User;
class CreateController extends BaseController
{
    function __invoke()
    {
        $types=BookTypeEnum::cases();
        $users=User::all();
        $genres=Genre::all();
        return view('book.create',compact('users','genres','types'));
    }
}
