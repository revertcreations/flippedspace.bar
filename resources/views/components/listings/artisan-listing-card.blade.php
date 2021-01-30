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
                <input class="no-m-top on" type="submit" value="ON">
            </form>
        @else
            <form action="{{ route('listings.artisans.publish', ['artisan_colorway_listing' => $artisan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="no-m-top auto off" type="submit" value="OFF">
            </form>
        @endif

        </div>
    @endif

        <x-listing-img-wrap
            :images="$artisan->user_colorway->images"
            :alt="$artisan->colorway->artisan->name.' - '.$artisan->colorway->sculpt->name.' ('.$artisan->colorway->name.')'"/>

        <div class="info">

            <div class="title">
                <h2>{{ $artisan->colorway->artisan->name }}</h2>
                <h3>{{ $artisan->colorway->sculpt->name }}</h3>
                <h3>{{ $artisan->colorway->name }}</h3>
            </div>

            <h4 class="seller">sold by <a href="/users/{{ $artisan->user_colorway->user->id }}">{{ $artisan->user_colorway->user->username }}</a></h4>

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
