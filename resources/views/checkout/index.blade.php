<x-layout>
   
    <x-checkout-progress />
      <!-- <h1 class="title">Checkout</h1> -->

    <div class="grid grid-cols-5 p-10 mx-auto max-w-7xl">

        <div class="col-span-2 m-8 border-b-4 border-black bg-white p-5">
            
            <h2 class="mb-4">Contact Info</h2>

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
                  by checking this box you agree to flippedspace.bar's
                  <a onclick="">terms of use</a> and <a onclick="">privacy policy</a>
                </label>
            </div>

        </div>

        <div class="col-span-3 m-8 border-b-4 border-black bg-white p-5">

            <h2 class="mb-4">Order Summary</h2>

            @foreach ($cart_items as $i => $listing)
            <x-checkout-order :listing="$listing" />
            <hr>
            @endforeach

            <x-checkout-totals /> 

            <div style="self-end">
               <input type="button" value="continue &rarr;" disabled>
            </div>

        </div>

        <div class="col-span-2 m-8 border-b-4 border-black bg-white p-5">
            
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

    </div>

</x-layout>
