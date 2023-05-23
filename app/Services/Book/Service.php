<?php

namespace App\Services\Book;
use App\Models\Book;
use App\Models\Book_Genre;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class Service
{



    public function genre_array(Book $book){
        $genre_array=[];
        $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');

        $index=0;
        foreach ($genre_ides as $genre_id){
            $genre_array[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->id;
            $index++;
        }
        return $genre_array;
    }
    public function index(){
        $books=Book::all()->sortBy('name');
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

        return $books;
    }
    public function search($data){
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
        return $books;
    }
    public function show(Book $book){
        $book->user_name=(User::where('id',$book->user_id)->get())[0]->name;
        $genre_ides=Book_Genre::where('book_id',$book->id)->get('genre_id');
        $genre_name=[];
        $index=0;
        foreach ($genre_ides as $genre_id){
            $genre_name[$index]=(Genre::where('id',$genre_id->genre_id)->get())[0]->name;
            $index++;
        }

        $book->genres=$genre_name;
        return $book;

    }

    public function store($data){
        $genre_ids=$data['genre_id'];
        unset($data['genre_id']);
        $book=Book::create($data);
        $book->genres()->attach($genre_ids);
    }
    public function update($data,Book $book){
        Log::notice('Update book',[$book->id,'to',$data]);
        $genre_ids=$data['genre_id'];
        unset($data['genre_id']);
        $book->update($data);
        $book->genres()->sync($genre_ids);
        return $book;
    }

}
