<x-layout>

    <div class="flex-form">

        <x-artisan-listing-card :artisan="$listing" type="public" />

        <div class="card-wrap">
            <div class="card">
                {{-- {{ dd($listing->item['images']) }} --}}

                @foreach ($listing->item['images'] as $i => $image)

                <img class="{{ ($i == 0 ? "current-img" : "") }}"

                    src="https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/{{ $image['cloudinary_public_id'] }}"
                />

            @endforeach
            </div>
        </div>

    </div>

</x-layout>
