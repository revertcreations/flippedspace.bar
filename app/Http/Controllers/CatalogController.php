<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class CatalogController extends Controller
{
    public function index($category = '')
    {
        $allowed_filters = array('all', 'keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');
        $category = ($category && in_array($category, $allowed_filters) ? $category : '');

        return view('catalog.index', ['category' => $category]);

    }

    public function search($category = '')
    {

        $search = request('search');
        $allowed_filters = array('keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');

        $category = in_array($category, $allowed_filters) ? $category : '';
        $category_key = $category.':';

        $lower_search = strtolower(request('search'));
        $search_terms = preg_split('/\s+/', $lower_search, -1, PREG_SPLIT_NO_EMPTY);

        $match_results = [];
        $combined_results = [];
        $search_results = collect([]);

        if(!empty($search_terms)) {
            foreach($search_terms as $term)
                array_push($match_results, Redis::command('hscan', ['catalog:'.$category_key.'search', "0", '*'.$term.'*', "1000000"]));

            for($i=0; $i <= (count($search_terms)-2);$i++)
                $combined_results = array_intersect($match_results[$i], $match_results[$i+1]);
        }

        if(!empty($match_results) && empty($combined_results))
            $combined_results = $match_results[0];

        foreach($combined_results as $key)
            $search_results->push(Redis::hGetAll('catalog:'.$category_key.$key));

        $search_results = $search_results->take(100);

        session()->flashInput(request()->all());

        return view('catalog.index', ['search_results' => $search_results])->with(compact('category'));

    }
}
