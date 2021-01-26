<form action="/search/artisans" method="GET">
    <div class="card-wrap">
        <div class="card search-container">
            <div class="info max-width">
                <h2 class="title">Search</h2>
                <label for="search">artisan, sculpt, or colorway names... (i.e. "keypora")</label>
                <input name="search" type="text" value="{{ old('search') }}" placeholder="search for artisans...">
                <input type="submit" value="Find"/>
            </div>
        </div>
    </div>
</form>
