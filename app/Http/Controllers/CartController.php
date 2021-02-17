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
        // dd($request->session()->get('cart'));
        if($request->session()->exists('cart.'.$listing->id))
            $in_cart = true;

            // foreach ($request->session()->get('cart.'.$listing->id) as $cart_item) {
            //     // dd($cart_item);
            //     if($cart_item['listing_id'] == $listing->id)
            // }
        // if no, add.
        if (!$in_cart) {
            $item = Redis::hGetAll('catalog:'.$listing->catalog_key);
            $item['price'] = $listing->price;
            $request->session()->put('cart.'.$listing->id, $item);
            // $request->session()->push('cart.'.$listing->id, $item);

            foreach (session('cart') as $cart_item)
                    $cart_total += $cart_item['price'];

            $request->session()->put('cart_total', $cart_total);
        }

        return back()->with(['status' => 'Added to Cart']);

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

    public function checkout()
    {
        return view('cart.index');
    }
}
