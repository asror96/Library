<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\BookRequest;
use App\Http\Requests\API\UserRequest;
use App\Http\Resources\API\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAuthorArray(UserRequest $request){
        $data=$request->validated();
        $page=$data['page']??1;
        $perPage=$data['per_page']??10;
        $user= User::paginate($perPage,['*'],'page',$page);
        return UserResource::collection($user);
    }
    public function getAuthor(UserRequest $request){
        $data=$request->validated();
        $author=(User::where('id',$data['id'])->get())[0];
        return new UserResource($author);
    }
    public function update(UserRequest $request){
        $data=$request->validated();
        $user=(user::where('id',$data['id'])->get())[0];
        if(isset($user)&&$user->id==auth()->user()->id){
            if (isset($data['name'])){
                $user->name=$data['name'];
            }
            if (isset($data['type'])) {
                $user->email=$data['email'];
            }
            $user->fresh();
            return new UserResource($user);
        }
        else{
            return response()->json('Problem with updated books!',500);
        }

    }
}
