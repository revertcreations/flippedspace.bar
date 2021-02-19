<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class ListingController extends Controller
{

    private $allowed_categories;

    public function __construct()
    {

        $this->allowed_categories = array('', 'keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');

    }

    public function index(Request $request)
    {

        $listings = collect([]);
        // dd($request->path());
        if($request->path() !== 'all' && $request->path() !== '/') {
            $category = Category::where('name', $request->path())->first();
            if($category && $category->id)
                $listings = Listing::where('category_id', $category->id)
                ->where('published', 'y')
                ->get();
        } else {
            $listings = Listing::where('published', true)->get();
        }

        //attach the details of the collectible for sale
        foreach ($listings as $listing) {
            // dd($collection.$listing->catalog_key);
            $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

            $listing_images_set = Redis::sMembers('users:'.$listing->user_id.':collection:'.$listing->catalog_key.':images');
            $current_listing['images'] = collect([]);

            foreach($listing_images_set as $image_set)
                $current_listing['images']->push(Redis::hGetAll($image_set));

            $current_listing['images'] = $current_listing['images']->sortByDesc('is_cover')->values();

            $listing['item'] = $current_listing;
        }

        return view('listings.index', ['listings' => $listings]);

    }

    public function show(Listing $listing)
    {

        $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

        $listing_images_set = Redis::sMembers('users:'.$listing->user_id.':collection:'.$listing->catalog_key.':images');
        $current_listing['images'] = collect([]);

        foreach($listing_images_set as $image_set)
            $current_listing['images']->push(Redis::hGetAll($image_set));

        $listing['item'] = $current_listing;

        return view('listings.show',  compact('listing'));

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

}
