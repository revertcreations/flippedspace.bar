<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>@yield('title', 'flippedspace.bar')</title>
    </head>
    <body>
       
        <nav class="main-nav">
            
            <a class="logo-link" href="/">            
              <pre class="logo">

 _______  ___      ___   _______  _______  _______  ______   _______  _______  _______  _______  _______        _______  _______  ______   
|       ||   |    |   | |       ||       ||       ||      | |       ||       ||   _   ||       ||       |      |  _    ||   _   ||    _ |  
|    ___||   |    |   | |    _  ||    _  ||    ___||  _    ||  _____||    _  ||  |_|  ||       ||    ___|      | |_|   ||  |_|  ||   | ||  
|   |___ |   |    |   | |   |_| ||   |_| ||   |___ | | |   || |_____ |   |_| ||       ||       ||   |___       |       ||       ||   |_||_ 
|    ___||   |___ |   | |    ___||    ___||    ___|| |_|   ||_____  ||    ___||       ||      _||    ___| ___  |  _   | |       ||    __  |
|   |    |       ||   | |   |    |   |    |   |___ |       | _____| ||   |    |   _   ||     |_ |   |___ |   | | |_|   ||   _   ||   |  | |
|___|    |_______||___| |___|    |___|    |_______||______| |_______||___|    |__| |__||_______||_______||___| |_______||__| |__||___|  |_|
              </pre>
            </a>

            <ul>
                <li><a href="classifieds">classifieds</a>|</li>
                <li><a href="/group_buys">group buys</a>|</li>
                <li><a href="/interest_checks">interest checks</a>|</li>
                <li><a href="/artisans">artisans</a></li>
            </ul>

        </nav>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>
