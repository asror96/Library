<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\GenreRequest;
use App\Http\Resources\API\GenreResource;
use App\Models\Book_Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function getGenreArray(GenreRequest $request){
        $data=$request->validated();
        $page=$data['page']??1;
        $perPage=$data['per_page']??10;
        $genres=Book_Genre::paginate($perPage,['*'],'page',$page);
        return GenreResource::collection($genres);
    }
}
