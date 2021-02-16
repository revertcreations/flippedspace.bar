<x-layout>

    <h1 class="title">{{ ucfirst(request()->path()) }}</h1>

    @if($listings->isEmpty())

    <div class="title-status-bar">
        <div>No {{  request('search') ? '"'.request('search').'"' : "" }} {{ request()->path() }} {{ request('search') ? 'found' : 'right now, check back later...'}}</div>
    </div>
    @endif

    <div class="category-container">

        <div class="items-container">

        @foreach ($listings as $listing)
            @if($listing->item['category'] == 'artisans')
            <x-artisan-listing-card :artisan="$listing" type="public" />
            @endif
        @endforeach

</x-layout>
