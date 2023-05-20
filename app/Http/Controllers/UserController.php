<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   function index(){
       return view('admin');
   }
   function books(){
       $user=User::find(1);
       $book=Book::find(1);
       $genre=Genre::find(1);
       dd($genre->books);
   }
}
