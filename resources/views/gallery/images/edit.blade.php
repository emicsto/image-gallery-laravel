@extends('gallery.app')

@section('title', ' - edit image')

@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Edit image</h1>

            <hr>

            <form method="post" action="{{ route('images.update', $image->id) }}" enctype="multipart/form-data">

                {{ method_field('PATCH') }}
                {{ csrf_field() }}


                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$image->title}}">
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
                            <option
                                value='{{ $tag->id }}' {{ count($image->tags->where('id', $tag->id)) ? 'selected' : '' }}>{{ $tag->name }}</option>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script type="text/javascript">
        $('.select2-multiple').select2();
    </script>

    <script>
        /* show file value after file select */
        $('.custom-file-input').on('change', function () {
            $(this).next('.custom-file-label').addClass("selected").html($(this).val());
        })
    </script>


@endsection
