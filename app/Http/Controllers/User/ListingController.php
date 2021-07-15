<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ListingController extends Controller
{

    private $allowed_categories;

    public function __construct()
    {

        $this->allowed_categories = array('', 'keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');

    }

    public function index()
    {
        $collection = 'users:'.Auth::user()->id.':collection:';
        $listings = Listing::where('user_id', Auth::user()->id)->get();

        //attach the details of the collectible for sale
        foreach ($listings as $listing) {
            // dd($listing->category);
            $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

            $listing_images_set = Redis::sMembers($collection.$listing->catalog_key.':images');
            // dd($listing->catalog_key);
            $current_listing['images'] = collect([]);

            foreach($listing_images_set as $image_set)
                $current_listing['images']->push(Redis::hGetAll($image_set));

            $current_listing['images'] = $current_listing['images']->sortByDesc('is_cover')->values();
            $current_listing['catalog'] = $listing->category->name;

            $listing->setItem($current_listing);

        }

        return view('users.listings.index', ['listings' => $listings]);
    }

    public function create($category = '', $catalog_key = '')
    {

        // NEED TO VALIDE THIS YO!!!
        $collection = 'users:'.Auth::user()->id.':collection';
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
            if(Redis::sIsMember($collection, 'catalog:'.$category.':'.$catalog_key)) {
                // grab data from product catalog and push to item collection
                $item = Redis::hGetAll('catalog:'.$category.':'.$catalog_key);

                $item['images'] = collect([]);
                $collectible_image_set = Redis::sMembers($collection.':'.$category.':'.$catalog_key.':images');

                foreach($collectible_image_set as $image_key)
                    $item['images']->push(Redis::hGetAll($image_key));

                $item['conditions'] = Condition::all();
            }

        if(empty($item))
            return view('users.listings.create');

        $listing = (object) array('item' => $item);
        $listing->catalog_key = $item['category'].':'.$item['id'];

        return view('users.listings.'.$category.'.create', [substr($category, 0, -1) => $listing ]);

    }

    public function edit(Listing $listing)
    {

        $collection = 'users:'.Auth::user()->id.':collection';

        $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

        $listing_images_set = Redis::sMembers($collection.':'.$listing->catalog_key.':images');
        $current_listing['images'] = collect([]);

        foreach($listing_images_set as $image_set)
            $current_listing['images']->push(Redis::hGetAll($image_set));

        $current_listing['conditions'] = Condition::all();

        $listing['catalog_key'] = $current_listing['category'].':'.$current_listing['id'];
        $listing['item'] = $current_listing;

        // dd($listing);
        return view('users.listings.artisans.edit', [substr($listing->category->name, 0, -1) => $listing]);

    }

    public function store(Request $request)

    {
        // dd($request->all());
        $collection_key = 'users:'.Auth::user()->id.':collection';
        $listing_key = 'users:'.Auth::user()->id.':listings';

        if($request->published == 'on' && empty(Redis::sMembers($collection_key.':'.$request->catalog_key.':images')))
            return back()->withErrors(['images_required', 'Before publishing your listing live, it must have images attached.']);

        $validated_attributes = request()->validate([
            'price' => 'required|numeric',
            'condition_id' => 'required',
            'description' => 'required|string',
            'shipping_cost' => 'numeric'
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on";
        $validated_attributes['published'] = request('published') == "on";
        $validated_attributes['catalog_key'] = $request->catalog_key;
        $validated_attributes['user_id'] = Auth::user()->id;
        $validated_attributes['category_id'] = Category::where('name', $request->category)->first()->id;

        $listing = Listing::create($validated_attributes);

        // once listing is created lets remove the collection reference.
        if($listing->id) {
            $item_key = 'catalog:'.$request->catalog_key;
            $item = Redis::hGetAll($item_key);

            Redis::sRem($collection_key, $item_key);
            Redis::sRem($collection_key.':'.$request->category,  $item_key);

            // Do we really need this? probably for ease of search?
            Redis::sAdd($listing_key, $listing->id);
            Redis::sAdd($listing_key.$request->category, $listing->id);

            Redis::hSet('listings:'.$request->category.':search', $item['search_string'], $listing->id);
            Redis::hSet('listings:search', $item['search_string'], $listing->id);
        }

        return redirect()->route('listings', ['category', $request->category]);

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

    public function destroy(Listing $listing)
    {
        $listing->delete();

        return back();
    }

    public function search($category = '')
    {
        if(!empty($category) && !in_array($category, $this->allowed_categories))
            return redirect()->route('home');

        $search_results = collect([]);
        $match_results = [];
        $combined_results = [];
        $where_in = [];

        $search = request('search');
        $lower_search = strtolower(request('search'));
        $search_terms = preg_split('/\s+/', $lower_search, -1, PREG_SPLIT_NO_EMPTY);

        $category_key = !empty($category) ? $category.':' : '';

        if(!empty($search_terms)) {
            foreach($search_terms as $term)
                array_push($match_results, Redis::command('hscan', ['listings:'.$category_key.'search', "0", '*'.$term.'*', "1000000"]));

            for($i=0; $i <= (count($search_terms)-2);$i++)
                $combined_results = array_intersect($match_results[$i], $match_results[$i+1]);
        }

        if(!empty($match_results) && empty($combined_results))
            $combined_results = $match_results[0];

        foreach($combined_results as $id)
            array_push($where_in, $id);

        $listings = Listing::whereIn('id', $where_in)->get();

        foreach ($listings as $listing) {

            $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

            $listing_images_set = Redis::sMembers('users:'.$listing->user_id.':collection:'.$listing->catalog_key.':images');
            $current_listing['images'] = collect([]);

            foreach($listing_images_set as $image_set)
                $current_listing['images']->push(Redis::hGetAll($image_set));

            $listing['item'] = $current_listing;

        }

        session()->flashInput(request()->all());

        return view('home', ['category', $category])->with(compact('listings'));
    }

    public function publish(Listing $listing)
    {

        $listing->published = true;

        $listing->save();

        return back();
    }

    public function unpublish(Listing $listing)
    {
        $listing->published = false;

        $listing->save();

        return back();
    }

}
