<nav class="bg-gray-100 flex flex-wrap justify-around main-nav w-full">

    {{-- {{ dd(session('cart')) }} --}}

    <x-logo></x-logo>

    <div class="search-cart-wrap">

        <form class="" action="{{ route('search') }}" method="POST">
            <div class="flex flex-row self-center relative w-80 h-12">
                @csrf
                <input
                    class="border border-b-2 border-gray-700"
                    name="search"
                    type="text"
                    value="{{request('search')?:''}}"
                    placeholder="search &amp; watch the wallet burn..."
                />
                <button class="bg-black px-4 text-4xl hover:border-b-2 hover:border-black hover:bg-gray-200" type="submit"><div class="transform rotate-45">&#9906;</div></button>
            </div>
        </form>

        <x-nav-cart />

    </div>

</nav>
