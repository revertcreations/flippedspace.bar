<?php

namespace App\Http\Controllers;

use App\Models\ArtisanColorwayListing;
use App\Models\Listing;
use App\Models\UserArtisanColorwayImage;
use App\Models\UserArtisanColorway;
use Illuminate\Http\Request;

class UsersArtisanColorwayListingController extends Controller
{
    public function index()
    {
        $all_artisan_listings = ArtisanColorwayListing::all();

        // dd($all_artisan_listings[0]->listing);

        return view('my.listings.artisans.index', ['listings' => $all_artisan_listings]);
    }

    public function show($user_artisan_colorway_id)
    {
        $user_artisan_colorway = UserArtisanColorway::where('id', $user_artisan_colorway_id)->first();

        // dd($user_artisan_colorway->listing());
        return view('my/listings/artisans/show', ['artisan' => $user_artisan_colorway]);
    }

    public function store(Request $request)
    {

        $listing = Listing::create([
            'title' => $request->title,
            'price' => $request->price,
            'condition' => $request->condition,
            'description' => $request->description,
            'shipping_cost' => $request->shipping_cost,
            'allow_offers' => ($request->allow_offers == 'on'),
            'published' => ($request->published == 'on')
        ]);

        $user_artisan_listing = ArtisanColorwayListing::create([
            'users_artisan_colorway_id' => $request->users_artisan_colorway_id,
            'listing_id' => $listing->id,
        ]);

        return view('my.listings.artisans.index');
    }

    public function publish(ArtisanColorwayListing $listing)
    {
        dd($listing);
        return back();
    }

    public function unpublish(ArtisanColorwayListing $listing)
    {
        dd($listing);
        return back();
    }

}
