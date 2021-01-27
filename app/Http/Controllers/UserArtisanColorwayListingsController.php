<?php

namespace App\Http\Controllers;

use App\Models\ArtisanColorwayListing;
use App\Models\Listing;
use App\Models\UserArtisanColorwayImage;
use App\Models\UsersArtisanColorway;
use Illuminate\Http\Request;

class UserArtisanColorwayListingsController extends Controller
{
    public function index()
    {
        $all_artisan_listings =ArtisanColorwayListing::all();

        return view('my.listings.artisans.index', ['artisan_listings' => $all_artisan_listings]);
    }

    public function show($user_artisan_colorway_id)
    {
        $user_artisan_colorway = UsersArtisanColorway::where('id', $user_artisan_colorway_id)->first();

        // dd($user_artisan_colorway->listing());
        return view('my/listings/artisans/show', ['artisan' => $user_artisan_colorway]);
    }

    public function store(Request $request)
    {
        $listing = Listing::create([
            'price' => $request->price,
            'condition' => $request->condition,
            'description' => $request->description,
            'shipping_amount' => $request->shipping_amount,
            'allows_offers' => $request->allows_offers

        ]);

        $user_artisan_listing = ArtisanColorwayListing::create([
            'users_artisan_colorway_id' => $request->my_colorway_id,
            'listing_id' => $listing->id,
        ]);

        return view('my.listings.artisans.index');
    }
}
