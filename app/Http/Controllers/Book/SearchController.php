<?php
namespace App\Http\Controllers\Book;
use App\Http\Requests\Book\SearchRequest;
use App\Models\Book;
use App\Models\Genre;
use App\Models\User;

class SearchController extends BaseController
{
    function __invoke(SearchRequest $request)
    {
        $data=$request->validated();

        if (isset($data['search_book'])){
            $books=Book::where('name','like',"%{$data["search_book"]}%")->get();
            dd($books);
        }
        else{
            $books=Book::all();
        }

        $books=$this->service->search($books);
        $genres=Genre::all();
        $users=User::all();
        return view('book.index',compact('books','genres','users'));
    }
}
