@section('category_nav')
<x-category-nav route="listings.create" />
@endsection

<x-layout>

    <h1 class="title">Create Listing</h1>

    <form action="{{ route('listings.create') }}" method="GET">
        <div class="card-wrap">

            <div class="card search-container">
                <h2 class="title">Search Catalog</h2>
                <div class="info max-width">
                    <label for="search">
                        Search catalog to find the item you are listing for sale...
                    </label>
                    <input name="search" type="text" value="{{ old('search') }}" placeholder="search for your keyboard item...">
                    <input type="submit" value="&#9906; Find"/>
                </div>
            </div>

            <div class="card-status-bar search-container">
                <p>
                    Our database has a lot of items, but it isn't complete by any means. If you are unable to find the keyboard related item you wish to sell, create
                    a catalog update request below. We'll verify the product, and add it to our database if verified. Once added, the item will be automatically added
                    to your collection, and you'll be able to continue your listing process.
                </p>
                <input type="button" value="Add Item" onclick="window.location='{{ route('catalog.user.submission') }}'">
            </div>

        </div>
    </form>

</x-layout>
