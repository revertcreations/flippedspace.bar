<nav id="user_nav" class="nav-bar user-nav">
    <ul>

        @guest
        <li><a class="nav-link" href="/register">register</a></li>
        <li><a class="nav-link" href="/login">login</a></li>
        @else

        <span style="margin-left: 20px;">
        {{ Auth::user()->username }}
        </span>
        @if (empty($user->avatar))
        <span style="font-size: 40px;">
            &nbsp;&#9787;
        </span>
        @else
            <img width="32" height="32" class="avatar" src="{{ asset('img/avatar.jpeg') }}" />
        @endif

        <li class="{{ str_contains(Route::current()->uri,'collection') ? 'current' : '' }}"><a href="/collection">collection</a></li>
        <li class="{{ str_contains(Route::current()->uri,'listings') ? 'current' : '' }}"><a href="/listings">listings</a></li>
        <li class="{{ str_contains(Route::current()->uri,'watch-lists') ? 'current' : '' }}"><a href="/watch-lists">watch lists</a></li>
        <li class="{{ str_contains(Route::current()->uri,'wish-lists') ? 'current' : '' }}"><a href="/wish-lists">wish lists</a></li>
        <li class="{{ str_contains(Route::current()->uri,'settings') ? 'current' : '' }}"><a href="/settings">settings</a></li>


        <li>
            <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">logout</a>
            </form>
        </li>

    @endguest
</ul>
</nav>


