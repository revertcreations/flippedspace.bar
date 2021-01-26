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

        $status = UsersArtisanColorway::create([
            'user_id' => $request->user()->id,
            'artisan_colorway_id' => $request->artisan_colorway_id
        ]);

        return back()
            ->with('status', $status);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'my_artisan_id' => 'required|integer',
        ]);

        $status = UsersArtisanColorway::destroy($request->my_artisan_id);

        return back()->with('status', $status);
    }
}
