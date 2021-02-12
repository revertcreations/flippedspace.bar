<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class CollectionController extends Controller
{
    public function index($category = '')
    {
        $allowed_filters = array('keyboards', 'keycaps', 'artisans', 'switches', 'pcbs', 'other');
        $filter = null;
        $data = array();
        if(!empty($category && in_array($category, $allowed_filters))) {
            $filter = $category;
            $data['category'] = $filter;
        }

        $redis_base_key = 'users:'.Auth::user()->id.':collection'.($filter ? ':'.$filter : '');
        $collectibes = collect([]);
        $collectibes_set = Redis::sMembers($redis_base_key);

        foreach($collectibes_set as $collectible)
        {
            $current = Redis::hGetAll($collectible);
            // get id of artisans from key that belong to user [collection:artisans:2899]
            preg_match('/.*:(.*)/', $collectible, $matches);

            $artisan_images_set = Redis::sMembers('users:'.Auth::user()->id.':collection:artisans:'.$matches[1].':images');
            $current['images'] = array();

            foreach($artisan_images_set as $image_set)
                array_push($current['images'], Redis::hGetAll($image_set));

            $collectibes->push($current);
        }
        $data['collectibles'] = $collectibes;

        // dd($artisans);
        return view('users.collection.index', $data);
    }
}
