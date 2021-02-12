@section('category_nav')
<x-category-nav route="collection" />
@endsection

<x-layout>

    <h1 class="title">Collection</h1>

    @if (app('request')->input('filter') == 'artisans')
    <div class="card-wrap">
        <div class="card search-container">
            <div class="info">
                <h2 class="title">Artisans</h2>
                <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
                <input type="submit" onclick="window.location=('{{ route('catalog.index', ['filter' => 'artisans']) }}')" value="&#43; Add Artisans" />
            </div>
        </div>
    </div>
    @endif

    <div class="items-container">
        @forelse ($collectibles as $item)

        <div class="card-wrap">
            <div class="card">

                <x-card-img-wrap
                    :images="$item['images']"
                    :category="$item['category']"
                    :catalog_key="$item['id']"
                    type="users"
                    :alt="$item['colorway_name']"
                />

                <div class="info">

                    <h2 class="title">{{ $artisan['artisan_name'] }}</h2>
                    <h3 class="detail">{{ $artisan['sculpt_name'] }}</h3>
                    {!! (!empty($artisan['colorway_name']) ? "<h4 class='detail'>".$artisan['colorway_name']."</h4>" : "" ) !!}


                    @if (!empty($artisan->listing))
                        <input
                            class="large"
                            type="button"
                            value="Edit Listing"
                            onclick="window.location='{{ route('listings.edit', ['artisan_colorway_listing' => $artisan->artisan_colorway_listing->id]) }}'"
                        />
                    @else
                        <input
                            class="large"
                            type="button"
                            value="List For Sale"
                            onclick="window.location='{{ route('listings.create', ['users_artisan_colorway' => $artisan['id']]) }}'"
                        />

                        <form action="{{ route('collection.destroy', ['catalog_key' => $artisan['id']]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="catalog_key" value="{{ $artisan['id'] }}">
                            <input
                                class="no-m-top large destroy"
                                type="submit"
                                value="Remove From Collection"
                                onclick="event.preventDefault();
                                            if(confirm('Are you sure you want to delete this from your artisans collection?'))
                                                this.closest('form').submit();"
                                value="&times;" />

                        </form>
                    @endif
                </div>

            </div>
            @error('empty_file')
                <div class="card-status-bar">{{ $message }}</div>
            @enderror
        </div>

        @empty

        <div class="card-wrap">
            <div class="card search-container">
                <div class="info">
                    <h2 style="text-align: center;">You don't have {{!empty($category) ? 'any '.$category : 'anything'}} in your collection yet.</h2>
                </div>
            </div>
        </div>

        @endforelse

    </div>
</x-layout>
