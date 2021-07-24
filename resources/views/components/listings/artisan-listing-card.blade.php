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

        <div class="info">
            <a href="{{ route('listing.show', ['listing' => $artisan->id]) }}">
                <div class="title">
                    <h2>{{ $artisan->artisan_name }}</h2>
                    <h3>{{ $artisan->sculpt_name }}</h3>
                    <h3>{{ $artisan->colorway_name }}</h3>
                </div>
            </a>

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

        </div>

    </div>

    @if (session('status') && session('listing_id') == $artisan->id)
        <div class="auto-remove card-status-bar success">
            <div class="message">{{ session('status') }}</div>
        </div>
    @endif

</div>


<script>
    var auto_remove_status_bars = document.querySelectorAll('.auto-remove.card-status-bar')
    var clear_status_bar_message = setTimeout(() => {
        for (let i = 0; i < auto_remove_status_bars.length; i++) {
            const element = auto_remove_status_bars[i].remove();
        }
    }, 5000);

</script>
