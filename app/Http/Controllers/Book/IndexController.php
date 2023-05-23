<?php

namespace App\Http\Controllers\Book;
class IndexController extends BaseController
{

    function __invoke()
    {
        $books=$this->service->index();
        return view('book.index',compact('books'));
    }
}
