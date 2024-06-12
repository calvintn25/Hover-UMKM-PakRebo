<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/ea590c57b3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../pc.css">
    <link rel="shortcut icon" type="image/jpg" href="../../../img/logo.png"/>

    <style>
        .user-custom {
          width: 30px;
        }
  
        .main-content{
            padding: 30px;
            border-right: 1px solid gray;
            border-left: 1px solid gray;
            border-bottom: 1px solid gray;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px ;
            margin: auto;
        }
  
        .head-content {
            border: 1px solid black;
            border-top-left-radius: 50px;
            border-top-right-radius: 50px;
            padding: 20px;
            background-color: #0d6efd;
        }
    </style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
			
            <img src="../../../img/logo.png" alt="Logo" width="70" class="d-inline-block align-text-top">

            {{-- <ul class="nav nav-underline">
                <li class="nav-item pe-2">
                    <a class="nav-link" aria-current="page" :href="route('dashboard')" :active="request()->routeIs('dashboard')">{{ __('Dashboard') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="route('admin.product-categories.index')" active="request()->routeIs('admin.product-categories')">{{ __('Product Category') }}</a>
                </li>

            </ul> --}}
            
            <ul class="nav nav-underline">	
                <x-nav-link class="nav-link pe-2" :href="route('admin.headers.index')" :active="request()->routeIs('admin.headers')">
                    {{ __('Headers') }}
                </x-nav-link>   

                <x-nav-link class="nav-link  pe-2" :href="route('admin.product-categories.index')" :active="request()->routeIs('admin.product-categories')">
                    {{ __('Product Category') }}
                </x-nav-link>   
                <x-nav-link class="nav-link pe-2" :href="route('admin.products.index')" :active="request()->routeIs('admin.products')">
                    {{ __('Product') }}
                </x-nav-link>  
            </ul>

                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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

</body>
</html>
