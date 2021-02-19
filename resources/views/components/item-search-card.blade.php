<form action="{{ route('catalog.search', ['category' => $category]) }}" method="POST">
    @csrf
    <div class="card search-container">
        <div class="info max-width">
            <h2 class="title">Search {{ $category != 'all' ? ucfirst($category)." " : "" }}</h2>
            <label for="search">all kinds of {{ $category }} stuff...</label>
            <input name="search" type="text" value="{{ old('search') }}" placeholder="search for artisans...">
            <input type="submit" value="&#9906; Find"/>
        </div>
    </div>
</form>
