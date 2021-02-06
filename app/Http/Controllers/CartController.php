<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = json_decode(session('cart'));
        dd($cart_items);
        return view('cart.index', ['cart_items' => $cart_items]);
    }

    public function store(Listing $listing)
    {


        dd($listing);
        // $listings = DB::table('listings')
        //     ->leftJoin('users_artisan_colorways', 'artisan_colorways_listings.category_id', 'listings.category_id')
        //     ->get();


        return back()->with(['status' => 'Added to Cart']);
    }
}
