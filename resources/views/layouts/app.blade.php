<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <title>@yield('title', 'Buy & Sale - Mechanical Keyboard Classifieds | flippedspace.bar')</title>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <header>
            <nav class="main-nav">
                
                <a class="logo-link disable-scrollbars disable-underline" href="/">            
                    <pre class="logo">
 _______  ___      ___   _______  _______  _______  ______   _______  _______  _______  _______  _______        _______  _______  ______   
|       ||   |    |   | |       ||       ||       ||      | |       ||       ||   _   ||       ||       |      |  _    ||   _   ||    _ |  
|    ___||   |    |   | |    _  ||    _  ||    ___||  _    ||  _____||    _  ||  |_|  ||      _||    ___|      | |_|   ||  |_|  ||   | ||  
|   |___ |   |    |   | |   |_| ||   |_| ||   |___ | | |   || |_____ |   |_| ||       ||     |  |   |___       |       ||       ||   |_||_ 
|    ___||   |___ |   | |    ___||    ___||    ___|| |_|   ||_____  ||    ___||       ||     |_ |    ___| ___  |  _   | |       ||    __  |
|   |    |       ||   | |   |    |   |    |   |___ |       | _____| ||   |    |   _   ||       ||   |___ |   | | |_|   ||   _   ||   |  | |
|___|    |_______||___| |___|    |___|    |_______||______| |_______||___|    |__| |__||_______||_______||___| |_______||__| |__||___|  |_|
                    </pre>
                </a>

                <div class="search-bar">
                    <label for="site-search" class="search-icon">&#9906;</label for="site-search">
                    <input name="site-search" type="text" placeholder="search &amp; watch the wallet burn...">
                </div>

                <ul>
                    <li><a class="nav-link" href="/classifieds">classifieds</a></li>
                    <li><a class="nav-link" href="/sell">sell</a></li>
                    @guest
                    <li><a class="nav-link" href="/register">register</a></li>
                    <li><a class="nav-link" href="/login">login</a></li>
                    @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <li>
                        <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">logout</a>
                    </li>
                    </form>
                    <li class="user-menu">
                        <div class="img-wrap">
                            <a href="{{ route('dashboard') }}">
                                @if (empty($user->avatar))
                                &#9787;
                                @else
                                <img width="32" height="32" class="avatar" src="{{ asset('img/avatar.jpeg') }}" />
                                @endif
                            </a>
                        </div>
                    </li>
                    @endguest
                </ul>

            </nav>
        </header>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>