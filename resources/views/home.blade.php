<x-layout>

    @foreach($categories as $key => $category)
    <div class="category-container">
        <h1>{{ $key }}</h1>
        <div class="items-container">
        @foreach($category as $artisan)
        <div class="card-wrap">
            <div class="card">
                <img src="{{ $artisan->keycap_archivist_img }}" alt="{{ $artisan->artisan->name }} : {{ $artisan->sculpt->name }} - {{ $artisan->name }}"></img>
                <div class="info">
                    <h2 class="title">{{ $artisan->artisan->name }}</h2>
                    <h4 class="detail">{{ $artisan->sculpt->name }} {{ (!empty($artisan->name) ? "(".$artisan->name.")" : "" ) }}</h4>
                    <div class="price">$ {{ number_format(rand(25, 190), 2) }} {!! (rand(0,1000) > 777 ? '<small class="offers">[offers]</small>' : '' ) !!}</div>
                    <small class="user"></span>Sale by</span> revertcreations</small>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    @endforeach

</x-layout>
