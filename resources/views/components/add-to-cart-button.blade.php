
@if ($type == "users")
    <input
        class="large"
        type="submit"
        value="Edit Listing"
        onclick="window.location='{{ route('listings.edit', ['listing' => $artisan['id']]) }}'"
    />

    <form action="{{ route('listings.destroy', ['listing' => $artisan->id]) }}" method="POST">
        @csrf
        <input type="submit" value="Delete Listing"}/>
    </form>
@else
    <form class="text-center" action="{{ route('cart.add', ['listing' => $artisan->id]) }}" method="POST">
        @csrf
        <button
            type="submit"
            class="mt-8 bg-gray-600 font-bold hover:bg-gray-900 hover:text-white p-2"
            {{ ((Auth::check() && Auth::user()->id == $artisan->user_id) || (session()->exists('cart.'.$artisan->id)) ? 'disabled' : '') }}
        >
            {{ session()->exists('cart.'.$artisan->id) ? 'In Cart' : 'Add To Cart' }}
        </button>
    </form>
@endif

