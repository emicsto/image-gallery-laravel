@extends('app')

@section('title', "- $image->title")

@section('content')

    <div class="container ml-5 pl-5">

        <img src="{{ asset('imgs/'.$image->url) }}" class="rounded img-fluid mb-4">


        <div class="card bg-light mb-3">
            <div class="card-header">
                <i class="far fa-comments"></i>
                Comments
            </div>
            <div class="card-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>

            </div>
        </div>
    </div>


@endsection
