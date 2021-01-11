@extends('layouts/app')

@section('content')

    <div class="item-card-wrap">
        <div class="item-card form">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="info">
                    <h2 class="title">Forgot Password?</h2>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" type="email"  value="{{ old('email') }}" required autofocus />   
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
        @if (session('status'))
        <div class="item-form-status-bar success">
            <div class="message">{{ session('status') }}</div>
        </div>
        @endif
        @error('email')
        <div class="item-form-status-bar error">
            <div class="message">{{ $message }}</div>
        </div>
        @enderror
    </div>

@endsection


{{-- @if (!empty($errors->all()))
<div class="item-form-status-bar error">
    @error('token')
    <div class="message">{{ $message }}</div>
    @enderror
    @error('email')
    <div class="message">{{ $message }}</div>
    @enderror
</div>
@endif --}}