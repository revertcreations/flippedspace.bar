<x-layout>

    <h1>Current listings</h1>
    <div class="items-container row-scroll">
@foreach($listings as $artisan)
    <x-artisan-listing-card :artisan="$artisan" />
@endforeach
    </div>
</x-layout>
