<x-layout>

    <form class="flex-form" method="POST" action="{{ route('password.email') }}">
        <div class="card">
            @csrf
            <div class="fields">
                <h2 class="title">Forgot Password?</h2>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" type="email"  value="{{ old('email') }}" required autofocus />   
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit">
                </div>

                <small>Did ya remember it? <a href="{{ route('login') }}">Login</a></small>

            </div>
        </div>
    </form>

    @if (session('status'))
    <div class="card-status-bar success">
        <div class="message">{{ session('status') }}</div>
    </div>
    @endif
    @error('email')
    <div class="card-status-bar error">
        <div class="message">{{ $message }}</div>
    </div>
    @enderror    

</x-layout>


{{-- @if (!empty($errors->all()))
<div class="card-status-bar error">
    @error('token')
    <div class="message">{{ $message }}</div>
    @enderror
    @error('email')
    <div class="message">{{ $message }}</div>
    @enderror
</div>
@endif --}}