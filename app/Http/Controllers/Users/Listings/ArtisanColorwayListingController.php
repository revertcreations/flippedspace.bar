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

            // dd($artisan_listings);

        return view('users.listings.artisans.index', ['listings' => $artisan_listings]);
    }

    public function create(UserArtisanColorway $users_artisan_colorway)
    {
        return view('users.listings.artisans.create', ['artisan' => $users_artisan_colorway]);
    }

    public function edit(ArtisanColorwayListing $artisan_colorway_listing)
    {
        return view('users.listings.artisans.edit', ['artisan' => $artisan_colorway_listing]);
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

        return redirect()->route('listings.artisans');

    }

    public function show(ArtisanColorwayListing $artisan_colorway_listing)
    {
        return view('users.listings.artisans.index');
    }

    public function update(ArtisanColorwayListing $artisan_colorway_listing, Request $request)
    {
        // dd($artisan_colorway_listing);
        // dd($request->all());
        $artisan_colorway_listing->listing->title = $request->title;
        $artisan_colorway_listing->listing->price = $request->price;
        $artisan_colorway_listing->listing->condition = $request->condition;
        $artisan_colorway_listing->listing->description = $request->description;
        $artisan_colorway_listing->listing->shipping_cost = $request->shipping_cost;
        $artisan_colorway_listing->listing->allow_offers = ($request->allow_offers == 'on');
        $artisan_colorway_listing->listing->published = ($request->published == 'on' ? true : false);

        $artisan_colorway_listing->listing->save();

        return back();
    }

    public function destroy()
    {
        # code...
    }

    public function publish(ArtisanColorwayListing $artisan_colorway_listing)
    {

        $artisan_colorway_listing->listing->published = true;

        $artisan_colorway_listing->listing->save();

        return back();
    }

    public function unpublish(ArtisanColorwayListing $artisan_colorway_listing)
    {
        $artisan_colorway_listing->listing->published = false;

        $artisan_colorway_listing->listing->save();

        return back();
    }

}
