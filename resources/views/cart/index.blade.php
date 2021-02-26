<x-layout>

    <h1 class="title">Checkout</h1>

    <div class="items-container checkout">

        <div class="card cart-container">

            <h2>Order</h2>

            @foreach ($cart_items as $listing)
            <div class="cart-item">

                <div class="image-wrap">
                    <img width="150px" src="{{ $listing->image }}" alt="{{ $listing->item['search_string'] }}">
                </div>

                <div class="item-details">
                    <h3 class="item-title">{{ $listing->item['search_string'] }}</h3>

                    <div class="sold-by">sold by <a href="">{{ $listing->user->username }}</a></div>

                    <div class="price">
                        <div class="price">${{ $listing->price }}</div>
                        <div class="shipping">+ ${{ $listing->shipping_cost }} <span>shipping</span></div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="card shipping-address">
            <h2>Shipping Address</h2>


        </div>

        <div class="card totals">

            <h2>Totals</h2>

            <div class="sub-total">
                <h3>Sub Total</h3>
            </div>

            <div class="shipping">
                <h3>Shipping</h3>
            </div>

            <div class="total">
                <h2>Total </h2>
            </div>

        </div>

        <div class="card submit">

            <input type="button" value="continue &rarr;">

        </div>

    </div>

</x-layout>
