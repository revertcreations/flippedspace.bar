<?php

namespace App\Http\Controllers\My;

use App\Http\Controllers\Controller;
use App\Models\ArtisanColorway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionsController extends Controller
{
    public function index()
    {
        $my_artisans = ArtisanColorway::query()
            ->leftJoin('users_artisan_colorways', 'users_artisan_colorways.artisan_colorway_id', '=', 'artisan_colorways.id')
            ->where('users_artisan_colorways.user_id', Auth::user()->id)
            ->select('users_artisan_colorways.id as my_artisan_id', 'artisan_colorways.*')
            ->get();

        return view('my.collections.index', ['my_artisans' => $my_artisans]);
    }
}
