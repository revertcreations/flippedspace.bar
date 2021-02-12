<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CollectibleController extends Controller
{
    private $collection;

    public function __construct()
    {
        $this->collection = 'users:'.Auth::user()->id.':collection';
    }
    // public function index()
    // {
    //     $redis_base_key = 'users:'.Auth::user()->id.':collection';
    //     $artisans = collect([]);
    //     $artisans_set = Redis::sMembers($redis_base_key);

    //     foreach($artisans_set as $catalog_artisan)
    //     {
    //         $current_artisan = Redis::hGetAll($catalog_artisan);
    //         // get id of artisans from key that belong to user [collection:artisans:2899]
    //         preg_match('/.*:(.*)/', $catalog_artisan, $matches);

    //         $artisan_images_set = Redis::sMembers('users:'.Auth::user()->id.':collection:artisans:'.$matches[1].':images');
    //         $current_artisan['images'] = array();

    //         foreach($artisan_images_set as $image_set)
    //             array_push($current_artisan['images'], Redis::hGetAll($image_set));

    //         $artisans->push($current_artisan);
    //     }
    //     // dd($artisans);
    //     return view('users.collection.index', ['collectibles' => $artisans]);
    // }

    public function store($category, $catalog_key)
    {

        // $request->validate([
        //     'artisan_colorway_id' => 'required|integer',
        // ]);

        $item = 'catalog:'.$category.':'.$catalog_key;

        Redis::sAdd($this->collection, $item);
        Redis::sAdd($this->collection.':'.$category, $item);

        return redirect(url()->previous().'#artisan_card_'.$catalog_key)->with('id', $catalog_key);
    }

    public function destroy($category, $catalog_key)
    {

        // $request->validate([
        //     'artisan_colorway_id' => 'required|integer',
        // ]);

        $item = 'catalog:'.$category.':'.$catalog_key;

        Redis::sRem($this->collection, $item);
        $status = Redis::sRem($this->collection.':'.$category,  $item);

        return back()->with('status', $status);
    }
}
