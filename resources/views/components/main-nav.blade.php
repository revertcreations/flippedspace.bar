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

        <div class="cart-wrap" style="position: relative">

            <span class="count">{{ !empty(session('cart')) ? count(session('cart')) : 0 }}</span>
            <input type="button" value="&#128722;" onclick="toggle_cart_details()" />


            <div id="cart_details" class="cart-details">
                <h2>Cart</h2>
                @if(!empty(session('cart')))
                @foreach (session('cart') as $listing_id => $cart_item)
                <div class="cart-item-wrap">

                    <div class="title">{{ !empty($cart_item['search_string']) ? $cart_item['search_string'] : ''  }}</div>
                    <div class="price">${{ $cart_item['price'] }}</div>
                    <form action="{{ route('cart.item.remove', ['listing' => $listing_id]) }}" method="post">
                        @csrf
                        <input class="remove-cart-item" type="submit" value="&times;">
                    </form>

                </div>
                @endforeach

                <div class="total">
                    <h5 class="h-mb-0">TOTAL</h5>
                    <span class="amount">${{ number_format(session('cart_total'), 2) }}</span>
                </div>

                <div class="checkout">
                    <input type="button" value="Checkout" onclick="window.location='{{ route('checkout') }}'">
                </div>

            </div>

            @else
            <div class="cart-item-wrap">
                <p>Nothing in your cart, looks like your wallet is safe for now.</p>
            </div>
            @endif
        </div>

    </div>

</nav>
