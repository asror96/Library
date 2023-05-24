<?php
namespace App\Http\Controllers\Book;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Book\FilterRequest;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use App\Models\User;

class IndexController extends BaseController
{

    function __invoke(FilterRequest $request)
    {
        $books=[];
        $data=$request->validated();
        $filter=app()->make(BookFilter::class,['queryParams'=>array_filter($data)]);
        if(isset($data['user_id'])){
            $books=Book::filter($filter)->get()->sortBy('name');
        }
        else if(isset($data['genre_id'])){

            $books_ids=Book_Genre::filter($filter)->get('book_id');

            $index=0;
           foreach ($books_ids as $book_id){
               $books[$index]=(Book::where('id',$book_id->book_id)->get())[0];

               $index++;
           }
        }
        else{
            $books=Book::all()->sortBy('name');
        }
        $books=$this->service->index($books);

        $genres=Genre::all();
        $users=User::all();

        return view('book.index',compact('books','genres','users','data'));
    }
}
