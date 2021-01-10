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
                        <input type="checkbox" name="remember">
                        <label for="remember">Remember Me?</label>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div>
                <div class="form-group">
                    <small>Forgot Password? <a href="{{ route('password.request') }}">Reset</a></small>
                </div>
            </form>
        </div>
    </div>

@endsection