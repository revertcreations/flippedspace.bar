<div class="card-wrap">

    <div id="listing_{{ $artisan->id }}" class="card listing">

    @if ($type == "users")

        <div class="top-right-btn">

        @if ($artisan->published)
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

        <x-card-img-wrap
            :images="$artisan->item['images']"
            category="artisans"
            :catalog_key="$artisan->catalog_key"
            :alt="$artisan->colorway_name"
            :type="$type"
        />

        <div class="w-56 info p-4">
            <div class="">
                    <a href="{{ route('listing.show', ['listing' => $artisan->id]) }}">
                    <h2>{{ $artisan->item['artisan_name'] }}</h2>
                    <h3>{{ $artisan->item['sculpt_name'] }}</h3>
                    <h3>{{ $artisan->item['colorway_name'] }}</h3>
                </a>
            </div>

            <small class="text-gray-500">sold by <a href="/users/{{ $artisan->user_id }}">{{ $artisan->user->username }}</a></small>

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

            <div class="font-bold text-right mt-4">
                ${{ $artisan->price }}
            </div>

        </div>

    </div>

    @if (session('status') && session('listing_id') == $artisan->id)
        <div class="auto-remove card-status-bar success">
            <div class="message">{{ session('status') }}</div>
        </div>
    @endif

</div>

