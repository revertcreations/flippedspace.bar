<x-layout>

    <h1 class="title">Current Listings</h1>

    <div class="category-container">

        <div class="items-container">

        @forelse ($artisans as $artisan)
            <x-artisan-listing-card :artisan="$artisan" type="public" />
        @empty
            <div class="card-wrap">
                <div class="card search-container">
                    <h2 class="title"><pre>( ಠ益ಠ)</pre> Bummer, nothing for sale.</h2>

                    <div class="info">
                        <h3>Quick tip:</h3>
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



{{-- <form action="{{ route('listings.create') }}" method="GET">
    <div class="card-wrap">

        <div class="card search-container">
            <h2 class="title">Search Catalog</h2>
            <div class="info max-width">
                <label for="search">
                    Search catalog to find the item you are listing for sale...
                </label>
                <input name="search" type="text" value="{{ old('search') }}" placeholder="search for your keyboard item...">
                <input type="submit" value="&#9906; Find"/>
            </div>
        </div>

        <div class="card-status-bar search-container">
            <p>
                Our database has a lot of items, but it isn't complete by any means. If you are unable to find the keyboard related item you wish to sell, create
                a catalog update request below. We'll verify the product, and add it to our database if verified. Once added, the item will be automatically added
                to your collection, and you'll be able to continue your listing process.
            </p>
            <input type="button" value="Add Item" onclick="window.location='{{ route('catalog.user.submission') }}'">
        </div>

    </div>
</form> --}}
