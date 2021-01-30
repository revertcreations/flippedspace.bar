<x-layout>
    <div class="flex-form">

        <x-images-edit-card :artisan="$artisan"/>

        @csrf

        <div class="card">

            <h2 class="title">{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})</h2>

            {{-- <div class="img-wrap">
                <img src="{{
                    !empty($artisan->user_colorway->images[0]) && !empty($artisan->user_colorway->images[0]->cloudinary_public_id)
                    ? 'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$artisan->user_colorway->images[0]->cloudinary_public_id
                    : $artisan->colorway->keycap_archivist_img
                }}"
                alt="{{ $artisan->colorway->artisan->name }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})">
                </img>
            </div> --}}


            <form action="{{ route('listings.artisans.update', $artisan->id) }}" method="POST">
                @csrf
                @method('PUT')
                {{-- <input type="hidden" name="users_artisan_colorway_id" value="{{ $artisan->id }}"> --}}
                {{-- <div class="form-group">
                    <label for="title">
                        Title
                    </label>
                    <input id="title" name="title" type="text"  value="{{ $artisan->listing->title?:'' }}" autofocus />
                    @error('title')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div> --}}

                <div class="form-group">
                    <label for="description">
                        Description
                    </label>
                    <textarea rows="10" style="width: 100%; max-width: 100%;" id="description" name="description" type="text">{{ $artisan->listing->description ?: '' }}</textarea>
                    @error('description')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="condition">
                        Condition
                    </label>
                    <select id="condition" name="condition" type="text"  value="{{ $artisan->listing->condition?:'' }}">
                        <option value="Brand New" {{ $artisan->listing->condition == 'Brand New' ? 'selected' : ''}}>Brand New</option>
                        <option value="Mint" {{ $artisan->listing->condition == 'Mint' ? 'selected' : ''}}>Mint</option>
                        <option value="Excellent {{ $artisan->listing->condition == 'Excellent' ? 'selected' : ''}}">Excellent</option>
                        <option value="Very Good" {{ $artisan->listing->condition == 'Very Good' ? 'selected' : ''}}>Very Good</option>
                        <option value="Good" {{ $artisan->listing->condition == 'Good' ? 'selected' : ''}}>Good</option>
                        <option value="Fair" {{ $artisan->listing->condition == 'Fair' ? 'selected' : ''}}>Fair</option>
                        <option value="Poor" {{ $artisan->listing->condition == 'Poor' ? 'selected' : ''}}>Poor</option>
                        <option value="For Parts/Repair Only" {{ $artisan->listing->condition == 'For Parts/Repair Only' ? 'selected' : ''}}>For Parts/Repair Only</option>
                    </select>
                    @error('condition')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        Price
                    </label>
                    $ <input id="price" name="price" type="number" min="1" step="any" value="{{ $artisan->listing->price?:'' }}" />
                    @error('price')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        Shipping Cost
                    </label>
                    $ <input id="price" name="shipping_cost" type="number" min="1" step="any" value="{{ $artisan->listing->shipping_cost?:'' }}" />
                    @error('shipping_cost')
                    <small class="error input-error">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="checkbox" name="allow_offers" id="allow_offers" {{ $artisan->listing->allow_offers ? 'checked' : ''}}>
                    <label for="allow_offers">Allow Offers?</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" name="publish" id="publish" {{ $artisan->listing->published ? 'checked' : ''}}>
                    <label for="publish">Publish</label>
                </div>

                <input type="submit" value="Save">
            </form>
        </div>
    </div>
</x-layout>
