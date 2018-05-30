<!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
    <title>Image gallery @yield('title')</title>
</head>

<body>

@include('layouts.nav')

{{--@include('layouts.messages')--}}

<main role="main" class="container pt-4">
    <div class="row">

        <div class="col-md-9 blog-main">
            @yield('content')
        </div>

    </div>
</main>


@include('layouts.scripts')
</body>

</html>
