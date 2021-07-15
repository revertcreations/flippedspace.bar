<x-layout>

    <h1 class="title">{{ (request()->path() !== '/' && request()->path() !== 'all') ? ucfirst(request()->path()) : 'Classifieds' }}</h1>

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
