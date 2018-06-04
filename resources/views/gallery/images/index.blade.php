@extends('gallery.app')

@section('content')

    <div class="tz-gallery row">
        @foreach($images as $image)
            <div class="col-md-3 offset-md-1">
                <a href="/images/{{$image->id}}" class="nav-link disabled">
                    <div class="card card-custom  ">
                        <img class="card-img-top"
                             src="{{asset('imgs/'.$image->url)}}"
                             alt="Card image cap">
                        <div class="card-footer text-center">{{$image->title}}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <div class="mx-auto pagination" style="width: 0px;">
        {{ $images->links() }}
    </div>


@endsection
