<?php


use App\Models\Listing;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $collection = 'users:'.Auth::user()->id.':collection:';
    $listings = Listing::all();

    //attach the details of the collectible for sale
    foreach ($listings as $listing) {
        // dd($collection.$listing->catalog_key);
        $current_listing = Redis::hGetAll('catalog:'.$listing->catalog_key);

        $listing_images_set = Redis::sMembers('users:'.$listing->user_id.':collection:'.$listing->catalog_key.':images');
        $current_listing['images'] = collect([]);

        foreach($listing_images_set as $image_set)
            $current_listing['images']->push(Redis::hGetAll($image_set));

        $listing['item'] = $current_listing;
        // dd($listing);
    }

    return view('home', compact('listings'));
});

Route::get('/all');
Route::get('/artisans');

require __DIR__.'/auth.php';
require __DIR__.'/users.php';
require __DIR__.'/listings.php';
require __DIR__.'/products.php';
require __DIR__.'/collection.php';
require __DIR__.'/cart.php';
require __DIR__.'/catalog.php';
