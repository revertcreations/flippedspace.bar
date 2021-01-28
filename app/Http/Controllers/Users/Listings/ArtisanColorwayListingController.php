<?php

namespace App\Http\Controllers\Users\Listings;

use App\Http\Controllers\Controller;

use App\Models\ArtisanColorwayListing;
use App\Models\Listing;
use App\Models\UserArtisanColorway;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisanColorwayListingController extends Controller
{
    public function index()
    {
        $artisan_listings = ArtisanColorwayListing::query()
            ->join('users_artisan_colorways', 'users_artisan_colorways.id', '=', 'artisan_colorway_listings.users_artisan_colorway_id')
            ->where('users_artisan_colorways.user_id', Auth::user()->id)->get();

        return view('users.listings.artisans.index', ['listings' => $artisan_listings]);
    }

    public function create(UserArtisanColorway $artisan)
    {
        return view('users.listings.artisans.create', ['artisan' => $artisan]);
    }

    public function edit(ArtisanColorwayListing $artisan_listing_id)
    {
        return view('users.listings.artisans.edit', ['artisan' => $artisan_listing_id]);
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

        return view('users.listings.artisans.index');

    }

    public function update()
    {
        # code...
    }

    public function destroy()
    {
        # code...
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
