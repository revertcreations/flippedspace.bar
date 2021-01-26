<div class="card-wrap">
    <div class="card">
        <img src="{{ $artisan->keycap_archivist_img }}" alt="{{ $artisan->artisan->name }} : {{ $artisan->sculpt->name }} - {{ $artisan->name }}"></img>
        <div class="info">
            <h2 class="title">
                @if (!empty($artisan->website))
                    <a target="_blank" href="{{ $artisan->website }}">{{ $artisan->artisan_name }}</a>
                @else
                    {{ $artisan->artisan_name }}
                @endif
            </h2>
            <h3 class="detail">{{ $artisan->sculpt_name }}</h3>
            <h3 class="detial">{{ $artisan->name }}</h3>

            <form action="{{ route('myArtisans.add') }}" method="POST">
                @csrf
                <input type="hidden" name="artisan_colorway_id" value="{{ $artisan->id }}">
                <input type="submit" value="&#43; Add To My Collection">
            </form>
        </div>
    </div>
</div>
