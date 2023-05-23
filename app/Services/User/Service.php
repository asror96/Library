<?php

namespace App\Services\User;

use App\Models\Book;
use App\Models\User;

class Service
{
    public function store($data){
        User::create($data);
    }
    public function update($data,User $user){
         $user->update($data);
        return $user;
    }
    public function edit(){

    }
    public function show(User $user){
        $user->count_of_book=Book::where('user_id',$user->id)->count();
        return $user;
    }
    public function index(){
        $users=User::all();
        foreach ($users as $user){
            $user->count_of_book=Book::where('user_id',$user->id)->count();
        }
        return $users;
    }

}
