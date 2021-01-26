<x-layout>

    <h1>My Collection</h1>

    <div class="card-wrap">
        <div class="card search-container">
            <div class="info">
                <h2 class="title">Artisans</h2>
                <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
                <input type="button" onclick="window.location=('/my/collections/artisans')" value="&#43; Add Artisans" />
            </div>
        </div>
    </div>
    <div class="items-container">
        @forelse ($my_artisans as $artisan)
        {{-- <x-item-card /> --}}
        <div class="card-wrap">
            <div class="card">

                <div class="img-edit">
                    <input class="no-m-top xx-large" type="button" value="&#9998;">
                </div>

                <div class="top-right-btn">
                    <form action="{{ route('myArtisans.destroy') }}" method="POST">
                        @csrf
                        <input type="hidden" name="my_artisan_id" value="{{ $artisan->my_artisan_id }}">
                        <input class="no-m-top xx-large destroy" type="submit" value="&times;">
                    </form>
                </div>

                <img src="{{ $artisan->keycap_archivist_img }}" alt="{{ $artisan->artisan->name }} : {{ $artisan->name }} - {{ $artisan->name }}"></img>

                <div class="info">
                    <h2 class="title">{{ $artisan->artisan->name }}</h2>
                    <h4 class="detail">{{ $artisan->sculpt->name }} {{ (!empty($artisan->name) ? "(".$artisan->name.")" : "" ) }}</h4>
                    <input type="button" value="List For Sale" onclick="window.location='{{ url('my/listing/artisans') }}'" />
                </div>

            </div>

            {{-- <div class="card-status-bar">
                <div class="message">
                    <a button="color:green" href="/my/listings/artisans">sell</a>
                </div>
            </div> --}}
        </div>

        @empty
        <div class="card-wrap">
            <div class="card">
                <div class="info">
                    <h2 style="text-align: center;">You don't have any artisans in your collection yet.</h2>
                </div>
            </div>
            {{-- <div class="card-status-bar search">
                <button onclick="window.location='{{ url('/my/collections/artisans') }}'">add artisans</button>
            </div> --}}

        </div>
        @endforelse
    </div>
</x-layout>
