<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $allowed_filters = array('all', 'keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');
        $filter = ($request->filter && in_array($request->filter, $allowed_filters) ? $request->filter : '');

        return view('catalog.index', ['category' => $filter]);

    }

    public function search(Request $request)
    {
        $allowed_filters = array('keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');
        $filter = ($request->filter && in_array($request->filter, $allowed_filters) ? $request->filter.':' : '');

        $lower_search = strtolower(request('search'));
        $search_terms = preg_split('/\s+/', $lower_search, -1, PREG_SPLIT_NO_EMPTY);

        $category = in_array($request->filter, $allowed_filters) ? $request->filter : 'all';

        $match_results = [];
        $combined_results = [];
        $search_results = collect([]);

        if(!empty($search_terms)) {
            foreach($search_terms as $term)
                array_push($match_results, Redis::command('hscan', ['catalog:'.$filter.'search', "0", '*'.$term.'*', "1000000"]));

            for($i=0; $i <= (count($search_terms)-2);$i++)
                $combined_results = array_intersect($match_results[$i], $match_results[$i+1]);
        }

        if(!empty($match_results) && empty($combined_results))
            $combined_results = $match_results[0];

        foreach($combined_results as $key){
            $search_results->push(Redis::hGetAll('catalog:'.$filter.$key));
        }

        $search_results = $search_results->take(100);
        session()->flashInput($request->input());
        // dd($search_results);
        return view('catalog.index', ['filter' => $request->filter, 'search_results' => $search_results, 'category' => $category]);
    }
}
