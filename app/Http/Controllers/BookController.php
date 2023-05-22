<?php

namespace App\Http\Controllers;
use App\Enums\BookTypeEnum;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules\Enum;

class BookController extends Controller
{
    function index(){
        $books=Book::all();
        foreach ($books as $book){
            $book->user_name=(User::where('id',$book->user_id)->get())[0]->name;
            $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');
            $index=0;
            foreach ($genre_ides as $genre_id){
                $genre_name[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->name;
                $index++;
            }
            $book->genres=$genre_name;
        }
        return view('book.index',compact('books'));
    }

    function create(){
        $types=BookTypeEnum::cases();
        $users=User::all();
        $genres=Genre::all();
        return view('book.create',compact('users','genres','types'));
    }

    function store(){

        $data=request()->validate([
            'name'=>'required|string|unique:books',
            'type'=>'string',
            'user_id'=>'integer',
            'genre_id'=>'required'
        ]);

        $genre_ids=$data['genre_id'];

        unset($data['genre_id']);

        $book=Book::create($data);
        $book->genres()->attach($genre_ids);
        return redirect()->route('book.index');
    }
    function show(Book $book){
        $book->user_name=(User::where('id',$book->user_id)->get())[0]->name;
        $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');
        $genre_name=[];
        $index=0;
        foreach ($genre_ides as $genre_id){
            $genre_name[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->name;
            $index++;
        }

        $book->genres=$genre_name;
        return view('book.show',compact('book'));
    }
    function edit(Book $book){
        $types=BookTypeEnum::cases();
        $users=User::all();
        $genres=Genre::all();
        $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');
        $genre_array=[];
        $index=0;
        foreach ($genre_ides as $genre_id){
            $genre_array[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->id;
            $index++;
        }

        return view('book.edit',compact('book','types','users','genres','genre_array'));
    }
    function update(Book $book){

        $data=request()->validate([
            'name'=>['string','unique:books'],
            'type'=>'string',
            'user_id'=>'integer',
            'genre_id'=>''
        ]);

        $genre_ids=$data['genre_id'];
        unset($data['genre_id']);
        $book->update($data);
        $book->genres()->sync($genre_ids);
        return redirect()->route('book.show',$book->id);
    }
    function destroy(Book $book){
        Book_Genre::where('book_id',$book->id)->delete();
        $book->delete();
        return redirect()->route('book.index');
    }


    function search(){

        $data=request()->validate([
            'search_book'=>'string'
        ]);
        $key=$data["search_book"];
        $books=Book::where('name','LIKE',"%$key%")->get();

        foreach ($books as $book){
            $book->user_name=(User::where('id',$book->user_id)->get())[0]->name;
            $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');
            $index=0;
            foreach ($genre_ides as $genre_id){
                $genre_name[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->name;
                $index++;
            }
            $book->genres=$genre_name;
        }
        return view('book.index',compact('books'));

    }
}
