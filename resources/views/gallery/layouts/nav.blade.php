<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Image gallery</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item {{ Route::is('home') ? 'active' : '' }}  ">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item {{ Route::is('images.create') ? 'active' : '' }} ">
                    <a class="nav-link" href="/images/create">Add image</a>
                </li>
                <li class="nav-item {{ Route::is('tags.create') ? 'active' : '' }}">
                    <a class="nav-link" href="/tags/create">Create tag</a>
                </li>

            </ul>

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="align-middle pt-2">
                    <div>
                    <a href="/profile/{{Auth::user()->id}}/edit">
                    {{--<img src="{{asset('imgs'.Auth::user()->avatar)}}" onerror="this.src='{{ asset('imgs') }}'" class="rounded-circle" width="30" height="30" >--}}
                    </a>
                    </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile/{{Auth::user()->id}}/edit">Profile</a>

                            @role('admin')
                            <a class="dropdown-item" href="/admin">Dashboard</a>
                            @endrole

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest
            </ul>
        </div>


        </div>
    </nav>
</header>
