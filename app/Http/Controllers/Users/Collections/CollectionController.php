<?php

namespace App\Http\Controllers\Users\Collections;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    public function index()
    {
        $artisans = UserArtisanColorway::where('user_id', Auth::user()->id)->get();
        // dd($artisans[0]->artisan_colorway_listing);
        return view('users.collections.index', ['artisans' => $artisans]);
    }
}
