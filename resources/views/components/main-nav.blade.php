<nav class="main-nav">

    <x-logo></x-logo>

    <div class="search-cart-wrap">

        <div class="search-bar">
            <label for="site-search" class="search-icon">&#9906;</label for="site-search">
            <input name="site-search" type="text" placeholder="search &amp; watch the wallet burn...">
        </div>

        <div class="cart-wrap">
            <div class="icon">cart <span class="count">{{!empty(session('cart')) ? session('cart')->count() : 0 }}</span> $<span class="total">0.00</span></div>
        </div>

    </div>



</nav>
