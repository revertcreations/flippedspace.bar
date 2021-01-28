<?php

namespace App\Http\Controllers\Users\Collections\Artisans;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtisanColorwayController extends Controller
{

    public function index()
    {
        $artisans = UserArtisanColorway::where('user_id', Auth::user()->id)->get();

        // dd($artisans);

        return view('users.collections.index', ['artisans' => $artisans]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'artisan_colorway_id' => 'required|integer',
        ]);

        $status = UserArtisanColorway::create([
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

        $status = UserArtisanColorway::destroy($request->my_artisan_id);

        return back()->with('status', $status);
    }
}
