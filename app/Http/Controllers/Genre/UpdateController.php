<?php

namespace App\Http\Controllers\Genre;

use App\Http\Controllers\Controller;
use App\Http\Requests\Genre\UpdateRequest;
use App\Models\Genre;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,Genre $genre)
    {
        $data=$request->validated();
        $this->service->update($data,$genre);
        return redirect()->route('genre.show',$genre->id);
    }
}
