<!DOCTYPE html>
<html class="font-mono" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        @livewireStyles

        <title>@yield('title', 'Buy & Sale - Mechanical Keyboard Classifieds | flippedspace.bar')</title>
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="font-mono">
        <header>
            <x-main-nav />
            {{-- <x-sub-nav /> --}}
            {{-- <x-user-nav /> --}}
            @yield('category_nav')
        </header>

        <div class="max-w-5xl mx-auto">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
