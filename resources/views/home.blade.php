<x-layout>

    {{-- @foreach($categories as $key => $category) --}}
    <div class="category-container">

        {{-- <h1>{{ $key }}</h1> --}}

        <div class="items-container">


        @forelse ($artisans as $artisan)
            <x-artisan-listing-card :artisan="$artisan" type="public" />
        @empty
            <div class="card-wrap">
                <div class="card">
                    <div class="img-wrap white xx-large"><pre>(╬ ಠ益ಠ)</pre></div>

                    <h3 class="title">Huh, nothing for sale? Bummmmer.</h3>

                    <div class="info">

                        <p>
                            Well, if you a platform to sell some keyboard stuffs, you found the right place. Listings are completely free,
                            and very small selling fee, and payment processing fee will be deducted from the final selling price.

                        </p>

                        <input type="button" value="Create Listing" onclick="window.location='{{route('collections.artisans.index')}}'">

                    </div>

                </div>
            </div>
        @endforelse

        </div>

    </div>
    {{-- @endforeach --}}

</x-layout>
