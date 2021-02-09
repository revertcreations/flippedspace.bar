@if ($type=="users")
<div class="img-delete-wrap">

    @foreach($images as $i => $image)

    <div class="top-left-btn img-delete {{ ($i == 0 ? "current-img-delete" : "") }}">
        <form action="{{ route('collections.artisans.images.destroy', $image['cloudinary_public_id']) }}" method="POST">
            @csrf
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
        width="300px"
        height="300px"
        src="https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/{{ $image['cloudinary_public_id'] }}"
    />

@endforeach

@if ($type=="users")

    <span class="img {{ count($images) == 0 ? 'current-img' : ''}}">
        <form class="" action="{{ route('collections.artisans.images.store', ['artisan_colorway_id', $artisanColorwayId]) }}"
            method="POST"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="artisan_colorway_id" value="{{ $artisanColorwayId }}">
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
