@extends('app')

@section('content')

    <div class="tz-gallery row">
        @foreach($images as $image)
            <div class="col-md-3 offset-md-1">
                <a href="/images/{{$image->id}}" class="nav-link disabled">
                    <div class="card card-custom  ">
                        <img class="card-img-top"
                             src="{{asset('imgs/'.$image->url)}}"
                             alt="Card image cap">
                        <div class="card-footer text-center">Footer</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>




@endsection
