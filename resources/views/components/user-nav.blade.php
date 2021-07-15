<nav id="user_nav" class="nav-bar user-nav">
    <ul>

        @guest
        <li><a class="nav-link" href="/register">register</a></li>
        <li><a class="nav-link" href="/login">login</a></li>
        @else

        {{-- <span style="margin-left: 20px;">
        {{ Auth::user()->username }}
        </span>
        &nbsp;
        @if (empty($user->avatar))
        <span style="font-size: 40px; margin-right: 20px;">
            &#9787;
        </span>
        @else
            <img width="32" height="32" class="avatar" src="{{ asset('img/avatar.jpeg') }}" />
        @endif --}}
        <li style="background: #fff;" class="{{ str_contains(request()->route()->uri,'settings') ? 'current' : '' }}">
            <a href="/settings">
                {{-- <span style="position: absolute; margin-left: 5px; bottom: 4px; font-size: 40px;">&#9787;</span> --}}
                <span style="font-weight: 800;">{{ Auth::user()->username }}</span>
            </a>
        </li>
        <li class="{{ str_contains(request()->route()->uri,'collection') ? 'current' : '' }}"><a href="/collection">collection</a></li>
        <li class="{{ str_contains(request()->route()->uri,'listings') ? 'current' : '' }}"><a href="/listings">listings</a></li>
        <li class="{{ str_contains(request()->route()->uri,'watch-lists') ? 'current' : '' }}"><a href="/watch-lists">watch lists</a></li>
        <li class="{{ str_contains(request()->route()->uri,'wish-lists') ? 'current' : '' }}"><a href="/wish-lists">wish lists</a></li>
        <li class="{{ str_contains(request()->route()->uri,'catalog') ? 'current' : '' }}"><a href="/catalog">catalog</a></li>

        <li>
            <form class="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">logout</a>
            </form>
        </li>

    @endguest
</ul>
</nav>


