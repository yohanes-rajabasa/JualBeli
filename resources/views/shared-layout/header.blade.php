<header>

    <div class="bg-red-apps container-fluid m-0 row">
        <div class="col-sm-3 p-2">
            <a href="{{ route('home') }}"><img src="{{ asset('/storage/logo.png') }}" alt="" srcset=""
                    width="200px"></a>
        </div>

        <div class="col-sm-7 align-self-center">
            <form action="{{ url('/search') }}" method="GET">
                <div class="form-group d-flex align-self-center">
                    <input class="form-control " type="search" name="search_query" id="search_query"
                        value="{{ !empty($query) ? $query : '' }}" placeholder="Search...">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="p-0 col-2  align-self-center">
            <div class="d-flex justify-content-around">

                @auth
                    <a class="btn btn-light active" href="/logout">Logout</a>
                @endauth

                @guest
                    <a class="btn btn-light active" href="/auth/login/customer">Login</a>
                    <a class="btn btn-light active" href="/register">Register</a>
                @endguest

            </div>
        </div>


    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid px-5 mx-4">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapsed"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarCollapsed">
                <ul class="navbar-nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/aboutus">About Us</a>
                    </li>
                    if(@auth
                        @if (Auth::user()->role_number === 2)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/seller">Manage Product</a></li>
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                    <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="/transaction">Cart & Transaction</a></li>
                                    <li><a class="dropdown-item" href="#">2</a></li>
                                    <li><a class="dropdown-item" href="#">3</a></li>
                                    <li><a class="dropdown-item" href="/profile">My Profile</a></li>
                                </ul>
                            </li>
                        @endif

                    @endauth)

                </ul>
            </div>
        </div>
    </nav>
</header>
