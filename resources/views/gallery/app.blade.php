<!doctype html>
<html lang="en">

<head>
    @include('gallery.layouts.head')
    <title>Image gallery @yield('title')</title>
</head>

<body>

@include('gallery.layouts.nav')

{{--@include('layouts.messages')--}}
<div class="row">

    <div class="col-md-8 pt-4">
        @yield('content')
    </div>

    <div class="col-md-3 offset-md-1 pt-4 pr-5 ">
        @include('gallery.layouts.sidebar')
    </div>
</div>


@include('gallery.layouts.scripts')
</body>

</html>
