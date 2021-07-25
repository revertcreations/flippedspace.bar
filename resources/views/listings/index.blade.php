<x-layout>

    <h1 class="bg-white border-b-4 border-gray-900 w-11/12 md:w-1/2 xl:w-1/3 mx-auto p-8 text-center">{{ (request()->path() !== '/' && request()->path() !== 'all') ? ucfirst(request()->path()) : 'Classifieds' }}</h1>

    @if($listings->isEmpty())

    <div class="w-11/12 md:w-1/2 xl:w-1/3 p-8 text-center border-b-4 bg-gray-900 text-gray-50 mx-auto">
        <div>
            No {{  request('search') ? '"'.request('search').'"' : "" }} {{ (request()->path() !== '/' && request()->path() !== 'all') ? request()->path() : 'listings'}} {{ request('search') ? 'found' : 'right now, check back later...'}}
        </div>
    </div>
    @endif

    <div class="category-container">

        <div class="flex flex-wrap justify-between mx-auto">

        @foreach ($listings as $listing)
            @if($listing->category->name == 'artisans')
            <x-artisan-listing-card :artisan="$listing" type="public" />
            @endif
        @endforeach

        </div>
    </div>

</x-layout>
