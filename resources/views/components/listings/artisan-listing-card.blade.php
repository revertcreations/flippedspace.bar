<div class="card-wrap">

    <div class="card">

        <div class="top-left-btn">
            <form action="{{ route('listings.artisans.edit', ['artisan_listing_id' => $artisan->listing->id]) }}" method="GET">
                {{-- @csrf --}}
                {{-- <input type="hidden" name="user_artisan_colorway_id" value="{{ $artisan->id }}"> --}}
                <input class="no-m-top xx-large" type="submit" value="&#9998;">
            </form>
        </div>

        <div class="top-right-btn">
            @if ($artisan->listing->published)
            <form action="{{ route('listings.artisans.unpublish', ['artisan_listing_id', $artisan->listing->id]) }}" method="POST">
                @csrf
                <input class="no-m-top" type="submit" value="ON">
            </form>
            @else
            <form action="{{ route('listings.artisans.publish', ['artisan_listing_id', $artisan->listing->id]) }}" method="POST">
                @csrf
                <input class="no-m-top" type="submit" value="OFF">
            </form>
            @endif

        </div>

        <div class="img-wrap">
            <img src="{{
                !empty($artisan->user_colorway->images[0]) && !empty($artisan->user_colorway->images[0]->cloudinary_public_id)
                ? 'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$artisan->user_colorway->images[0]->cloudinary_public_id
                : $artisan->colorway->keycap_archivist_img
            }}"
            alt="{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})">
            </img>
        </div>

        <div class="info">

            <h3 class="title">{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})</h3>
            <h5 class="seller">for sale by <a href="/users/{{ $artisan->user_colorway->user->id }}">{{ $artisan->user_colorway->user->username }}</a></h5>

            <div class="condition-wrap">
                <div>{{ $artisan->listing->condition }}</div>
                <div class="condition {{ strtolower(str_replace(' ', '-', $artisan->listing->condition)) }}">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="price">
                ${{ $artisan->listing->price }} + ${{ $artisan->listing->shipping_cost }} <small>shipping</small>
            </div>

            <input type="submit" value="Add To Cart" disabled />

        </div>

    </div>

    {{-- @if (session('status') && session('status')->artisan_colorway_id == $artisan->id)
    <div class="card-status-bar success">
        <div class="message">Successfully added to your collection!</div>
    </div>
    @endif --}}

</div>
