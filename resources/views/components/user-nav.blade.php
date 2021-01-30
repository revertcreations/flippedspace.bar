<nav id="user_nav" class="user-nav opened">
    {{-- <input id="user_nav_close" class="user-nav-close" type="button" onclick="toggle_user_nav()" value="X">
    <ul>
        <li><h1>{{ Auth::user()->username }}'s</h1></li>
        <li><a href="/collections">collections</a></li>
        <li><a href="/listings/artisans">listings</a></li>
        <li><a href="/watch-lists">watch lists</a></li>
        <li><a href="/wish-lists">wish lists</a></li>
        <li><a href="/settings">settings</a></li>
    </ul> --}}

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


            <li><a href="/collections">collections</a></li>
            <li><a href="/listings/artisans">listings</a></li>
            <li><a href="/watch-lists">watch lists</a></li>
            <li><a href="/wish-lists">wish lists</a></li>
            <li><a href="/settings">settings</a></li>

            <form class="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <li>
                    <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();"></a>
                </li>
            </form>

        @endguest
        </ul>
</nav>


