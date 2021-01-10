@extends('layouts/app')

@section('content')

    <div class="item-card-wrap">
        <div class="item-card single">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="info">
                    <h2 class="title">Register</h2>
                    
                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input id="f_name" name="f_name" type="text" required autofocus />                        
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input id="l_name" name="l_name" type="text" required autofocus />                        
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" type="email" required autofocus />   
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password"
                               type="password"
                               name="password"
                               required autocomplete="new-password" />
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation" required />
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Submit">
                    </div>
                </div>

                <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
            </form>
        </div>
    </div>

@endsection