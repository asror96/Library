<?php
namespace App\Http\Controllers\Book;
use App\Http\Requests\Book\SearchRequest;
class SearchController extends BaseController
{
    function __invoke(SearchRequest $request)
    {
        $data=$request->validated();
        $books=$this->service->search($data);
        return view('book.index',compact('books'));
    }
}
