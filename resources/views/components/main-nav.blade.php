<nav class="main-nav">
    <x-logo></x-logo>

    <div class="search-bar">
        <label for="site-search" class="search-icon">&#9906;</label for="site-search">
        <input name="site-search" type="text" placeholder="search &amp; watch the wallet burn...">
    </div>

    <ul>
        @guest
        <li><a class="nav-link" href="/register">register</a></li>
        <li><a class="nav-link" href="/login">login</a></li>
        @else
        <form method="POST" action="{{ route('logout') }}">
            @csrf
        <li>
            <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">logout</a>
        </li>
        </form>
        <li class="user-menu">
            <div class="img-wrap">
                <a href="/my/dashboard">
                    @if (empty($user->avatar))
                    &#9787;
                    @else
                    <img width="32" height="32" class="avatar" src="{{ asset('img/avatar.jpeg') }}" />
                    @endif
                </a>
            </div>
        </li>
        @endguest
    </ul>

</nav>
