<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ListingController extends Controller
{
    public function index()
    {

        $redis_base_key = 'users:'.Auth::user()->id.':listings';
        $listings = collect([]);
        $listing_set = Redis::sMembers($redis_base_key);

        foreach ($listing_set as $index => $listing) {
            $current_listing = Redis::hGetAll($listing->redis_key);

            $listing_images_set = Redis::sMembers('users:'.Auth::user()->id.':collection:artisans:'.$matches[1].':images');
            $current_listing['images'] = array();

            foreach($listing_images_set as $image_set)
                array_push($current_listing['images'], Redis::hGetAll($image_set));

            $listings->push($current_listing);
        }

        return view('users.listings.index', ['listings' => $listings]);
    }

    public function create($category = '', $catalog_key = '')
    {
        // NEED TO VALIDE THIS YO!!!
        $lower_search = strtolower(request('search'));
        $search_terms = preg_split('/\s+/', $lower_search, -1, PREG_SPLIT_NO_EMPTY);

        $match_results = [];
        $combined_results = [];
        $search_results = collect([]);

        if(!empty($search_terms)) {
            foreach($search_terms as $term)
                array_push($match_results, Redis::command('hscan', ['catalog:search', "0", '*'.$term.'*', "1000000"]));

            for($i=0; $i <= (count($search_terms)-2);$i++)
                $combined_results = array_intersect($match_results[$i], $match_results[$i+1]);
        }

        if(!empty($match_results) && empty($combined_results))
            $combined_results = $match_results[0];

        foreach($combined_results as $index){
            $search_results->push(Redis::hGetAll('catalog:'.$category.':'.$index));
        }

        $item = null;
        $search_results = $search_results->take(100);
        // is there a product being passed through?
        if(!empty($catalog_key))
            // check to see if they have it in their collection
            if(Redis::sIsMember('users:'.Auth::user()->id.':collection', 'catalog:'.$category.':'.$catalog_key)) {
                // grab data from product catalog and push to item collection
                $item = Redis::hGetAll('catalog:'.$category.':'.$catalog_key);

                //get all images... TODO
                $item['images'] = [];
            }

        if(empty($item))
            return view('users.listings.create');

        return view('users.listings.'.$category.'.create', [substr($category, 0, -1) => $item ]);

    }

    public function edit(Listing $listing)
    {
        return view('users.listings.edit', ['artisan' => $listing]);
    }

    public function store(Request $request)
    {

        if(request('published') && Redis::sMembers($request->redis_key.':images'))
            return back()->withErrors(['images_required', 'Before publishing your listing live, it must have images attached.']);

        $validated_attributes = request()->validate([
            'catalog_key' => $request->redis_key,
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required|string',
            'shipping_cost' => 'numeric',
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on";
        $validated_attributes['published'] = request('published') == "on";

        $listing = Listing::create($validated_attributes);

        Listing::create([
            'users_artisan_colorway_id' => request('users_artisan_colorway_id'),
            'listing_id' => $listing->id,
        ]);

        return redirect()->route('listings.artisans');

    }

    public function show(Listing $listing)
    {
        return view('users.listings.index', ['artisan', $listing]);
    }

    public function update(Listing $listing)
    {

        if(request('published') && Redis::sMembers($listing->redis_key.':images'))
            return back()->withErrors(['images_required' => 'Before publishing your listing live, it must have images attached.']);


        $validated_attributes = request()->validate([
            'condition' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'shipping_cost' => 'numeric'
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on" ? 1 : 0;
        $validated_attributes['published'] = request('published') == "on" ? 1 : 0;

        $listing->listing->update($validated_attributes);

        // dd($listing->listing->wasChanged());
        if($listing->listing->wasChanged())
            return back()->with('status', 'Saved!');

        return back();

    }

    public function destroy()
    {
        # code...
    }

    public function publish(Listing $listing)
    {

        $listing->listing->published = true;

        $listing->listing->save();

        return back();
    }

    public function unpublish(Listing $listing)
    {
        $listing->listing->published = false;

        $listing->listing->save();

        return back();
    }

}
