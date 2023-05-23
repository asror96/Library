<?php
namespace App\Http\Controllers\User;
use App\Models\User;
class ShowController extends BaseController
{
    function __invoke(User $user)
    {
        $user=$this->service->show($user);
        return view('user.show',compact('user'));
    }
}
