@extends('app')

@section('title', ' - add image')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3" >
            <h1>Add image</h1>

            <hr>

            <form method="post" action="/images" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile02" name="image">
                            <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="body">Tags</label>

                    <select class="form-control select2-multiple" name="tags[]" multiple="multiple">
                        @foreach ($tags as $tag)

                            <option value='{{ $tag->id }}'>{{ $tag->name }}</option>

                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Add</button>
                </div>

                @include('gallery.layouts.errors')
            </form>
        </div>
    </div>




    <script>
        /* show file value after file select */
        $('.custom-file-input').on('change', function () {
            $(this).next('.custom-file-label').addClass("selected").html($(this).val());
        })
    </script>


@endsection
