<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
   function index(){
       $users=User::all();
       foreach ($users as $user){
           $user->count_of_book=Book::where('user_id',$user->id)->count();

       }
       return view('user.index',compact('users'));
   }
    function create(){
        return view('user.create');
    }

    function store(){
        $data=request()->validate([
            'name'=>'string',
            'email'=>'required|unique:users',
            'password'=>['required']
        ]);

        User::create($data);
        return redirect()->route('user.index');
    }
    function show(User $user){
        $user->count_of_book=Book::where('user_id',$user->id)->count();
        return view('user.show',compact('user'));
    }
    function edit(User $user){
        return view('user.edit',compact('user'));
    }


    function update(User $user){
        $data=request()->validate([
            'name'=>'required|string',
            'email'=>'required'
        ]);
        $user->update($data);
        return redirect()->route('user.show',$user->id);
    }
    function destroy(User $user){
        $user->delete();
        return redirect()->route('user.index');
    }
}
