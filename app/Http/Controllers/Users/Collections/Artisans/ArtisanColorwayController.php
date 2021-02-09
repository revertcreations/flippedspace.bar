<?php

namespace App\Http\Controllers\Users\Collections\Artisans;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ArtisanColorwayController extends Controller
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
        return view('users.collections.index', ['artisans' => $artisans]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'artisan_colorway_id' => 'required|integer',
        ]);

        // $status = UserArtisanColorway::create([
        //     'user_id' => $request->user()->id,
        //     'artisan_colorway_id' => $request->artisan_colorway_id
        // ]);

        $status = Redis::sAdd('users:'.Auth::user()->id.':collection:artisans', 'catalog:artisans:'.$request->artisan_colorway_id);

        // dd($status);

        return back()->with('status', $status);
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'my_artisan_id' => 'required|integer',
        ]);

        $status = Redis::sRem('users:'.Auth::user()->id.':collection:artisans', 'catalog:artisans:'.$request->artisan_colorway_id);
        // $status = UserArtisanColorway::destroy($request->my_artisan_id);

        return back()->with('status', $status);
    }
}
