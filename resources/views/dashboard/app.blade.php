<!DOCTYPE html>
<html lang="en">

<head>
    @include('dashboard.layouts.head')
</head>

<body class="">
<div class="wrapper">

    @include('dashboard.layouts.sidebar')

    <div class="main-panel">
        @include('dashboard.layouts.navbar')
        @yield('content')
        @include('dashboard.layouts.footer')
    </div>

</div>
</body>

@include('dashboard.layouts.scripts')

</html>
