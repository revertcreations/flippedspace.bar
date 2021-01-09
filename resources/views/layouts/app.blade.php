<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>@yield('title', 'flippedspace.bar - buy/sell custom keyboards')</title>
    </head>
    <body>
        <header>
            <nav class="main-nav">
                
                <a class="logo-link" href="/">            
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
                    <label for="site-search" id="site_search_icon">&#9906;</label for="site-search">
                    <input name="site-search" type="text" placeholder="search &amp; watch the wallet burn...">
                </div>

                <ul>
                    <li><a href="/classifieds">classifieds</a> |&nbsp;</li>
                    <li><a href="/sell">sell</a> |&nbsp;</li>
                    <li><a href="/login">login</a> |&nbsp;</li>
                    <li><a href="/register">register</a></li>
                </ul>

        </nav>
        </header>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>