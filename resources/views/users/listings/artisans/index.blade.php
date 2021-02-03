<x-layout>

    <h1 class="title">Artisan Listings</h1>

    <div class="items-container">

    @foreach($listings as $artisan)
        <x-artisan-listing-card :artisan="$artisan" type="users" />
    @endforeach

    </div>

</x-layout>
