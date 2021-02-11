<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CatalogController extends Controller
{
    public function index(Request $request)
    {

        // NEED TO VALIDE THIS YO!!!
        $lower_search = strtolower(request('search'));
        $search_terms = preg_split('/\s+/', $lower_search, -1, PREG_SPLIT_NO_EMPTY);

        $match_results = [];
        $combined_results = [];
        $search_results = collect([]);

        if(!empty($search_terms)) {
            foreach($search_terms as $term)
                array_push($match_results, Redis::command('hscan', ['catalog:artisans:search', "0", '*'.$term.'*', "1000000"]));

            for($i=0; $i <= (count($search_terms)-2);$i++)
                $combined_results = array_intersect($match_results[$i], $match_results[$i+1]);
        }

        if(!empty($match_results) && empty($combined_results))
            $combined_results = $match_results[0];

        foreach($combined_results as $index){
            $search_results->push(Redis::hGetAll('catalog:artisans:'.$index));
        }

        $search_results = $search_results->take(100);

        session()->flashInput($request->input());

        return view('products.artisans', ['search_results' => $search_results]);

    }
}
