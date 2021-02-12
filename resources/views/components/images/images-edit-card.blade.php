<div class="card-wrap">
    <div class="card">
        <h2 class="title">Images</h2>

    @if (!empty($images))
        @foreach ($images as $image)

        <div class="edit-img-wrap">

            <div class="top-left-btn">
            @if ($image->is_cover)
                <input class="no-m-top auto" type="submit" value="cover photo" disabled>
            @else
                <form action="{{ route('collection.images.set_cover', $image->id) }}" method="POST">
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
                <form action="{{ route('collection.images.destroy', ['catalog_key' => $catalogCategory.$catalogKey]) }}" method="POST">
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
                width="500px"
                src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/w_500,c_fit/v1611958305/'.$image->cloudinary_public_id.'.jpg'}}"
            />
        </div>

        @endforeach
    @endif
        <br>
        <form action="{{ route('collection.images.store', ['catalog_key' => $catalogKey]) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <input type="hidden" name="catalog_key" value="{{ $catalogKey }}">
            <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">

            <input class="no-m-top" value="Add Photos" type="submit" />

        </form>

    </div>
    @error('images_required')
    <div class="card-status-bar error">
        <div class="message">{{ $message }}</div>
    </div>
    @enderror
</div>
