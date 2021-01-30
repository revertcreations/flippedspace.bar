<div class="img-wrap">

    @forelse ($images as $i => $image)
        <img class="{{ ($i == 0 ? "current-img" : "") }}"
            data-img-position="{{ $i+1 }}"
            src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$image->cloudinary_public_id}}"
            alt="{{ $alt }})"
        />
    @empty
        <h2>Add Photos</h2>
    @endforelse
</div>

@if (count($images) > 1)
    <input onclick="next_listing_img(this)" class="img-arrow right" type="button" value="&rarr;">
    <input onclick="previous_listing_img(this)" class="img-arrow left" type="button" value="&larr;">
@endif
