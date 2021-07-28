<div id="artisan_card_{{ $artisan["id"] }}" class="card-wrap">

    <div class="card">
        <img class="current-img"
            src="{{ $artisan['keycap_archivist_img'] }}" alt="{{ $artisan['artisan_name'] }} : {{ $artisan['sculpt_name'] }} - {{ $artisan['artisan_name'] }}"></img>
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
                <input type="submit" value="&#43; Add To My Collection" onclick="post('{{ route('collection.store', ['category' => $artisan['category'], 'catalog_key' => $artisan['id']]) }}')">
            </form>
        </div>
    </div>

    <div id="artisan_card_status_bar_{{ $artisan['id'] }}"class="card-status-bar success hidden">
        <div class="message">Successfully added to your collection!</div>
    </div>

</div>
