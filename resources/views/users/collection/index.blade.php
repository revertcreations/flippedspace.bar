@section('category_nav')
<x-category-nav route="collection" />
@endsection

<x-layout>

    <h1 class="title">Collection</h1>
    @if(count($collectibles) < 1)
    <div class="card search-container">
        <div class="info">
            <h2 style="text-align: center;">You don't have {{!empty($category) ? 'any '.$category : 'anything'}} in your collection yet.</h2>
        </div>
    </div>
    @endif

    @if (!empty(request()->category) && request()->category == 'artisans')
    <div class="card search-container">
        <div class="info">
            <h2 class="title">Artisans</h2>
            <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
            <input type="submit" onclick="window.location=('{{ route('catalog.index', ['filter' => 'artisans']) }}')" value="&#43; Add Artisans" />
        </div>
    </div>
    @endif

    <div class="items-container">
        @foreach ($collectibles as $item)

        <div id="artisan_card_{{ $item["id"] }}" class="card-wrap">
            <div class="card listing">

            <x-card-img-wrap
                    :images="$item['images']"
                    :category="$item['category']"
                    :catalog_key="$item['id']"
                    :alt="$item['colorway_name']"
                    type="users"
                />

                <div class="info">

                    <h2 class="title">{{ $item['artisan_name'] }}</h2>
                    <h3 class="detail">{{ $item['sculpt_name'] }}</h3>
                    {!! (!empty($item['colorway_name']) ? "<h4 class='detail'>".$item['colorway_name']."</h4>" : "" ) !!}

                    @if (!empty($item->listing))
                        <input
                            class="large"
                            type="button"
                            value="Edit Listing"
                            onclick="window.location='{{ route('listings.edit', ['catalog_key' => $item['id']]) }}'"
                        />
                    @else
                        <input
                            class="large"
                            type="button"
                            value="List For Sale"
                            onclick="window.location='{{ route('listings.create', ['category' => $item['category'], 'catalog_key' => $item['id']]) }}'"
                        />


                        <input
                            class="no-m-top large destroy"
                            type="submit"
                            value="Remove From Collection"
                            onclick="event.preventDefault();
                                        if(confirm('Are you sure you want to delete this from your artisans collection?'))
                                            post('{{ route('collection.destroy', ['category' => $item['category'], 'catalog_key' => $item['id']]) }}');"
                        />

                    @endif
                </div>

            </div>
            @error('empty_file')
                <div class="card-status-bar">{{ $message }}</div>
            @enderror
        </div>

        @endforeach
    </div>
</x-layout>
