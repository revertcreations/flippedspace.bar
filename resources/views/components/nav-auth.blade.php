<div class=""
     x-data="{ open : false }"
>
        @guest
            <li><a class="p-3 hover:font-bold" href="/register">register</a></li>
            <li><a class="p-3 hover:font-bold" href="/login">login</a></li>
        @else

    <button
        class="text-black bg-gray-100 cursor-pointer transform p-3"
        value=""
        x-bind:class="open ? '-rotate-45' : 'hover:rotate-12'"
        x-on:click="open = !open"
        @click.outside="open = false"
    >
        <x-avatar/>
        &nbsp;menu
    </button>

    <nav
        x-show="open"
        style="display: none;"
        class="relative"
    >
        <ul class="-top-8 absolute bg-gray-50 flex flex-col p-4 right-10">

                      
            {{--
            <li class="hover:font-bold">
                <a href="/settings" class="">
                    <div class="text-center rounded-t-full">( ﾟヮﾟ)</div>
                    <div class="z-10 bg-gray-100 border border-gray-500 text-black px-4 text-center">menu</div>
                </a>
            </li>
            --}} 

            <li class="p-3 hover:font-bold"><a href="/listings">★ classifieds</a></li>
            <li class="p-3 hover:font-bold"><a href="/catalog">catalog</a></li>
            <hr />
            <li class="p-3 hover:font-bold"><a href="/collection">collection</a></li>
            <li class="p-3 hover:font-bold"><a href="/watch-lists">watch list</a></li>
            <li class="p-3 hover:font-bold"><a href="/wish-lists">wish list</a></li>
            <hr />
            <li class="p-3 hover:font-bold"><a href="/settings">settings</a></li>
            <hr />
            <li class="p-3 hover:font-bold">
                <form class="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link" onclick="event.preventDefault();this.closest('form').submit();">logout</a>
                </form>
            </li>

        </ul>
    </nav>
    @endguest
</div>
