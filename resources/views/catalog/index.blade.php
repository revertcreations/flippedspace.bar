@section('category_nav')
<x-category-nav route="catalog.index" />
@endsection

<x-layout>

    <h1 class="title">{{ $category != 'all' ? ucfirst($category)." " : "" }}Catalog</h1>

    <x-item-search-card :category="$category" />

    <div class="items-container">
    @if (isset($search_results))
        @foreach ($search_results as $collectible)
            @switch($collectible['category'])
                @case('artisans')
        <x-artisan-item-card :artisan='$collectible' />
                @break
            @endswitch
        @endforeach
    @elseif(!empty(old('search')))
    <div class="card">
        <div class="info">
            <h1 class="title">No results found.</h1>
        </div>
    </div>
    @endif

    </div>

</x-layout>
