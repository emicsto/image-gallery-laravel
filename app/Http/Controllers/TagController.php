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
        return view('gallery.tags.create');
    }

    public function destroy()
    {
        Tag::destroy(request()->tag);
        session()->flash('message', 'Tag has been deleted');

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
        session()->flash('message', 'Tag has been added');

        return redirect('/');
    }

    public function getImages(Tag $tag)
    {
        $images = $tag->images()->latest()->paginate(9);
        return view('gallery.images.index', compact('images'));
    }
}
