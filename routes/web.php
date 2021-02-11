<?php


use App\Models\Listing;
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

    $artisans = Listing::all();

    // $home_categories = [
    //     'Watch List' => $artisans->random(10),
    //     'Popular' => $artisans->random(10),
    //     'Newest'=> $artisans->random(10)
    // ];

    // dd($home_categories);

    return view('home',['artisans'=>$artisans]);
});

// Route::get('/search/artisans', [ArtisanColorwaysController::class, 'show']);

require __DIR__.'/auth.php';
require __DIR__.'/users.php';
require __DIR__.'/listings.php';
require __DIR__.'/products.php';
require __DIR__.'/collection.php';
require __DIR__.'/cart.php';
require __DIR__.'/catalog.php';
