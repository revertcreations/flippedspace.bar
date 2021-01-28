<x-layout>

    <h1>Current listings</h1>

@foreach($listings as $artisan)
    <x-artisan-listing-card :artisan="$artisan" />
@endforeach

</x-layout>
