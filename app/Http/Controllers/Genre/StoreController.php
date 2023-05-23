<?php
namespace App\Http\Controllers\Genre;
use App\Http\Requests\Genre\StoreRequest;
class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $this->service->store($data);
        return redirect()->route('genre.index');
    }
}
