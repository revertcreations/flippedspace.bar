@extends('layouts/app')

@section('content')

    <form class="flex-form collasped" method="POST" action="{{ route('register') }}">
        <div class="card">
            <h2 class="title">Register</h2>
            
            @csrf

            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input id="email" name="email" type="email"  value="{{ old('email') }}" autofocus />
                @error('email')
                <small class="error input-error">{{ $message }}</small>
                @enderror   
            </div>
            
            <div class="form-group">
                <label for="username">
                    Username
                </label>
                <input id="" name="username" type="text" value="{{ old('username') }}" autofocus />
                @error('username')
                <small class="error input-error">{{ $message }}</small>
                @enderror                  
            </div>

            <div class="form-group">
                <label for="password">
                    Password                      
                </label>
                <input id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        />
                @error('password')
                <small class="error input-error">{{ $message }}</small>
                @enderror      
            </div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

            <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
        
        </div>
    </form>

    {{-- @foreach($errors->all() as $message)
    <div class="card-status-bar error">
        <div class="message">{{ $message }}</div>
    </div>
    @endforeach --}}

@endsection