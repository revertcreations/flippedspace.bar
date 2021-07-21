<x-layout>

    <h1 class="title">Checkout</h1>

    <div class="items-container checkout">

        <div class="card cart-container">

            <h2>Order</h2>

            @foreach ($cart_items as $i => $listing)

                @livewire('checkout-order', ['listing' => $listing])

                <hr>

            @endforeach

        </div>
          
        <x-cards.card />
        <div class="card contact">

            <h2>Contact Info</h2>

            <label for="f_name">First Name</label>
            <input type="text" name="f_name">

            <label for="l_name">Last Name</label>
            <input type="text" name="l_name">

            <label for="email">Email</label>
            <input type="text" name="email">

            <label for="password">Password</label>
            <input type="password" name="password">

            <div class="tos-wrap">
                <input type="checkbox" name="tos" id="tos">
                <label for="tos">
                  by checking this box you agree to flippedspace.bar's <a onclick="">terms of use</a> and <a onclick="">privacy policy</a>
                </label>
            </div>

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


                <label for="city">City</label>
                <input type="text" name="city">

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
