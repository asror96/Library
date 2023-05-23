<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User;

class DestroyController extends Controller
{
    function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }
}
