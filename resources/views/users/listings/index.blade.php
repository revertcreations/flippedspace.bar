<x-layout>

    <h1 class="title">Listings</h1>

    <div class="items-container">

    @forelse ($listings as $artisan)
        <x-artisan-listing-card :artisan="$artisan" type="users" />
    @empty
        <div class="card-wrap">

            <div class="card search-container">
                <h2 class="title"><pre>( ಠ益ಠ)</pre>You don't have any listings for sell right now.</h2>
            </div>

            <div class="card-status-bar search-container">
                <p>
                    Got something you want to sell? Listings are totally free. A 3.25% selling fee in addition to 2.9%+$0.25
                    payment processing fee will be deducted from final selling price.
                </p>

                <input type="button" value="Create Listing" onclick="window.location='{{ route('listings.create') }}'">

                <input type="button" value="Learn More" onclick="window.location='{{ route('listings.create') }}'">
            </div>
        </div>
    @endforelse
    </div>

</x-layout>
