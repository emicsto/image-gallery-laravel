<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function destroy()
    {
        User::destroy(request()->user);
        return redirect()->back();
    }
}
