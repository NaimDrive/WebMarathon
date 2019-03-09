<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
    
</head>
<body>
<header>
    
</header>
<!-- Authentication Links -->
<nav class="main-header">
    <a href="{{ url('/') }}">
        <img id="logo" src="{{ asset('img/LOGO.png')}}"> </img>
    </a>
    <div id="main-menu" >
        <button><img id="hamburger" src="{{ asset('img/hamburger.png')}}" /></button>
        <ul id="navigation">
            @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @else
                <li> Bonjour {{ Auth::user()->name }}</li>
                @if (Auth::user())
                        <li><a href="{{ route('mes_histoires') }}">Mes histoires</a></li>
                        <li><a href="{{ route('creer_histoire') }}">Ajouter une histoire</a></li>
                        <li><a href="{{ route('creer_chapitre') }}">Ajouter un chapitre</a></li>
                        <li><a href="{{ route('lier_chapitre') }}">Lier un chapitre</a></li>

                @endif
                <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                        Logout
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </ul>
    </div>
</nav>
<div id="main">
    @yield('content')
</div>
<!-- Scripts -->

<footer>

<div class="first-footer">
    <p class="second-footer"> Marathon du Web - 2018 - <img src="{{ asset('img/hopeful.png')}}" id="hopeful"/></p>
</div>


</footer>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>