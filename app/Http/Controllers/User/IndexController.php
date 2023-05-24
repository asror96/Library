<?php

namespace App\Http\Controllers\User;
class IndexController extends BaseController
{
    function __invoke()
    {
        $users=$this->service->index();

        return view('user.index',compact('users'));
    }
}
