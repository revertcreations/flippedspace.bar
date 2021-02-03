<div class="img-wrap">
@foreach ($images as $i => $image)

    <img class="{{ ($i == 0 ? "current-img" : "") }}"
        width="300px"
        height="300px"
        src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$image->cloudinary_public_id}}"
        alt="{{ $alt }})"
    />

@endforeach

@if ($type=="users")

    <span class="img {{ count($images) == 0 ? 'current-img' : ''}}">
        <form class="" action="{{ route('collections.artisans.images.store', ['users_artisan_colorway_id', $usersArtisanColorwayId]) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="artisan_colorway_id" value="{{ $artisanColorwayId }}">
            <input type="hidden" name="users_artisan_colorway_id" value="{{ $usersArtisanColorwayId }}">
            <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">
            <input class="no-m-top" value="Add Photos" type="submit" />
        </form>
    </span>

@endif
</div>


@if (count($images) > 1)

<input onclick="next_listing_img(this)" class="img-arrow right" type="button" value="&rarr;">
<input onclick="previous_listing_img(this)" class="img-arrow left" type="button" value="&larr;">

@endif
