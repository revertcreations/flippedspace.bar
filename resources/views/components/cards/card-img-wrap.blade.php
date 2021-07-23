@if ($type=="users")
<div class="img-delete-wrap">

    @foreach($images as $i => $image)

    <div class="top-left-btn img-delete {{ ($i == 0 ? "current-img-delete" : "") }}">
        <form
            action="{{
                route(
                    'collection.images.destroy',
                    [
                        'catalog_key' => $catalogKey,
                        'cloudinary_public_id' => str_replace( '/', '_', $image['cloudinary_public_id'] )
                    ]
                )
            }}"
            method="POST"
        >
            @csrf
            <input type="hidden" name="cloudinary_public_id" value="{{ $image['cloudinary_public_id'] }}">
            <input
                class="no-m-top xx-large"
                type="submit"
                onclick="event.preventDefault();
                            if(confirm('Are you sure you want to delete this photo?'))
                                this.closest('form').submit();"
                value="&times;" />
        </form>
    </div>

    @endforeach

    <span class="top-left-btn img-delete"></span>
</div>
@endif

<div class="img-wrap">

@foreach ($images as $i => $image)

    <img class="{{ ($i == 0 ? "current-img" : "") }}"
        width="225px"
        height="225px"
        src="https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/{{ $image['cloudinary_public_id'] }}"
    />

@endforeach

@if ($type=="users")

    <span class="img {{ count($images) == 0 ? 'current-img' : ''}}">
        <form class="" action="{{ route('collection.images.store', ['catalog_key' => $catalogKey]) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="catalog_key" value="{{ $catalogKey }}">
            <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">
            <input class="no-m-top" value="Add Photos" type="submit" />
        </form>
    </span>

@endif
</div>

@if (count($images) > 1)

<button onclick="next_listing_img(this, '{{ $type }}')" class="absolute bg-black right-5 text-3xl top-1/4 w-8" type="button">&rarr;</button>
<button onclick="previous_listing_img(this, '{{ $type }}')" class="absolute bg-black left-5 text-3xl top-1/4 w-8" type="button">&larr;</button>

@endif
