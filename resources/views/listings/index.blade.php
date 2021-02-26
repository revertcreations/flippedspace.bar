<x-layout>

    @if(request()->path() !== '/' && request()->path() !== 'all')
    <h1 class="title">{{ ucfirst(request()->path()) }}</h1>
    @endif

    @if($listings->isEmpty())

    <div class="title-status-bar">
        <div>
            No {{  request('search') ? '"'.request('search').'"' : "" }} {{ (request()->path() !== '/' && request()->path() !== 'all') ? request()->path() : 'listings'}} {{ request('search') ? 'found' : 'right now, check back later...'}}
        </div>
    </div>
    @endif

    <div class="category-container">

        <div class="items-container">

        @foreach ($listings as $listing)
            @if($listing->item['category'] == 'artisans')
            <x-artisan-listing-card :artisan="$listing" type="public" />
            @endif
        @endforeach

        </div>
    </div>

</x-layout>
