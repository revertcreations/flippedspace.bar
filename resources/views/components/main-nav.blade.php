<nav class="main-nav">

    <x-logo></x-logo>

    <div class="search-cart-wrap">

        <form class="listing-search-form" action="{{ route('listings.search') }}" method="POST">
            <div class="search-bar">
                @csrf
                <input name="search" type="text" placeholder="search &amp; watch the wallet burn...">
                <button type="submit">&#9906;</button>
            </div>
        </form>

        <div class="cart-wrap">
            <input type="button" value="cart 0 $0.00" />
        </div>

    </div>



</nav>
