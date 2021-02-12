<div class="card-wrap">
    <div id="artisan_card_{{ $collectible["id"] }}" class="card">
        <img class="current-img" src="{{ $collectible['keycap_archivist_img'] }}" alt="{{ $collectible['artisan_name'] }} : {{ $collectible['sculpt_name'] }} - {{ $collectible['artisan_name'] }}"></img>
        <div class="info">
            <h2 class="title">
                @if (!empty($collectible['website']))
                    <a target="_blank" href="{{ $collectible['website'] }}">{{ $collectible['artisan_name'] }}</a>
                @else
                    {{ $collectible['artisan_name'] }}
                @endif
            </h2>
            <h3 class="detail">{{ $collectible['sculpt_name'] }}</h3>
            <h3 class="detail">{{ $collectible['colorway_name'] }}</h3>

            <form action="{{ route('collection.store') }}" method="POST">
                @csrf
                <input type="hidden" name="card_id" value="artisan_card_{{ $collectible['id'] }}">
                <input type="hidden" name="artisan_colorway_id" value="{{ $collectible['id'] }}">
                <input type="submit" value="&#43; Add To My Collection">
            </form>
        </div>
    </div>
    @if (session('id') && session('id') == $collectible['id'])
    <div class="card-status-bar success">
        <div class="message">Successfully added to your collection!</div>
    </div>
    @endif
</div>
