<x-layout>
    <form class="flex-form" method="POST" action="{{ route('login') }}">
        <div class="card">
            <h2 class="title">Login</h2>

            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" type="email" value="{{ old('email') }}" required autofocus />
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

            <small>Forgot Password? <a href="{{ route('password.request') }}">Reset</a></small>
        </div>
    </form>

    @foreach($errors->all() as $message)
    <div class="card-status-bar error">
        <div class="message">{{ $message }}</div>
    </div>
    @endforeach

</x-layout>