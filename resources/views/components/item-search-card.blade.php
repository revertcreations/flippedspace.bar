<form action="{{ route('products.artisans.index') }}" method="GET">
    <div class="card-wrap">
        <div class="card search-container">
            <div class="info max-width">
                <h2 class="title">Search</h2>
                <label for="search">artisan, sculpt, or colorway names... (i.e. "keypora")</label>
                <input name="search" type="text" value="{{ old('search') }}" placeholder="search for artisans...">
                <input type="submit" value="&#9906; Find"/>
            </div>
        </div>
    </div>
</form>
