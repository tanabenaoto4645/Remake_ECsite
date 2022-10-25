<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/index.js') }}" defer></script>
    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.15.10/dist/js/uikit-icons.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/css/uikit.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    n rebuilding
                </a>
                
                <span class="navbar-toggler-icon"></span>
                <div uk-dropdown="pos: bottom-right; boundary: !.boundary; shift: false; flip: false">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto uk-nav uk-dropdown-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" >カテゴリ</a>
                                <div uk-dropdown="pos: bottom-right; boundary: !.boundary; shift: false; flip: false">
                                    <ul class="uk-nav uk-dropdown-nav">
                                        <li><a class="nav-link" href="/products">ALL</a></li>
                                        <li><a class="nav-link" href="/products/category/1">フレア</a></li>
                                        <li><a class="nav-link" href="/products/category/2">ワイド</a></li>
                                        <li><a class="nav-link" href="/products/category/3">その他</a></li>
                                    </ul>
                                </div>
                            </li>
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
                            <li class="nav-item">
                                <a class="nav-link" href="/user/{{auth()->user()->id}}">マイページ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/like">お気に入り</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/user/cart">カート</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="contents wrapper">
            <main class="py-4 main_contents">
                @yield('content')
            </main>
        </div>
        
        <footer>
            <ul>
                <li><a href="/">HOME</a></li>
                <li><a href="https://www.instagram.com/n_rebuilding_mal/" uk-icon="instagram">INSTAGRAM</a></li>
                <li><a href="/contact">CONTACT</a></li>
            </ul>
            <small>&copy; 2022 nrebuilding</small>
        </footer>
    </div>
</body>
</html>
