<div class="card-wrap">

    <div class="card">

    @if ($type == "users")
        <div class="top-left-btn">
            <form action="{{ route('listings.artisans.edit', ['artisan_colorway_listing' => $artisan->id]) }}" method="GET">
                {{-- @csrf --}}
                {{-- <input type="hidden" name="user_artisan_colorway_id" value="{{ $artisan->id }}"> --}}
                <input class="no-m-top xx-large" type="submit" value="&#9998;">
            </form>
        </div>

        <div class="top-right-btn">

        @if ($artisan->listing->published)
            <form action="{{ route('listings.artisans.unpublish', ['artisan_colorway_listing' => $artisan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="no-m-top" type="submit" value="ON">
            </form>
        @else
            <form action="{{ route('listings.artisans.publish', ['artisan_colorway_listing' => $artisan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="no-m-top" type="submit" value="OFF">
            </form>
        @endif

        </div>
    @endif

        <div class="img-wrap">
            @foreach ($artisan->user_colorway->images as $i => $image)
                <img class="{{ ($i == 0 ? "current-img" : "") }}"
                    data-img-position="{{ $i+1 }}"
                    src="{{'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$image->cloudinary_public_id}}"
                    alt="{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})"

                />
            @endforeach
        </div>

        @if (count($artisan->user_colorway->images) > 1)
            <input onclick="next_listing_img(this)" class="img-arrow right" type="button" value="&rarr;">
            <input onclick="previous_listing_img(this)" class="img-arrow left" type="button" value="&larr;">
        @endif

        <div class="info">

            <h3 class="title">{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})</h3>

            <h4 class="seller">for sale by <a href="/users/{{ $artisan->user_colorway->user->id }}">{{ $artisan->user_colorway->user->username }}</a></h4>

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

            <input type="submit" value="Add To Cart" {{ $type == "users" ? 'disabled' : '' }} />

        </div>

    </div>

    {{-- @if (session('status') && session('status')->artisan_colorway_id == $artisan->id)
    <div class="card-status-bar success">
        <div class="message">Successfully added to your collection!</div>
    </div>
    @endif --}}

</div>
