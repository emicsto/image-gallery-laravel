<?php

namespace App\Http\Controllers;

use App\Image;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()
            ->filter(request(['month', 'year']))
            ->paginate(10);

        return view('gallery.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('gallery.images.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required',
            'image' => 'sometimes|image'
        ]);

        $filename = null;
        if (request()->hasFile('image')) {
            $image = request()->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('imgs\\' . $filename);
            \Intervention\Image\Facades\Image::make($image)->resize(1600, 900)->save($location);
        }

        $image = new Image();

        $image->title = $request->title;
        $image->url = $filename;
        $image->user_id = auth()->user()->id;
        $image->save();

        $tags = (request('tags'));
        $image->tags()->attach($tags);

                $user = $request->user();


        if(! $user->hasRole('image author')){
            $user->assignRole('image author');
        }

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('gallery.images.show', ['image' => Image::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $image = Image::findOrFail($id);

        return view('gallery.images.edit', compact('tags', 'image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $this->validate(request(), [
            'title' => 'required',
        ]);

        $tags = (request('tags'));

        if (request()->hasFile('image')) {
            $photo = request()->file('image');
            $filename = time() . '.' . $photo->getClientOriginalExtension();
            $location = public_path('imgs\\' . $filename);
            \Intervention\Image\Facades\Image::make($photo)->resize(1600, 900)->save($location);
            $oldFilename = $image->url;
            $image->url = $filename;
            File::delete(public_path('imgs/' . $oldFilename));
        }

        $image->update(request(['title']));
        $image->tags()->sync($tags);

        return redirect()->route('images.show', $image->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image $image
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Image $image)
    {
        File::delete(public_path('imgs/' . $image->url));
        $image->delete();

        return redirect('/');
    }
}
