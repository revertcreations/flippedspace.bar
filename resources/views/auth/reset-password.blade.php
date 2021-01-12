@extends('layouts/app')

@section('content')

    <form class="flex-form" method="POST" action="{{ route('password.update') }}">
        <div class="card">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <h2 class="title">Reset Password</h2>
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required />
            </div>
            <div class="form-group">
                <label for="password">
                    New Password                      
                </label>
                <input id="password"
                        type="password"
                        name="password"
                        autocomplete="new-password"
                        autofocus
                        required />  
            </div>

            <div class="form-group">
                <label for="password_confirmation">
                    Confirm New Password                 
                </label>
                <input id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required />
            </div>

            <div class="form-group">
                <input type="submit" value="Reset Password">
            </div>
        </div>
    </form>            
    @foreach($errors->all() as $message)
    <div class="card-status-bar error">
        <div class="message">{{ $message }}</div>
    </div>
    @endforeach
    @if (session('status'))
    <div class="card-status-bar success">
        <div class="message">{{ session('status') }}</div>
    </div>
    @endif


@endsection