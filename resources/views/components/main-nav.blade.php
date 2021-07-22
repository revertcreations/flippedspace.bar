<nav class="main-nav">

    {{-- {{ dd(session('cart')) }} --}}

    <x-logo></x-logo>

    <div class="search-cart-wrap">

        <form class="listing-search-form" action="{{ route('search') }}" method="POST">
            <div class="search-bar">
                @csrf
                <input name="search" type="text" value="{{request('search')?:''}}" placeholder="search &amp; watch the wallet burn...">
                <button type="submit">&#9906;</button>
            </div>
        </form>

        <x-nav-cart />

    </div>

</nav>
