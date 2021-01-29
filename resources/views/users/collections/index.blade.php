<x-layout>

    <h1>My Collection</h1>

    <div class="card-wrap">
        <div class="card search-container">
            <div class="info">
                <h2 class="title">Artisans</h2>
                <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
                <input type="button" onclick="window.location=('/products/artisans')" value="&#43; Add Artisans" />
            </div>
        </div>
    </div>
    <div class="items-container">
        @forelse ($artisans as $artisan)
        {{-- <x-item-card /> --}}
        <div class="card-wrap">
            <div class="card">

                {{-- <div class="top-left-btn">
                    <input class="no-m-top xx-large" type="button" value="&#9998">
                </div> --}}

                <div class="top-right-btn">
                    <form action="{{ route('collections.artisans.destroy', ['users_artisan_colorway_id' => $artisan->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="my_artisan_id" value="{{ $artisan->id }}">
                        <input class="no-m-top xx-large destroy" type="submit" value="&times;">
                    </form>
                </div>

                <img src="{{
                        !empty($artisan->images[0]) && !empty($artisan->images[0]->cloudinary_public_id)
                        ? 'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$artisan->images[0]->cloudinary_public_id
                        : $artisan->colorway->keycap_archivist_img
                    }}"
                    alt="{{ $artisan->colorway->artisan->name }} : {{ $artisan->colorway->sculpt->name }} - {{ $artisan->colorway->name }}" />

                <div class="info">
                    <h2 class="title">{{ $artisan->colorway->artisan->name }}</h2>
                    <h4 class="detail">{{ $artisan->colorway->sculpt->name }} {{ (!empty($artisan->colorway->name) ? "(".$artisan->colorway->name.")" : "" ) }}</h4>
                    <form action="{{ route('collections.artisans.images.store', ['users_artisan_colorway_id', $artisan->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="artisan_colorway_id" value="{{ $artisan->id }}">
                        <input type="hidden" name="my_artisan_id" value="{{ $artisan->id }}">
                        <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">
                        <input class="no-m-top" value="Add Photos" type="submit" />
                    </form>

                    @if (!empty($artisan->listing))
                        <input class="large" type="button" value="Edit Listing" onclick="window.location='{{ route('listings.artisans.edit', ['artisan_colorway_listing' => $artisan->listing->id]) }}'" />
                    @else
                        <input class="large" type="button" value="List For Sale" onclick="window.location='{{ route('listings.artisans.create', ['users_artisan_colorway' => $artisan->id]) }}'" />
                    @endif
                </div>

            </div>

            {{-- <div class="card-status-bar">
                <div class="message">
                    <a button="color:green" href="/my/listings/artisans">sell</a>
                </div>
            </div> --}}
        </div>

        @empty
        <div class="card-wrap">
            <div class="card">
                <div class="info">
                    <h2 style="text-align: center;">You don't have any artisans in your collection yet.</h2>
                </div>
            </div>
            {{-- <div class="card-status-bar search">
                <button onclick="window.location='{{ url('/my/collections/artisans') }}'">add artisans</button>
            </div> --}}

        </div>
        @endforelse
    </div>
</x-layout>
