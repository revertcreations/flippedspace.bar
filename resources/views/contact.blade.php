<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <title>flippedspace.bar</title>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                   <a href="/">flippedspace.bar</a>
                </div>

                <h1>
                    contact
                </h1>

                <p>
                    <a href="mailto:revertcreations@gmail.com">revertcreations@gmail.com</a>
                </p>

                <div class="links">
                    <a href="/about">about</a>
                    <a href="/contact">contact</a>
                </div>
            </div>
        </div>
    </body>
</html>
