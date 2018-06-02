@extends('gallery.app')


@section('content')

    <div class="row">
        <div class="col-md-4 offset-4">
            <h1>Create a tag</h1>

            <hr>
            <form method="post" action="/tags">

                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Tag">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add new tag</button>
                </div>
        </div>
    </div>


    @include('gallery.layouts.errors')
    </form>




@endsection
