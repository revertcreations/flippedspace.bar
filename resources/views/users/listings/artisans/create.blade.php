<x-layout>
    {{-- <div class="flex-form">
        @csrf
        <div class="card">

            <x-listing-img-wrap
                :images="$artisan->images"
                :alt="$artisan->colorway->artisan->name.' - '.$artisan->colorway->sculpt->name.' ('.$artisan->colorway->name.')'"
            />

            <form action="{{ route('collections.artisans.images.store', ['users_artisan_colorway_id' => $artisan->id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                <input type="hidden" name="artisan_colorway_id" value="{{ $artisan->id }}">
                <input type="hidden" name="my_artisan_id" value="{{ $artisan->id }}">
                <input class="no-m-top" name="artisan_images[]" type="file" multiple accept="image/*">

                <input class="no-m-top" value="Add Photos" type="submit" />

            </form>

            <h2 class="title">{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})</h2>

            <form action="{{ route('listings.artisans.store', ['users_artisan_colorway_id', $artisan->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="users_artisan_colorway_id" value="{{ $artisan->id }}">

                <div class="form-group">
                    <label for="description">
                        Description
                    </label>
                    <textarea rows="10" style="width: 100%; max-width: 100%;" id="description" name="description" type="text"></textarea>
                    @error('description')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="condition">
                        Condition
                    </label>
                    <select id="condition" name="condition" type="text">
                        <option value="Brand New">Brand New</option>
                        <option value="Mint">Mint</option>
                        <option value="Excellent">Excellent</option>
                        <option value="Very Good" selected>Very Good</option>
                        <option value="Good">Good</option>
                        <option value="Fair">Fair</option>
                        <option value="Poor">Poor</option>
                        <option value="For Parts/Repair Only">For Parts/Repair Only</option>
                    </select>
                    @error('condition')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        Price
                    </label>
                    $ <input id="price" name="price" type="number" min="1" step="any" />
                    @error('price')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        Shipping Cost
                    </label>
                    $ <input id="price" name="shipping_cost" type="number" min="1" step="any" />
                    @error('shipping_cost')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" name="allow_offers" id="allow_offers">
                    <label for="allow_offers">Allow Offers?</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="publish" id="publish">
                    <label for="publish">Publish</label>
                </div>

                <input type="submit" value="Save">
            </form>
        </div>
    </div> --}}

    <x-artisan-listing-form :artisan="$artisan" type="create" />
</x-layout>
