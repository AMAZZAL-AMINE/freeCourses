<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FreeCours') }}</title>
    <link rel="stylesheet"  href="{{ asset('css/styling.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/script.js') }}">  </script>
</head>
<body>
    <div id="app">

    <div class="navbar_top">
    <div onclick="showSearsh()" class="searchingmobil" >
             <i class="fa fa-search" aria-hidden="true"></i>
        </div>

        <div class="navLogo">
            <a href="/"> <img src="{{ asset('/img/logo.png') }}" alt="freecours logo"> </a>
        </div>
        
        <div  class="navList">
                <div onclick="closMenu()" class="close ">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            <ul> 
                <li><a href="/">Home</a></li>
                <li><a href="">Categories</a></li>
                <li> <a href=""> Courses </a> </li>
                    @if (Auth::check())
                        <li class="profile"> <a href="">Profile</a></li>
                        @else
                            <li class="login">
                                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            <li class="register">
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                    @endif
            </ul>
        </div>

        <div onclick="hideSearch()" class="searshing" >
                 <div onclick="closSearch()" class="closeSearch ">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </div>
            <form action="#" method="get">
                <div> <input type="text" name="search" placeholder="Search"> </div>
                <div> <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button> </div>
            </form>
        </div>

        <div onclick="showNav()" class="birgerNav" >
            
            <i class="fa fa-navicon" aria-hidden="true"></i>
        </div>

    </div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
