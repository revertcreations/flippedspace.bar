<div x-data="{ open : false }" class="flex justify-center align-center ml-10 h-8 relative">

    <span class="bg-black absolute -top-2 -right-6 py-1 px-3 rounded-full text-white">{{ !empty(session('cart')) ? count(session('cart')) : 0 }}</span>
    <div
        class="bg-transparent cursor-pointer text-4xl active:-rotate-45 transform"
        value=""
        x-on:click="open = !open"
        @click.outside="open = false"
    >&#128722;</div>

    <div
        x-show="open"
        class="absolute bg-gray-50 flex-col p-4 right-8 shadow-2xl top-10 w-96"
        style="display: none;"
    >

        @if(!empty(session('cart')))

            @foreach (session('cart') as $listing_id => $cart_item)
                <div class="align-center border-b-4 border-black grid grid-cols-6 justify-center p-4">

                    <div class="col-span-3 font-bold">
                        {{ !empty($cart_item['search_string']) ? $cart_item['search_string'] : ''  }}
                    </div>

                    <div class="col-span-2 justify-self-end self-end">
                        ${{ $cart_item['price'] }}
                    </div>

                    <div class="col-span-1 justify-self-end">
                        <form action="{{ route('cart.item.remove', ['listing' => $listing_id]) }}" method="post">
                            @csrf
                            <button class="bg-black px-2 text-2xl text-white" type="submit">&times;</button>
                        </form>
                    </div>

                </div>
            @endforeach

            <div class="flex mt-10 justify-end">
                <a href="{{ route('cart') }}"><button class="bg-black font-bold hover:bg-gray-700 hover:text-white p-2" type="button">CART</button></a>
            </div>

        @else
            <div class="cart-item-wrap">
                <p>Nothing in your cart, looks like your wallet is safe for now.</p>
            </div>
        @endif

    </div>
</div>
