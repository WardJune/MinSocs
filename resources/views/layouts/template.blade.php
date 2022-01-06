<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f624072b07.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="px-3 bg-dark text-light">
        <div class='row'>
            <!--Left Menu block-->
            <div class='sticky-top vh-100 col-md-3 px-5 pt-3 d-flex flex-column justify-content-between'>
                <div class="top">
                    <a href="{{ route('home') }}" class="navbar-brand link-light fw-bold">MinSocs</a>
                    <ul class="nav flex-column fs-5 mt-2 font-weight-light">
                        <li class="nav-item">
                            <a class="nav-link link-light active" href="{{ route('home') }}"><i
                                    class="fas fa-house-damage"></i>
                                <span class="menu-text">Home</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-light" href="{{ route('notif') }}"><i class="fas fa-bell"></i>
                                <span class="menu-text">Notifications</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-light" href="{{ route('friends') }}"><i
                                    class="fas fa-user-friends"></i> <span class="menu-text">Friends</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-light" href="{{ route('profile') }}"><i
                                    class="fas fa-user"></i> <span class="menu-text">Profile</span></a>
                        </li>
                    </ul>

                    <div class="d-grid gap-2 mt-2">
                        <button type="button" class="btn btn-warning rounded-pill">Post</button>
                    </div>
                </div>

                <div class="user d-flex justify-content-between mb-3">
                    <div class="name">
                        <span class="fw-bold d-block">{{ auth()->user()->name }}</span>
                        <span class="text-muted">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropup">
                            <a class="nav-link link-warning dropdown-toggle" href="#" id="dropup" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>

                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropup">
                                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <!--middle block-->
            <div class='col-md-6 border border-secondary border-top-0 border-bottom-0 px-0 pt-3'>
                @yield('content')
            </div>

            <!--Right  block-->
            <div class='sticky-top vh-100 col-md-3 pt-3'>
                <!--search-->
                <div class="search px-2 mb-3">
                    <form>
                        <input type="search" placeholder="Cari.."
                            class=" bg-transparent form-control form-control-sm rounded-pill" />
                    </form>
                </div>
                <!--proposed profiles-->
                <div class="border rounded-3 mx-2 p-3">
                    <div class="heading">
                        <h5>Who to follow</h5>
                    </div>
                    <hr>
                    <div class="profile-1 d-flex justify-content-between mb-2">
                        <div class="profile-name">
                            <span>CTEMagPlus</span>
                        </div>
                        <button class="btn rounded-pill btn-sm btn-outline-warning">Add Friend</button>
                    </div>
                    <div class="profile-1 d-flex justify-content-between mb-2">
                        <div class="profile-name">
                            <span>CTEMagPlus</span>
                        </div>
                        <button class="btn rounded-pill btn-sm btn-outline-warning">Add Friend</button>
                    </div>
                    <div class="profile-1 d-flex justify-content-between mb-2">
                        <div class="profile-name">
                            <span>CTEMagPlus</span>
                        </div>
                        <button class="btn rounded-pill btn-sm btn-outline-warning">Add Friend</button>
                    </div>
                    <div class="heading">
                        <a href="#" class="text-warning text-decoration-none">Show more</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
