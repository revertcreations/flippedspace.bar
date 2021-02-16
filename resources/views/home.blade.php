<x-layout>

    {{-- <h1 class="title">Current Listings</h1> --}}

    <div class="category-container">

        <div class="items-container">

        @forelse ($listings as $listing)
            @if($listing->item['category'] == 'artisans')
            <x-artisan-listing-card :artisan="$listing" type="public" />
            @endif
        @empty
            <div class="card-wrap">
                <div class="card search-container">
                    <h2 class="title"><pre>( ಠ益ಠ)</pre> Bummer, nothing for sale.</h2>

                    <div class="info">
                        Sign in to set up item alerts. You can get notified when your endgame shows up!
                    </div>
                </div>

                @auth
                <div class="card-status-bar search-container">
                    <p>
                        Got something you want to sell? Listings are totally free. A 3.25% selling fee in addition to 2.9%+$0.25
                        payment processing fee will be deducted from final selling price.
                    </p>

                    <input type="button" value="Create Listing" onclick="window.location='{{ route('listings.create') }}'">

                    <input type="button" value="Learn More" onclick="window.location='{{ route('listings.create') }}'">
                </div>
                @endauth

                @guest
                <div class="card-status-bar search-container">
                    <h4>Welcome!</h4>
                    <p>
                        Looks like we got nothing being sold at the moment. Feel free to register and take advantage of some of the cool features
                        we have! Such as selling, creating wish lists, watch lists, share your collection, and more!
                    </p>
                <div class="card-status-bar search-container">
                @endguest

            </div>
        @endforelse

        </div>

    </div>

</x-layout>
