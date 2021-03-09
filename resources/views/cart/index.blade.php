<x-layout>

    <h1 class="title">Checkout</h1>

    <div class="items-container checkout">

        <div class="card cart-container">

            <h2>Order</h2>

            @foreach ($cart_items as $i => $listing)

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

            @if(count($cart_items) - 1 !== $i)
            <hr>
            @endif

            @endforeach

        </div>

        <div class="card totals">

            <h2>Totals</h2>

            <div class="sub">
                <h3>Sub Total</h3>
                <div>{{ '$220.00' }}</div>
            </div>

            <hr>

            <div class="shipping">
                <h3>Shipping</h3>
                <div>{{ '$16.00' }}</div>
            </div>

            <hr>

            <div class="total">
                <h2>Total </h2>
                <div>{{ '$238.00' }}</div>
            </div>

            <div style="align-self: flex-end">
                <input type="button" value="continue &rarr;" disabled>
            </div>
        </div>

        <div class="card contact">

            <h2>Contact Info</h2>

            <label for="f_name">First Name</label>
            <input type="text" name="f_name">

            <label for="l_name">Last Name</label>
            <input type="text" name="l_name">

            <label for="email">Email</label>
            <input type="text" name="email">

            <div class="tos-wrap">
                <input type="checkbox" name="tos" id="tos">
                <label for="tos">by checking this box you agree to flippedspace.bar's <a onclick="">terms of use</a> and <a onclick="">privacy policy</a></label>
            </div>

        </div>

        <div class="card shipping-address">

            <h2>Shipping Address</h2>

            <form action="{{ route('address.validate') }}" method="POST">

                @csrf

                <label for="address1">Address</label>
                <input type="text" name="address1">

                <label for="address2">Address 2</label>
                <input type="text" name="address2">

                <label for="state">State</label>
                <input type="text" name="state">

                <label for="country">Country</label>
                <input type="text" name="country">

                <label for="zip">Zip</label>
                <input type="text" name="zip">

                <button type="submit">ValidateAddress</button>
            </form>

        </div>

        {{-- <div class="card submit">


        </div> --}}

    </div>

</x-layout>
