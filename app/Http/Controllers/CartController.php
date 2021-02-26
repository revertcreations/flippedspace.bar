<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = session('cart');
        dd($cart_items);
        return view('cart.index', ['cart_items' => $cart_items]);
    }

    public function store(Request $request, Listing $listing)
    {
        $in_cart = false;
        $cart_total = 0;

        // $request->session()->forget('cart');
        // return back();

        // check to see if cart already contains listing->id
        if(!$request->session()->exists('cart.'.$listing->id)) {

            $item = Redis::hGetAll('catalog:'.$listing->catalog_key);
            $item['price'] = $listing->price;

            $request->session()->put('cart.'.$listing->id, $item);

            foreach (session('cart') as $cart_item)
                    $cart_total += $cart_item['price'];

            $request->session()->put('cart_total', $cart_total);

        }

        if($in_cart)
            session()->flash('status', 'Already in Your Cart.');
        else
            session()->flash('status', 'Added to Cart!');

        session()->flash('listing_id', $listing->id);

        return back();

    }

    public function destroy(Request $request, Listing $listing)
    {

        $request->session()->pull('cart.'.$listing->id);

        $cart_total = 0;
        foreach (session('cart') as $cart_item)
            $cart_total += $cart_item['price'];

        $request->session()->put('cart_total', $cart_total);

        return back();

    }

    public function checkout(Request $request)
    {

        $cart_listing_ids = collect($request->session()->get('cart'))->keys();
        $listings = Listing::whereIn('id', $cart_listing_ids)->get();

        foreach ($listings as $listing) {
            $listing->item = Redis::hGetAll('catalog:'.$listing->catalog_key);

            $listing_images_set = Redis::sMembers('users:'.$listing->user_id.':collection:'.$listing->catalog_key.':images');
            $current_listing_images = collect([]);

            foreach($listing_images_set as $image_set)
                $current_listing_images->push(Redis::hGetAll($image_set));

            $listing->image = 'https://res.cloudinary.com/flippedspace-bar/image/upload/t_thumbnail/v1611702681/'.$current_listing_images->where('is_cover', true)->pluck('cloudinary_public_id')->first();

        }

        return view('cart.index', ['cart_items' => $listings]);
    }
}
