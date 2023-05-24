<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Book\BaseController;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use App\Models\User;

class IndexController extends Controller
{

    function __invoke()
    {
       return view('admin');
    }
}
