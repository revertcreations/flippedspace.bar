<?php

namespace App\Http\Controllers;

use App\Models\ArtisanColorway;
use App\Models\ArtisanSculpt;
use App\Models\Artisan;
use Illuminate\Http\Request;

class ArtisanColorwaysController extends Controller
{
    public function show(Request $request)
    {
        $search_query = request('search');
        $search_results = collect([]);

        if (!empty($search_query) && strlen($search_query) > 2) {
            $search_results = ArtisanColorway::query()
            ->leftJoin('artisan_sculpts', 'artisan_colorways.artisan_sculpt_id', '=', 'artisan_sculpts.id')
            ->leftJoin('artisans', 'artisan_sculpts.artisan_id', '=', 'artisans.id')
            ->where('artisan_colorways.name', "LIKE", "%{$search_query}%")
            ->orWhere('artisan_sculpts.name', 'LIKE', "%{$search_query}%")
            ->orWhere('artisans.name' , 'LIKE', "%{$search_query}%")
            ->select('artisans.name as artisan_name', 'artisans.website as website', 'artisan_sculpts.name as sculpt_name', 'artisan_colorways.*')
            ->get();
        }
        // dump($search_results->values()->all());
        // dd('done');
        session()->flashInput($request->input());

        return view('products.artisans', ['search_results' => $search_results]);

    }
}
