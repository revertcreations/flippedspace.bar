<div class="card">
    @foreach ($artisan->user_colorway->images as $image)
    <img class="current-img"
        src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/w_500,c_fit/v1611958305/'.$image->cloudinary_public_id.'.jpg'}}"
    />
    <br>
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
