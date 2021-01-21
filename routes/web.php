<?php

use App\Models\Artisan;
use App\Models\Artisan_Sculpt;
use App\Models\Artisan_Colorway;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // $response = Http::get('https://raw.githubusercontent.com/keycap-archivist/database/master/db/catalog.json');
    // $all_artisans = $response->json();
    // // dd($all_artisans[11]['sculpts']);

    // $home_categories = ['Watch List', 'Popular', 'Newest', 'Ending Soon'];
    // $artisans = array();

    // for ($i=0; $i < count($home_categories); $i++) {
    //     $picked = 0;
    //     foreach($all_artisans as $artisan) {

    //         // dd($artisan);

    //         if(!isset($artisans[$home_categories[$i]]))
    //             $artisans[$home_categories[$i]] = array();

    //         $randomly_chosen_maker_id = rand(0, (count($all_artisans) - 1));
    //         $randomly_chosen_sculpt_id = rand(0, (count($all_artisans[$randomly_chosen_maker_id]['sculpts']) - 1));
    //         $randomly_chosen_colorway_id = rand(0, (count($all_artisans[$randomly_chosen_maker_id]['sculpts'][$randomly_chosen_sculpt_id]['colorways']) -1 ));

    //         array_push($artisans[$home_categories[$i]], (object) array(
    //             'maker_name' => $all_artisans[$randomly_chosen_maker_id]['name'],
    //             'image_src' => $all_artisans[$randomly_chosen_maker_id]['sculpts'][$randomly_chosen_sculpt_id]['colorways'][$randomly_chosen_colorway_id]['img'],
    //             'sculpt_name' => $all_artisans[$randomly_chosen_maker_id]['sculpts'][$randomly_chosen_sculpt_id]['name'],
    //             'colorway_name' => $all_artisans[$randomly_chosen_maker_id]['sculpts'][$randomly_chosen_sculpt_id]['colorways'][$randomly_chosen_colorway_id]['name']
    //         ));
    //         $picked++;

    //         if($picked == 5)
    //             break;
    //     }
    // }
    $artisan_colorways = Artisan_Colorway::all()->random(10)->artisan_sculpt()->artisan();
    $artisans = array();

    dd($artisan_colorways);

        // $home_categories = ['Watch List', 'Popular', 'Newest', 'Ending Soon'];
    // $artisans = array();

    // for ($i=0; $i < count($home_categories); $i++) {

    return view('home',['categories'=>$artisans]);
});

require __DIR__.'/auth.php';
