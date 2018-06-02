<?php

namespace App\Http\Controllers;

use App\Image;
use App\Role;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getImages()
    {
        $images = Image::latest()
            ->filter(request(['month', 'year']))
            ->paginate(5);
        return view('dashboard.images.index', compact('images'));
    }
    public function getTags()
    {
        $tags = Tag::latest()
            ->paginate(5);
        return view('dashboard.tags.index', compact('tags'));
    }

    public function getUsers()
    {
        $users = User::latest()
            ->paginate(5);
        return view('dashboard.users.index', compact('users'));
    }

    public function getRoles()
    {
        $roles = Role::latest()
            ->paginate(5);
        return view('dashboard.roles.index', compact('roles'));
    }
}
