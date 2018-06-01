@extends('app')

@section('title', "- $image->title")

@section('content')

    <div class="container ml-5 pl-5">

        <img src="{{ asset('imgs/'.$image->url) }}" class="rounded img-fluid mb-4">


        <div class="container">
            <p class="font-weight-normal">
                @if (count($image->tags))
                    Tags:
                    @foreach($image->tags as $tag)
                        <a class="font-weight-bold" href="/posts/tags/{{ $tag->name }}">{{$tag->name}}</a> @if(!$loop->last) &nbsp;&nbsp; @endif @endforeach @endif

            </p>
        </div>

        <div class="list-group">

            <div href="#" class="card-header bg-light">
                <i class="far fa-comments"></i>
                Comments ({{$image->comments->count()}})
            </div>

            @foreach($image->comments->sortByDesc('created_at') as $comment)
                <div class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$comment->user->name}}</h5>
                        <small class="text-muted">{{$comment->created_at}}</small>
                    </div>
                    <p class="mb-1">{{$comment->body}}</p>
                </div>
            @endforeach
        </div>

        <div class="card bg-light">

            <div class="card-body">
                <form method="post" action="/images/{{ $image->id }}/comments">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea class="form-control" name="body" placeholder="Add comment..."></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add comment</button>
                    </div>
                </form>
                @include('layouts.errors')
            </div>
        </div>
    </div>


@endsection
