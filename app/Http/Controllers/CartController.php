<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
        // return $listing;
        if(!empty(session('cart')->get('cart'))
            session('cart')->push($listing);


        session(['cart' => $listing]);

        return back()->with(['status' => 'Added to Cart']);
    }
}
