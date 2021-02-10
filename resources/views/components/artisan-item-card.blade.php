<div class="card-wrap">
    <div id="artisan_card_{{ $artisan["id"] }}" class="card">
        <img class="current-img" src="{{ $artisan['keycap_archivist_img'] }}" alt="{{ $artisan['artisan_name'] }} : {{ $artisan['sculpt_name'] }} - {{ $artisan['artisan_name'] }}"></img>
        <div class="info">
            <h2 class="title">
                @if (!empty($artisan['website']))
                    <a target="_blank" href="{{ $artisan['website'] }}">{{ $artisan['artisan_name'] }}</a>
                @else
                    {{ $artisan['artisan_name'] }}
                @endif
            </h2>
            <h3 class="detail">{{ $artisan['sculpt_name'] }}</h3>
            <h3 class="detail">{{ $artisan['colorway_name'] }}</h3>

            <form action="{{ route('collections.artisans.store') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id" value="artisan_card_{{ $artisan['id'] }}">
                <input type="hidden" name="artisan_colorway_id" value="{{ $artisan['id'] }}">
                <input type="submit" value="&#43; Add To My Collection">
            </form>
        </div>
    </div>
    @if (session('id') && session('id') == $artisan['id'])
    <div class="card-status-bar success">
        <div class="message">Successfully added to your collection!</div>
    </div>
    @endif
</div>
