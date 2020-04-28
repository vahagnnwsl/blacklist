<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>

</head>
<body>
<div id="app">


    <nav class="navbar navbar-expand-md navbar-dark bg-secondary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Arendolog.com
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                        <li class="nav-item mr-2">
                            <a class="btn btn-outline-light" href="{{ route('registration','individual') }}">Зарегистрироваться</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ route('login') }}">Войти</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if(Auth::user()->type === 1)
                                    <a class="dropdown-item" href="/dashboard">Dashboard</a>
                                @else
                                    <a class="dropdown-item" href="{{ route('account.index') }}">Моя страница</a>
                                    <a class="dropdown-item" href="{{ route('account.profile') }}">Профиль пользователя</a>
                                @endif

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <main class="py-4">
        @yield('content')

    </main>
    <div class="footer" style="background-color: #6C757D">
        <p class="m-2 text-light ">

            <a href="mailto:support@arendolog.com" class="float-right mr-2 text-light mb-2">support@arendolog.com</a>
            <a href="/" class="float-left  text-light mb-2">©2019-2020 Arendolog.com</a>
        </p>
    </div>

</div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.toaster.js') }}"></script>
<script>

</script>
@stack('scripts')
{{--    <script>--}}
{{--        $('#element').toast('hide')--}}
{{--    </script>--}}
</body>
</html>
