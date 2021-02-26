<div class="flex-form">

    <div class="card-wrap">

        <div class="card">
            {{-- {{dd($artisan)}} --}}
            <h2 class="title">{{ $artisan->item['artisan_name'] }} - {{ $artisan->item['sculpt_name'] }} ({{ $artisan->item['colorway_name'] }})</h2>

        @if ($type == 'update')
            <form action="{{ route('listings.update', [ 'listing' => $artisan['id'] ]) }}" method="POST">
                @method('PUT')
        @else
            <form action="{{ route('listings.store') }}" method="POST">
                <input type="hidden" name="category" value="{{ $type == 'update' ? $artisan['category'] : $artisan->item['category'] }}">
                <input type="hidden" name="catalog_key" value="{{ $type == 'update' ? $artisan['catalog_key'] : $artisan->catalog_key }}">
        @endif

                @csrf
                <div class="form-group">
                    <input type="checkbox"
                        name="allow_offers"
                        id="allow_offers"
                        {{ $type == 'update' && $artisan->allow_offers ? 'checked' : (old('allow_offers') ? 'checked' : '') }} />
                    <label for="allow_offers">Allow Offers?</label>
                </div>

                <div class="form-group">
                    <input type="checkbox"
                        name="published"
                        id="published"
                        {{ $type == 'update' && $artisan->published ? 'checked' : (old('published') ? 'checked' : '') }} />
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
                        type="text">{{ $type == 'update' ? $artisan->description : old('description') }}</textarea>
                @error('description')
                    <small class="error input-error">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    <label for="condition">
                        Condition
                    </label>

                    <select id="condition" name="condition_id" type="text"  value="{{ $type == 'update' && $artisan->condition ?: '' }}">
                        @foreach($artisan->item['conditions'] as $condition)
                        <option value="{{ $condition->id }}" {{ $type == 'update' && $artisan->condition == $condition->name ? 'selected' : ''}}>{{ $condition->name }}</option>
                        @endforeach
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
                        value="{{ $type == 'update' ? $artisan->price : old('price') }}" />
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
                        value="{{ ($type == 'update' ? $artisan->shipping_cost : old('shipping_cost')) }}" />
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
    {{-- {{dd($artisan)}} --}}
    <x-images-edit-card :images="$artisan->item['images']" :catalogKey="$artisan->catalog_key" />

</div>
