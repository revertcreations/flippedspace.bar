<div class="inline-flex justify-between w-full">

    <div class="">
        <img width="150px" src="{{ $listing->image }}" alt="{{ $listing->item['search_string'] }}">
    </div>

    <div class="">
        <h3 class="">{{ $listing->item['search_string'] }}</h3>

        <div class="">sold by <a href="">{{ $listing->user->username }}</a></div>

        <div class="">
            <div class="">+ ${{ $listing->shipping_cost }} <span>shipping</span></div>
        </div>
    </div>

    
    <div class="">${{ $listing->price }}</div>

</div>

