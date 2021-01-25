<div class="flex-form">
    <div class="card">
        <div class="info">
            <div class="title">Search artisan names, sculpt names, or colorway names...</div>
        </div>
    </div>
</div>
<div class="card-status-bar">
    <div class="search-bar">
        <form action="/search/artisans" method="GET">
            <input name="search" type="text" value="{{ old('search') }}" placeholder="search for artisans...">
            <button type="submit">Find</button>
        </form>
    </div>
</div>
