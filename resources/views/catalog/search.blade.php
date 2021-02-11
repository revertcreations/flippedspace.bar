<x-layout>
    <h1 class="title">Artisans</h1>
    <x-item-search-card :value="old('search')" />
    <div class="items-container">
    @forelse ($search_results as $artisan)
        <x-artisan-item-card :artisan="$artisan"/>
    @empty
        @if(!empty(old('search')))
        <div class="card">
            <div class="info">
                <h1 class="title">No results found.</h1>
            </div>
        </div>
        @endif
    @endforelse
    </div>
</x-layout>
