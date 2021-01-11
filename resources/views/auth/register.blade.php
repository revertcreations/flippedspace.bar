@extends('layouts/app')

@section('content')

    <div class="item-card-wrap form">
        <div class="item-card form">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="info">
                    <h2 class="title">Register</h2>

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
                </div>

                <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
            </form>
        </div>

        {{-- @foreach($errors->all() as $message)
        <div class="item-form-status-bar error">
            <div class="message">{{ $message }}</div>
        </div>
        @endforeach --}}

    </div>

@endsection