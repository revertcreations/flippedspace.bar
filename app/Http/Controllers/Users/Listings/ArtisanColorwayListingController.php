<?php

namespace App\Http\Controllers\Users\Listings;

use App\Http\Controllers\Controller;

use App\Models\ArtisanColorwayListing;
use App\Models\Listing;
use App\Models\UserArtisanColorway;
use App\Models\UserArtisanColorwayImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisanColorwayListingController extends Controller
{
    public function index()
    {
        $artisan_listings = ArtisanColorwayListing::query()
            ->join('users_artisan_colorways', 'users_artisan_colorways.id', '=', 'artisan_colorway_listings.users_artisan_colorway_id')
            ->where('users_artisan_colorways.user_id', Auth::user()->id)
            ->select('artisan_colorway_listings.*')
            ->get();

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

    public function store()
    {

        // if(request('published') && empty(UserArtisanColorwayImage::where('users_artisan_colorway_id', $artisan_colorway_listing->users_artisan_colorway_id)->first()))
        //     return back()->withErrors(['images_required', 'Before publishing your listing live, it must have images attached.']);

        $validated_attributes = request()->validate([
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required|string',
            'shipping_cost' => 'numeric',
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on";
        $validated_attributes['published'] = request('published') == "on";

        $listing = Listing::create($validated_attributes);

        ArtisanColorwayListing::create([
            'users_artisan_colorway_id' => request('users_artisan_colorway_id'),
            'listing_id' => $listing->id,
        ]);

        return redirect()->route('listings.artisans');

    }

    public function show(ArtisanColorwayListing $artisan_colorway_listing)
    {
        return view('users.listings.artisans.index', ['artisan', $artisan_colorway_listing]);
    }

    public function update(ArtisanColorwayListing $artisan_colorway_listing)
    {

        if(request('published') && empty(UserArtisanColorwayImage::where('users_artisan_colorway_id', $artisan_colorway_listing->users_artisan_colorway_id)->first()))
            return back()->withErrors(['images_required' => 'Before publishing your listing live, it must have images attached.']);


        $validated_attributes = request()->validate([
            'condition' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'shipping_cost' => 'numeric'
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on" ? 1 : 0;
        $validated_attributes['published'] = request('published') == "on" ? 1 : 0;

        $artisan_colorway_listing->listing->update($validated_attributes);

        // dd($artisan_colorway_listing->listing->wasChanged());
        if($artisan_colorway_listing->listing->wasChanged())
            return back()->with('status', 'Saved!');

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
