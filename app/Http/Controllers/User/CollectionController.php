<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CollectionController extends Controller
{
    public function index()
    {
        $redis_base_key = 'users:'.Auth::user()->id.':collection:artisans';
        $artisans = collect([]);
        $artisans_set = Redis::sMembers($redis_base_key);

        foreach($artisans_set as $catalog_artisan)
        {
            $current_artisan = Redis::hGetAll($catalog_artisan);
            // get id of artisans from key that belong to user [collection:artisans:2899]
            preg_match('/.*:(.*)/', $catalog_artisan, $matches);

            $artisan_images_set = Redis::sMembers('users:'.Auth::user()->id.':collection:artisans:'.$matches[1].':images');
            $current_artisan['images'] = array();

            foreach($artisan_images_set as $image_set)
                array_push($current_artisan['images'], Redis::hGetAll($image_set));

            $artisans->push($current_artisan);
        }
        // dd($artisans);
        return view('users.collection.index', ['artisans' => $artisans]);
    }
}
