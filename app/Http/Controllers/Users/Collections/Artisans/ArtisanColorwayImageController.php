<?php

namespace App\Http\Controllers\Users\Collections\Artisans;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use App\Models\UserArtisanColorwayImage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ArtisanColorwayImageController extends Controller
{
    public function store(Request $request)
    {
        if(empty($request->file()))
            return back()->withErrors(['empty_file' => 'No images were attached.']);

        foreach($request->file('artisan_images') as $image)
        {
            $cloudinary_result = $image->storeOnCloudinary('artisans');
            $redis_key = 'users:'.Auth::user()->id.':collection:artisans:'.$request->artisan_colorway_id.':images:'.$cloudinary_result->getFileName();
            Redis::sAdd('users:'.Auth::user()->id.':collection:artisans:'.$request->artisan_colorway_id.':images', $redis_key);

            Redis::hMSet($redis_key, [
                'cloudinary_secure_path' => $cloudinary_result->getSecurePath(),
                'cloudinary_public_id' => $cloudinary_result->getPublicId(),
                'file_extension' => $cloudinary_result->getExtension(),
                'file_name' => $cloudinary_result->getFileName()
            ]);
        }

        return back()->with('status', $cloudinary_result);
    }

    public function destroy(UserArtisanColorwayImage $image)
    {
        $cloudinary_image = Cloudinary::destroy($image->cloudinary_public_id);

        UserArtisanColorwayImage::where('id', $image->id)->delete();

        return back();
    }

    public function set_cover(UserArtisanColorwayImage $image)
    {

        $current_cover_img = UserArtisanColorwayImage::where('users_artisan_colorway_id', $image->users_artisan_colorway_id)
            ->where('is_cover', true)->get();

        if (!empty($current_cover_img[0]))
        {
            $current_cover_img[0]->is_cover = false;
            $current_cover_img[0]->save();
        }

        $image->is_cover = true;
        $image->save();

        return back();

    }
}
