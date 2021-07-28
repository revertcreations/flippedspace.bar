<div class="w-full md:w-4/6 lg:w-2/6 h-12 mx-5">
    <form class="flex flex-row self-center" action="{{ route('search') }}" method="POST">
        @csrf
        
        <input
            class="px-4 border border-b-2 border-gray-700 place text-xs"
            name="search"
            type="text"
            value="{{request('search')?:''}}"
            placeholder="search &amp; watch the wallet burn..."
        />

        <button
          class="bg-black px-4 text-4xl hover:border-b-2 hover:border-black hover:bg-gray-200" 
          type="submit"
        >
            
        <div class="transform rotate-45">&#9906;</div>
        
        </button>
    </form>
</div>

