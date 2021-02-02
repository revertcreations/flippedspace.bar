<?php

namespace App\Http\Controllers\Users\Collections;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function index()
    {
        // $artisans = UserArtisanColorway::where('user_id', Auth::user()->id)->get();

        // only get non-listing artisans...
        $artisans = UserArtisanColorway::query()
        ->leftJoin('artisan_colorway_listings', 'artisan_colorway_listings.users_artisan_colorway_id', 'users_artisan_colorways.id')
        ->where('user_id', Auth::user()->id)
        ->where('artisan_colorway_listings.listing_id', '=', null)
        ->select('users_artisan_colorways.*')
        ->get();

        return view('users.collections.index', ['artisans' => $artisans]);
    }
}
