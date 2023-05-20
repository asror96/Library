<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    function index(){
        $genres=Genre::all();
        return view('genre.index',compact('genres'));
    }

    function create(){
        return view('genre.create');
    }

    function store(){
        $data=request()->validate([
           'name'=>'string'
        ]);
        Genre::create($data);
        return redirect()->route('genre.index');
    }
    function show(Genre $genre){
        return view('genre.show',compact('genre'));
    }
    function edit(Genre $genre){
        return view('genre.edit',compact('genre'));
    }
    function update(Genre $genre){
        $data=request()->validate([
            'name'=>'string'
        ]);
        $genre->update($data);
        return redirect()->route('genre.show',$genre->id);
    }

    function destroy(Genre $genre){
       $genre->delete();
       return redirect()->route('genre.index');
    }
}
