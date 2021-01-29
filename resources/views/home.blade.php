<x-layout>

    {{-- @foreach($categories as $key => $category) --}}
    <div class="category-container">

        {{-- <h1>{{ $key }}</h1> --}}

        <div class="items-container">

        @foreach($artisans as $artisan)
            <x-artisan-listing-card :artisan="$artisan" type="public" />
        @endforeach

        </div>

    </div>
    {{-- @endforeach --}}

</x-layout>
