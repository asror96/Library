<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookRequest;
use App\Http\Requests\Book\FilterRequest;
use App\Http\Resources\API\BookResource;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    public function getBookArray(BookRequest $request){
        $data=$request->validated();
        $page=$data['page']??1;
        $perPage=$data['per_page']??10;
        $books=Book::paginate($perPage,['*'],'page',$page);
        return BookResource::collection($books);
    }

    public function getBook(BookRequest $request){
        $data=$request->validated();

        $book=(Book::where('id',$data['id'])->get())[0];
        return new BookResource($book);
    }

    public function update(BookRequest $request){
        $data=$request->validated();
        $book=(Book::where('id',$data['id'])->get())[0];
        Log::notice('Update book',[$book->id,'to',$data]);
        if(isset($book)&&$book->user_id==auth()->user()->id){
            if (isset($data['name'])){
                $book->name=$data['name'];
            }
            if (isset($data['type'])) {
                $book->type=$data['type'];
            }
            $book->save();
            return new BookResource($book);
        }
        else{
            return response()->json('Problem with updated books!',500);
        }
    }

    public function delete(BookRequest $request){
        $data=$request->validated();
        $book=(Book::where('id',$data['id'])->get())[0];
        if(isset($book)&&$book->user_id==auth()->user()->id){

            $books_genres=Book_Genre::where('book_id',$data['id'])->get();
            foreach ($books_genres as $books_genre){
                $books_genre->delete();
            }
            $book->delete();
            return response()->json('Book is delete',200);
        }
        return response()->json('Problem with deleted books',500);
    }
}
