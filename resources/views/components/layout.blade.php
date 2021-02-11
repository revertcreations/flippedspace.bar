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
            <x-main-nav />
            <x-sub-nav />
            <x-user-nav />
            @yield('category_nav')
        </header>

        <div class="content">
            {{ $slot }}
        </div>

    </body>
</html>
