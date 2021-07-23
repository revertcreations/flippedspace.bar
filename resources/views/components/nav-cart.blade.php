<div
    x-data="{ open : false }"
    class="flex justify-center align-center ml-10 relative"
>

    <span
        class="bg-black absolute -top-2 -right-6 px-2 rounded-full text-white font-bold"
    >
            {{ !empty(session('cart')) ? count(session('cart')) : 0 }}
    </span>

    <button
        class="bg-gray-100 cursor-pointer text-4xl transform"
        value=""
        x-bind:class="open ? '-rotate-45' : 'hover:rotate-12'"
        x-on:click="open = !open"
        @click.outside="open = false"
    >
        &#128722;
</button>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200 transform"
        x-transition:enter-start="transform scale-0 -right-32 -top-52 w-40 rotate-45"
        x-transition:enter-end="transform scale-100 -right-0 -top-32 w-60 rotate-12"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="ransform scale-100 -right-0 -top-32 w-60 rotate-12"
        x-transition:leave-end="transform scale-0 -right-32 -top-44 w-40 rotate-45"
        class="absolute bg-gray-200 flex-col p-4 right-10 shadow-2xl top-8 w-96"
        style="display: none;"
    >

        @if(!empty(session('cart')))

            @foreach (session('cart') as $listing_id => $cart_item)
                <div class="align-center border-b-4 border-black grid grid-cols-6 justify-center p-4">

                    <div class="col-span-1">
                        <form action="{{ route('cart.item.remove', ['listing' => $listing_id]) }}" method="post">
                            @csrf
                            <button class="bg-gray-200 text-4xl text-black hover:bg-gray-200 transform hover:rotate-12" type="submit">&#128465;</button>
                        </form>
                    </div>
                   
                    <div class="col-span-3 font-bold">
                        {{ !empty($cart_item['search_string']) ? $cart_item['search_string'] : ''  }}
                    </div>

                    <div class="col-span-2 justify-self-end self-end">
                        ${{ $cart_item['price'] }}
                    </div>

                </div>
            @endforeach

            <div class="flex mt-10 justify-end">
                <a href="{{ route('cart') }}"><button class="bg-black font-bold hover:bg-gray-700 hover:text-white p-2" type="button">CART</button></a>
            </div>

        @else
            <div class="cart-item-wrap">
                <h2>Empty</h2>
                <p>...looks like your wallet is safe for now.</p>
            </div>
        @endif

    </div>
</div>
