<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/x-icon" href="storage/files/ucc_logo.gif" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CC') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid">
            <div class="row">
                {{-- <div class="col-4 text-left">
                    <a href="https://www.ucc.edu.gh">
                        <img style="width:50px; height:50px" src="storage/files/ucc_logo.gif" />
                    </a>
                </div>
                <div class="col-4 text-center">
                    <h3 class="text-center white">Campus Connect</h3>
                </div> --}}
                {{-- <div class="col-4 text-right">
                    <a href="https://www.ucc.edu.gh">
                        <img style="width:50px; height:50px" src="storage/files/ucc_logo.gif" />
                    </a>
                </div> --}}
            </div>
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="find">Find <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="notification">Notifications</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="user/{{Auth::user()->id}}">Profile</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            {{--<li class="nav-item dropdown">--}}
                            <li class="nav-item">
                                {{--
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{--<a class="dropdown-item" href="/home">--/}}
                                    <a class="dropdown-item" href="user/{{Auth::user()->id}}">
                                       Profile
                                     </a>
                                --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        <div class="row">
            <div class="col-10">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
            <div class="col-2">
                <div class="jumbotron">
                    <br />
                    <br />
                    <h2> Place for Ads </h2>
                </div>
            </div>
        </div>
        <footer class="jumbotron align-items-center text-center black" id="footer"> &copy 2019 Campus-Connect &nbsp <a href="/about" class="black" title="Click to know more about us">About us</a></footer>
    </div>
    </div>
</body>
</html>
