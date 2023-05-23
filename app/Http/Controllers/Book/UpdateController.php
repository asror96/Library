<?php

namespace App\Http\Controllers\Book;
use App\Http\Requests\Book\UpdateRequest;
use App\Models\Book;
class UpdateController extends BaseController
{
    function __invoke(UpdateRequest $request,Book $book): \Illuminate\Http\RedirectResponse
    {
        $data=$request->validated();
        $this->service->update($data,$book);
        return redirect()->route('book.show',$book->id);
    }
}
