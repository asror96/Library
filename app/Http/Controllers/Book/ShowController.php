<?php
namespace App\Http\Controllers\Book;
use App\Models\Book;
class ShowController extends BaseController
{
    function __invoke(Book $book)
    {
        $book=$this->service->show($book);
        return view('book.show',compact('book'));
    }
}
