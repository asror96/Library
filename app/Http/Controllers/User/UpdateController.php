<?php
namespace App\Http\Controllers\User;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
class UpdateController extends BaseController
{
    function __invoke(UpdateRequest $request,User $user)
    {
        $data=$request->validated();
        $this->service->update($data,$user);
        return redirect()->route('user.show',$user->id);
    }
}
