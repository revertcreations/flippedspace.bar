@extends('layouts/app')

@section('content')

    <div class="item-card-wrap">
        <div class="item-card single">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="info">
                    <h2 class="title">Login</h2>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" type="email" required autofocus />   
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required autocomplete="current-password" />
                    </div>
                    <div class="form-group">
                        <label for="remember">Remember Me?</label>
                        <input type="checkbox" name="remember">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div>

                <small>Don't have an account? <a href="{{ route('register') }}">Register</a></small>
            </form>
        </div>
    </div>

@endsection