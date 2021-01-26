<?php

namespace App\Http\Controllers;

use App\Models\ArtisanColorway;
use App\Models\ArtisanSculpt;
use App\Models\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtisanColorwaysController extends Controller
{
    public function show(Request $request)
    {

        // NEED TO VALIDE THIS YO!!!
        // $search_terms = explode(" ", request('search'));
        $full_search = request('search');
        $search_terms = preg_split('/\s+/', request('search'), -1, PREG_SPLIT_NO_EMPTY);
        // dd($search_terms[0]);

        // dd($search_query);
        $search_results = collect([]);
        // $artisan_colorway_orWhere = query()->orWhere('artisan_colorways.name', "LIKE", "%{$search_query[0]}%");

        $tables = [];

        if (!empty($search_terms[0]) && strlen($search_terms[0]) > 2) {

            // $search_query = ArtisanColorway::query();
            // $search_query->select('artisans.name as artisan_name', 'artisans.website as website', 'artisan_sculpts.name as sculpt_name', 'artisan_colorways.*');
            // $search_query->leftJoin('artisan_sculpts', 'artisan_colorways.artisan_sculpt_id', '=', 'artisan_sculpts.id');
            // $search_query->leftJoin('artisans', 'artisan_sculpts.artisan_id', '=', 'artisans.id');
            // $search_query->where('artisan_colorways.name', 'LIKE', "%$full_search%");
            // foreach($search_terms as $i => $search_term){
            //     $search_query->orWhere('artisan_colorways.name', 'LIKE', "%$full_search%");
            //     $search_query->orWhere('artisan_colorways.name', 'LIKE', "%{$search_term}%");
            //     $search_query->orWhere('artisan_sculpts.name', 'LIKE', "%$full_search%");
            //     $search_query->orWhere('artisan_sculpts.name', 'LIKE', "%{$search_term}%");
            //     $search_query->orWhere('artisans.name', 'LIKE', "%$full_search%");
            //     $search_query->orWhere('artisans.name' , 'LIKE', "%{$search_term}%");
            // }
            // $search_results = $search_query->dd();


            $colorway_query = ArtisanColorway::query()
                ->select('artisans.name as artisan_name',
                        'artisans.website as website',
                        'artisan_sculpts.name as sculpt_name',
                        'artisan_colorways.*',
                        DB::raw("'colorway' AS type"))
                ->leftJoin('artisan_sculpts', 'artisan_colorways.artisan_sculpt_id', '=', 'artisan_sculpts.id')
                ->leftJoin('artisans', 'artisan_sculpts.artisan_id', '=', 'artisans.id')
                ->where('artisan_colorways.name', 'LIKE', "%$full_search%");

            $sculpt_query = ArtisanSculpt::query()
            ->select('artisans.name as artisan_name',
                    'artisans.website as website',
                    'artisan_sculpts.name as sculpt_name',
                    'artisan_colorways.*',
                    DB::raw("'sculpt' AS type"))
            ->leftJoin('artisan_colorways', 'artisan_colorways.artisan_sculpt_id', '=', 'artisan_sculpts.id')
            ->leftJoin('artisans', 'artisan_sculpts.artisan_id', '=', 'artisans.id')
            ->where('artisan_sculpts.name', 'LIKE', "%$full_search%");

            $artisan_query = Artisan::query()
            ->select('artisans.name as artisan_name',
                    'artisans.website as website',
                    'artisan_sculpts.name as sculpt_name',
                    'artisan_colorways.*',
                    DB::raw("'sculpt' AS type"))
            ->leftJoin('artisan_sculpts', 'artisan_sculpts.artisan_id', '=', 'artisans.id')
            ->leftJoin('artisan_colorways', 'artisan_colorways.artisan_sculpt_id', '=', 'artisan_sculpts.id')
            ->where('artisans.name', 'LIKE', "%$full_search%");


            foreach($search_terms as $i => $search_term){
                $colorway_query->orWhere('artisan_colorways.name', 'LIKE', "%{$search_term}%");
                $sculpt_query->orWhere('artisan_sculpts.name', 'LIKE', "%{$search_term}%");
                $artisan_query->orWhere('artisans.name' , 'LIKE', "%{$search_term}%");
            }


            $all_search_results = $colorway_query
                                    ->unionAll($sculpt_query)
                                    ->unionAll($artisan_query)->get();

            $duplicate_results = $all_search_results->duplicates();
            $unique_results = $all_search_results->unique();

            $search_results = $duplicate_results->merge($unique_results);


            // dd($search_results[0]);

        //     "(SELECT content, title, 'msg' as type FROM messages WHERE content LIKE '%" .
        //    $keyword . "%' OR title LIKE '%" . $keyword ."%')
        //    UNION
        //    (SELECT content, title, 'topic' as type FROM topics WHERE content LIKE '%" .
        //    $keyword . "%' OR title LIKE '%" . $keyword ."%')
        //    UNION
        //    (SELECT content, title, 'comment' as type FROM comments WHERE content LIKE '%" .
        //    $keyword . "%' OR title LIKE '%" . $keyword ."%')";

        }
        // dump($search_results->values()->all());
        // dd('done');
        session()->flashInput($request->input());

        return view('products.artisans', ['search_results' => $search_results]);

    }
}
