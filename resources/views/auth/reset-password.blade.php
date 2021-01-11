@extends('layouts/app')

@section('content')

    <div class="item-card-wrap">
        <div class="item-card form">
            @if (session('status'))
            <small class="success form-success">{{ session('status') }}</small>
            @endif
            @error('token')
            <div class="error form-error">{{ $message }}</div>
            @enderror
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="info">
                    <h2 class="title">Reset Password</h2>
                    <div class="form-group">
                        <label for="email">
                            Email
                        </label>
                        <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}" required />
                        @error('email')
                        <small class="error input-error">{{ $message }}</small>
                        @enderror   
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
                        @error('password')
                        <small class="error input-error">{{ $message }}</small>
                        @enderror      
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">
                            Confirm New Password                 
                        </label>
                        <input id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               required />
                        @error('password_confirmation')
                        <small class="error input-error">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Reset Password">
                    </div>
            </form>
        </div>
        @if (!empty($errors->all()))
        <div class="item-form-status-bar error rgbsweep">
            @error('token')
            <div class="error form-error">{{ $message }}</div>
            @enderror
            @error('email')
            <div class="error form-error">{{ $message }}</div>
            @enderror
        </div>
        @endif
    </div>

@endsection