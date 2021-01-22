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

    $home_categories = ['Watch List', 'Popular', 'Newest', 'Ending Soon'];
    // $artisans = array();
    $artisan_colorways = Artisan_Colorway::all();
    for ($i=0; $i < count($home_categories); $i++)
    {
    //     $picked = 0;
    //     foreach($all_artisans as $artisan) {

    //         // dd($artisan);

            if(!isset($artisans[$home_categories[$i]]))
                $artisans[$home_categories[$i]] = array();

            array_push($artisans[$home_categories[$i]], (object) array(
    //          $artisan_colorways->random(10);
            ));
    //         $picked++;

    //         if($picked == 5)
    //             break;
    //     }
    }
    dd($artisan_colorways);

    // $home_categories = ['Watch List', 'Popular', 'Newest', 'Ending Soon'];
    // $artisans = array();

    // for ($i=0; $i < count($home_categories); $i++) {

    return view('home',['categories'=>$artisans]);
});

require __DIR__.'/auth.php';
