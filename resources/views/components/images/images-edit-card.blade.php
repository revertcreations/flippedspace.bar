<div class="card-wrap">
<div class="card">
    <h2 class="title">Add Images</h2>
    @foreach ($artisan->user_colorway->images as $image)

    <div class="edit-img-wrap">

        <div class="top-left-btn">
        @if ($image->is_cover)
            <input class="no-m-top auto" type="submit" value="cover photo" disabled>
        @else
            <form action="{{ route('collections.artisans.images.set_cover', $image->id) }}" method="POST">
                @csrf
                @method('PUT')
                <input
                    class="no-m-top auto"
                    type="submit"
                    value="cover photo?" />
            </form>
        @endif
        </div>

        <div class="top-right-btn">
            <form action="{{ route('collections.artisans.images.destroy', $image->id) }}" method="POST">
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

        <img class="current-img"
            src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/w_500,c_fit/v1611958305/'.$image->cloudinary_public_id.'.jpg'}}"
        />
    </div>

    @endforeach
    <br>
    <form action="{{ route('collections.artisans.images.store', ['users_artisan_colorway_id' => $artisan->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="artisan_colorway_id" value="{{ $artisan->id }}">
        <input type="hidden" name="my_artisan_id" value="{{ $artisan->id }}">
        <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">

        <input class="no-m-top" value="Add Photos" type="submit" />

    </form>

</div>
</div>
