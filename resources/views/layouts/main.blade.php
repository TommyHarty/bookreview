<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Book Review') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- fa --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <div class="">
        <nav class="navbar has-shadow p-l-30 p-r-30">
            <div class="navbar-brand">
                <a class="navbar-item" href="{{ route('home') }}">
                    <strong><i class="fa fa-book" aria-hidden="true"></i> Book Review</strong>
                </a>
                <div class="navbar-burger burger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="navbar-menu">

                <div class="navbar-start">
                    <a class="navbar-item" href="{{ route('home') }}">
                        Home
                    </a>
                    <a class="navbar-item" href="{{ route('all.users') }}">
                        Users
                    </a>
                    <a class="navbar-item" href="{{ route('all.books') }}">
                        Reviews
                    </a>
                </div>

                @if (Auth::guest())
                    <div class="navbar-end">
                        <a class="navbar-item" href="{{ route('login') }}">
                            Login
                        </a>
                        <a class="navbar-item" href="{{ route('register') }}">
                            Register
                        </a>
                    </div>
                @else
                    <div class="navbar-end is-right navbar-item has-dropdown">

                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown is-right">
                            <a class="navbar-item" href="{{ route('show.user', Auth::user()->slug) }}">
                                My Profile
                            </a>
                            <a class="navbar-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </nav>
    </div>

    <div class="container m-t-50">
        @yield('content')
    </div>

    <footer class="footer m-t-50">
        <div class="container">
            <div class="content has-text-centered">
                <p>
                    <strong>Book Review</strong> built by <a href="http://tommyharty.com">Tommy Harty</a> using Laravel, Bulma and jQuery.
                </p>
                <p>
                    <a class="icon" href="https://github.com/TommyHarty/bookreview">
                        <i class="fa fa-github"></i>
                    </a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
