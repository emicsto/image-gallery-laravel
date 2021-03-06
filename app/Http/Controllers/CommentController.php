<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Image;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Image $image
     * @return \Illuminate\Http\Response
     */
    public function store(Image $image)
    {
        $this->validate(request(),[
            'body' => 'required'
        ]);
        $comment = Comment::create([
            'body' => request('body'),
            'user_id' => auth()->id(),
            'image_id' => $image->id
        ]);

        $user = request()->user();
        if (!$user->hasRole('comment author')) {
            $user->assignRole('comment author');
        }
        session()->flash('message', 'Comment has been added');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $comment = request()->comment;
        request()->user()->can('update', $comment);

        Comment::destroy($comment);

        session()->flash('message', 'Comment has been deleted');

        return redirect()->back();
    }
}
