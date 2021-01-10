@extends('layouts/app')

@section('content')

    <div class="item-card-wrap">
        <div class="item-card single">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="info">
                    <h2 class="title">Forgot Password?</h2>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" type="email" required autofocus />   
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div>
                <div class="form-group">
                    <small>Did ya remember it? <a href="{{ route('login') }}">Login</a></small>
                </div>
            </form>
        </div>
    </div>

@endsection