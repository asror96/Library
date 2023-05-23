<?php
namespace App\Http\Controllers\User;
use App\Http\Requests\User\StoreRequest;
class StoreController extends BaseController
{
    function __invoke(StoreRequest $request)
    {
        $data=$request->validated();
        $this->service->store($data);
        return redirect()->route('user.index');
    }
}
