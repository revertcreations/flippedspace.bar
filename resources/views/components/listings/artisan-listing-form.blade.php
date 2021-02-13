<div class="flex-form">
{{-- {{ dd($artisan->user_colorway->images )}} --}}
@if ($type == 'update')
    <x-images-edit-card :images="$artisan->user_colorway->images" :usersArtisanColorwayId="$artisan->colorway->id" :artisanColorwayId="$artisan->user_colorway->id" />
@else
    <x-images-edit-card :images="$artisan->images" :usersArtisanColorwayId="$artisan->colorway->id" :artisanColorwayId="$artisan->id" />
@endif

    <div class="card-wrap">

        <div class="card">

            <h2 class="title">{{ $artisan['artisan_name'] }} - {{ $artisan->colorway->sculpt->name }} ({{ $artisan->colorway->name }})</h2>

        @if ($type == 'update')
            <form action="{{ route('listings.artisans.update', ['artisan_colorway_listing' => $artisan->id]) }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('listings.artisans.store') }}" method="POST">
                <input type="hidden" name="users_artisan_colorway_id" value="{{ $artisan->id }}">
        @endif

                @csrf

                <div class="form-group">
                    <input type="checkbox"
                        name="allow_offers"
                        id="allow_offers"
                        {{ $type == 'update' && $artisan->listing->allow_offers ? 'checked' : (old('allow_offers') ? 'checked' : '') }} />
                    <label for="allow_offers">Allow Offers?</label>
                </div>

                <div class="form-group">
                    <input type="checkbox"
                        name="published"
                        id="published"
                        {{ $type == 'update' && $artisan->listing->published ? 'checked' : (old('published') ? 'checked' : '') }} />
                    <label for="published">Publish?</label>
                </div>

                <div class="form-group">
                    <label for="description">
                        Description
                    </label>
                    <textarea rows="10"
                        style="width: 100%; max-width: 100%;"
                        id="description"
                        name="description"
                        type="text">{{ $type == 'update' ? $artisan->listing->description : old('description') }}</textarea>
                @error('description')
                    <small class="error input-error">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    <label for="condition">
                        Condition
                    </label>
                    <select id="condition" name="condition" type="text"  value="{{ $type == 'update' && $artisan->listing->condition?:'' }}">
                        <option value="Brand New" {{ $type == 'update' && $artisan->listing->condition == 'Brand New' ? 'selected' : ''}}>Brand New</option>
                        <option value="Mint" {{ $type == 'update' && $artisan->listing->condition == 'Mint' ? 'selected' : ''}}>Mint</option>
                        <option value="Excellent {{ $type == 'update' && $artisan->listing->condition == 'Excellent' ? 'selected' : ''}}">Excellent</option>
                        <option value="Very Good" {{ $type == 'update' && $artisan->listing->condition == 'Very Good' ? 'selected' : 'selected'}}>Very Good</option>
                        <option value="Good" {{ $type == 'update' && $artisan->listing->condition == 'Good' ? 'selected' : ''}}>Good</option>
                        <option value="Fair" {{ $type == 'update' && $artisan->listing->condition == 'Fair' ? 'selected' : ''}}>Fair</option>
                        <option value="Poor" {{ $type == 'update' && $artisan->listing->condition == 'Poor' ? 'selected' : ''}}>Poor</option>
                        <option value="For Parts/Repair Only" {{ $type == 'update' && $artisan->listing->condition == 'For Parts/Repair Only' ? 'selected' : ''}}>For Parts/Repair Only</option>
                    </select>
                @error('condition')
                    <small class="error input-error">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    <label for="price">
                        Price
                    </label>
                    $ <input id="price"
                        name="price"
                        type="number"
                        min="1"
                        step="any"
                        value="{{ $type == 'update' ? $artisan->listing->price : old('price') }}" />
                @error('price')
                    <small class="error input-error">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    <label for="shipping_cost">
                        Shipping Cost
                    </label>
                    $ <input id="shipping_cost"
                        name="shipping_cost"
                        type="number"
                        min="1"
                        step="any"
                        value="{{ ($type == 'update' ? $artisan->listing->shipping_cost : old('shipping_cost')) }}" />
                @error('shipping_cost')
                    <small class="error input-error">{{ $message }}</small>
                @enderror
                </div>
                <input type="submit" value="Save">
            </form>

        </div>

    {{-- @foreach($errors->all() as $key => $message)
        @if($key != 'images_required')
        <div class="card-status-bar error">
            <div class="message">{{ dd($errors->all()) }}</div>
        </div>
        @endif
    @endforeach --}}

    @if (session('status'))
    <div class="card-status-bar success">
        <div class="message">{{ session('status') }}</div>
    </div>
    @endif

    </div>

</div>
