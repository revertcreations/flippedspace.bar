<x-layout>
    <h1>My Collection</h1>

    <h2>Artisans</h2>

    <div class="items-container">
        <div class="card-wrap">
            <div class="card">
                <div class="info">
                    <a href="/my/collections/artisans"><h2 class="title">&#43;</h2></a>

                </div>
            </div>
        </div>
        @forelse ($my_artisans as $artisan)
        {{-- <x-item-card /> --}}
        <div class="card-wrap">
            <div class="card">
                <img src="{{ $artisan->keycap_archivist_img }}" alt="{{ $artisan->artisan->name }} : {{ $artisan->name }} - {{ $artisan->name }}"></img>
                <div class="info">
                    <h2 class="title">{{ $artisan->artisan->name }}</h2>
                    <h4 class="detail">{{ $artisan->sculpt->name }} {{ (!empty($artisan->name) ? "(".$artisan->name.")" : "" ) }}</h4>
                </div>
            </div>
            <div class="card-status-bar">
                <div class="message"><a style="color:green" href="/my/collections/artisans">sell</a></div>
            </div>
        </div>

        @empty
        <div class="card-wrap">
            <div class="card">
                <div class="info">
                    <h2 style="text-align: center;">You don't have any artisans in your collection yet.</h2>
                </div>
            </div>
            <div class="card-status-bar">
                <div class="message"><a style="color:red" href="/my/collections/artisans">add artisans</a></div>
            </div>
        </div>
        @endforelse
    </div>
</x-layout>
