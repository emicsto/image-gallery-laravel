<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('tags.create');
    }

    public function destroy()
    {
        Tag::destroy(request()->tags);

        return redirect()->back();
    }

    public function store()
    {
         $this->validate(request(),[
           'name' => 'required'
         ]);

        $tag = new Tag;
        $tag->name=request('name');
        $tag->save();

        return redirect('/');
    }

    public function getImages(Tag $tag)
    {
        $images = $tag->images()->latest()->paginate(10);
        return view('images.index', compact('images'));
    }
}
