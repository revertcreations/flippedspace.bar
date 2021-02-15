<x-layout>

    @forelse ($listings as $listing)
    @if($listing->item['category'] == 'artisans')
    <x-artisan-listing-card :artisan="$listing" type="public" />
    @endif
    @empty
    @endforelse

</x-layout>
