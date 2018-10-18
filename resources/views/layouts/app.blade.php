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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('includes.css')
       
    @yield('pagescss')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Branding Image -->
                    <a class="navbar-brand {{ activeMenu('home') }}" href="{{ url('') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>              
                @if (Route::has('login'))
                    @if (Auth::check() && auth()->user()->type == 'admin')
                        <div class="navbar-header">     
                            <div class="top-right links">
                                <a class="navbar-brand {{ activeMenu('user') }}" href="{{ route('user.index') }}">
                                    Usuarios
                                </a>
                            </div>
                        </div>
                        <div class="navbar-header">     
                            <div class="top-right links">
                                <a class="navbar-brand {{ activeMenu('book') }}" href="{{ route('book.index') }}">
                                    Libros
                                </a>
                            </div>
                        </div>
                        <div class="navbar-header">     
                            <div class="top-right links">
                                <a class="navbar-brand {{ activeMenu('category') }}" href="{{ url('category') }}">
                                    Categorización
                                </a>
                            </div>
                        </div>
                        <div class="navbar-header">     
                            <div class="top-right links">
                                <a class="navbar-brand {{ activeMenu('lend') }}" href="{{ url('lend') }}">
                                    Prestamos
                                </a>
                            </div>
                        </div>
                    @endif
                @endif

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>        
    @yield('pagescript')
    
<?php 
    function activeMenu($url){
        if(Route::currentRouteName() == $url){
            return 'active';
        }else{
            return '';
        }
    }
?>
</body>
</html>
