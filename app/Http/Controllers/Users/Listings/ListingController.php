<?php

namespace App\Http\Controllers\Users\Listings;

use App\Http\Controllers\Controller;

use App\Models\Listing;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ListingController extends Controller
{
    public function index()
    {

        $listings = Listing::where('user_id', Auth::user()->id)->get();

        foreach ($listings as $index => $listing) {
            $listings[$index] = Redis::hGetAll($listing->redis_key);
        }

        return view('users.listings.index', ['listings' => $listings]);
    }

    public function create(Request $request)
    {
        // check to see if they have it in their collection
        // grab data from product catalog

        return view('users.listings.create');
    }

    public function edit(Listing $listing)
    {
        return view('users.listings.edit', ['artisan' => $listing]);
    }

    public function store(Request $request)
    {

        if(request('published') && Redis::sMembers($request->redis_key.':images'))
            return back()->withErrors(['images_required', 'Before publishing your listing live, it must have images attached.']);

        $validated_attributes = request()->validate([
            'catalog_key' => $request->redis_key,
            'price' => 'required|numeric',
            'condition' => 'required',
            'description' => 'required|string',
            'shipping_cost' => 'numeric',
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on";
        $validated_attributes['published'] = request('published') == "on";

        $listing = Listing::create($validated_attributes);

        Listing::create([
            'users_artisan_colorway_id' => request('users_artisan_colorway_id'),
            'listing_id' => $listing->id,
        ]);

        return redirect()->route('listings.artisans');

    }

    public function show(Listing $listing)
    {
        return view('users.listings.index', ['artisan', $listing]);
    }

    public function update(Listing $listing)
    {

        if(request('published') && Redis::sMembers($listing->redis_key.':images'))
            return back()->withErrors(['images_required' => 'Before publishing your listing live, it must have images attached.']);


        $validated_attributes = request()->validate([
            'condition' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'shipping_cost' => 'numeric'
        ]);

        $validated_attributes['allow_offers'] = request('allow_offers') == "on" ? 1 : 0;
        $validated_attributes['published'] = request('published') == "on" ? 1 : 0;

        $listing->listing->update($validated_attributes);

        // dd($listing->listing->wasChanged());
        if($listing->listing->wasChanged())
            return back()->with('status', 'Saved!');

        return back();

    }

    public function destroy()
    {
        # code...
    }

    public function publish(Listing $listing)
    {

        $listing->listing->published = true;

        $listing->listing->save();

        return back();
    }

    public function unpublish(Listing $listing)
    {
        $listing->listing->published = false;

        $listing->listing->save();

        return back();
    }

}
