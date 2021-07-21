@section('category_nav')
<x-category-nav route="collection" />
@endsection


{{-- <x-layout>

    <h1 class="title">Listings</h1>

    <div class="items-container">

    @forelse ($listings as $listing)
        <x-artisan-listing-card :artisan="$listing" type="users" />
    @empty
        <div class="card-wrap">

            <div class="card search-container">
                <h2 class="title"><pre>( ಠ益ಠ)</pre>You don't have any listings for sell right now.</h2>
            </div>

            <div class="card-status-bar search-container">
                <p>
                    Got something you want to sell? Listings are totally free. A 3.25% selling fee in addition to 2.9%+$0.25
                    payment processing fee will be deducted from final selling price.
                </p>

                <input type="button" value="Create Listing" onclick="window.location='{{ route('listings.create') }}'">

                <input type="button" value="Learn More" onclick="window.location='{{ route('listings.create') }}'">
            </div>
        </div>
    @endforelse
    </div>

</x-layout> --}}

<x-layout>

    <h1 class="title">Collection</h1>
    
    <div class="items-container">
      @if(count($collectibles) < 1)
      <div class="card search-container">
          <div class="info">
              <h2 class="title">Artisans</h2>
              <h2 style="text-align: center;">You don't have {{!empty($category) ? 'any '.$category : 'anything'}} in your collection yet.</h2>
              <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
              <input type="submit" onclick="window.location=('{{ route('catalog.index', ['filter' => 'artisans']) }}')" value="&#43; Add Artisans" />
          </div>
      </div>
      @elseif (!empty(request()->category) && request()->category == 'artisans')
      <div class="card search-container">
          <div class="info">
              <h2 class="title">Artisans</h2>
              <h3 class="title">Add artisans to your collection. Once added you are able to list for sale, and more...</h3>
              <input type="submit" onclick="window.location=('{{ route('catalog.index', ['filter' => 'artisans']) }}')" value="&#43; Add Artisans" />
          </div>
      </div>
      @endif

        {{-- {{ dd($collectibles) }} --}}
      @foreach ($collectibles as $item)
       @if(!empty($item) && isset($item["id"]))

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
        @endif
      @endforeach
    </div>
</x-layout>
