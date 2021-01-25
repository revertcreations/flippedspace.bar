<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersArtisanColorway;
use Illuminate\Http\Request;

class UserArtisanColorwaysController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'artisan_colorway_id' => 'required|integer',
        ]);

        UsersArtisanColorway::create([
            'user_id' => $request->user()->id,
            'artisan_colorway_id' => $request->artisan_colorway_id
        ]);

        return redirect('/my/collections');
    }
}
