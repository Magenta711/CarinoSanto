<?php function activeMenu($url)
{
    return request()->is($url) ? 'active' : '';
}
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" sizes="72x72" href="https://carinosanto.com/wp-content/uploads/2020/07/CS.jpg">

    <title>{{ config('app.name', 'Cariño Santo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    @yield('js')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('font/css/all.min.css')}}" rel="stylesheet"> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-ping shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                     <img src="https://carinosanto.com/wp-content/uploads/2020/07/logoheader.png" width="50px" alt="" style="magin:0px;padding:0px"> 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                                <a class="nav-link {{ activeMenu('home*')}}" href="{{route('home')}}"><i class="fas fa-home"></i> {{ __('Home') }}</a>
                            </li>
                            @can('Ver lista de usuarios')
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('users*')}}" href="{{route('users')}}"><i class="fas fa-users"></i> {{ __('Users') }}</a>
                            </li>
                            @endcan
                            @can('Ver lista de roles')
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('roles*')}}" href="{{route('roles')}}"><i class="fas fa-user-tag"></i> {{ __('Roles') }}</a>
                            </li>
                            @endcan
                            @can('Ver lista de clientes')
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('clients*')}}" href="{{route('clients')}}"><i class="fas fa-user-friends"></i> {{ __('Clients') }}</a>
                            </li>
                            @endcan
                            @can('Ver lista de respuestas')
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('answers*')}}" href="{{route('answers')}}"><i class="fas fa-list-alt"></i> {{ __('Answers') }}</a>
                            </li>
                            @endcan
                            @can('Ver lista de formularios')
                            <li class="nav-item">
                                <a class="nav-link {{ activeMenu('forms*')}}" href="{{route('forms')}}"><i class="fab fa-wpforms"></i> {{ __('Forms') }}</a>
                            </li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fas fa-bell"></i> <span class="badge badge-primary">{{count(auth()->user()->unreadNotifications)}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <p class="text-muted p-1 mb-0">{{ __('You\'ve') }} {{count(auth()->user()->unreadNotifications)}} {{ __('notifications') }}</p>
                                    @forelse (auth()->user()->unreadNotifications as $item)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" onclick="markerNotificationAsRead('{{$item->id}}','{{$item->data['link']}}')">{{$item->data['amount']}}</a>
                                    @empty
                                        <div class="dropdown-divider"></div>
                                        <p class="text-muted p-1 mb-0">{{ __('You\'ve not notifications') }}</p>
                                    @endforelse
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a href="{{route('profile')}}" class="dropdown-item"><i class="fas fa-user"></i> {{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <footer class="footer text-muted text-center">
        © 2020 Cariño Santo. {{__('All rights reserved.')}}
    </footer>
</body>
</html>