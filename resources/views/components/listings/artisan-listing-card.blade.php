<div class="card-wrap">

    <div class="card">

    @if ($type == "users")

        <div class="top-right-btn">

        @if ($artisan['published'])
            <form action="{{ route('listings.unpublish', ['listing' => $artisan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="no-m-top on" type="submit" value="ON">
            </form>
        @else
            <form action="{{ route('listings.publish', ['listing' => $artisan->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <input class="no-m-top auto off" type="submit" value="OFF">
            </form>
        @endif

        </div>
    @endif
        {{-- {{ dd($artisan->item) }} --}}
        <x-card-img-wrap
            :images="$artisan->item['images']"
            :category="$artisan->item['category']"
            :catalog_key="$artisan->item['id']"
            :alt="$artisan->item['colorway_name']"
            :type="$type"
        />

        <div class="info">

            <div class="title">
                <h2>{{ $artisan->item['artisan_name'] }}</h2>
                <h3>{{ $artisan->item['sculpt_name'] }}</h3>
                <h3>{{ $artisan->item['colorway_name'] }}</h3>
            </div>

            <h4 class="seller">sold by <a href="/users/{{ $artisan->user_id }}">{{ $artisan->user->username }}</a></h4>

            <div class="condition-wrap">
                <div>{{ $artisan->condition->name }}</div>
                <div class="condition {{ strtolower(str_replace(' ', '-', $artisan->condition->name)) }}">
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
                ${{ $artisan->price }} + ${{ $artisan->shipping_cost }} <small>shipping</small>
            </div>

            @if ($type == "users")
            <input
                class="large"
                type="submit"
                value="Edit Listing"
                onclick="window.location='{{ route('listings.edit', ['listing' => $artisan['id']]) }}'"
            />
            @else
                <form action="{{ route('cart.add', ['listing' => $artisan->id]) }}" method="POST">
                    @csrf
                    <input type="submit" value="Add To Cart" {{ (Auth::check() && Auth::user()->id == $artisan->user_id ? 'disabled' : '') }}/>
                </form>
            @endif

        </div>

    </div>

    {{-- @if (session('status') && session('status')->artisan_colorway_id == $artisan->id)
    <div class="card-status-bar success">
        <div class="message">Successfully added to your collection!</div>
    </div>
    @endif --}}

</div>
