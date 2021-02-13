<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CollectibleImageController extends Controller
{

    public function store(Request $request, $category, $catalog_key)
    {
        if(empty($request->file()))
            return back()->withErrors(['empty_file' => 'No images were attached.']);

        $collection = 'users:'.Auth::user()->id.':collection';

        foreach($request->file('artisan_images') as $image) {

            $cloudinary_result = $image->storeOnCloudinary($category);
            $images_key = $collection.':'.$category.':'.$catalog_key.':images';

            Redis::hMSet($images_key.':'.$cloudinary_result->getPublicId(), [
                'cloudinary_secure_path' => $cloudinary_result->getSecurePath(),
                'cloudinary_public_id' => $cloudinary_result->getPublicId(),
                'file_extension' => $cloudinary_result->getExtension(),
                'is_cover' => false
            ]);

            Redis::sAdd($images_key, $images_key.':'.$cloudinary_result->getPublicId());

        }

        return back();
    }

    public function destroy($category, $catalog_key, $cloudinary_public_id)
    {

        $collection = 'users:'.Auth::user()->id.':collection';

        $cloudinary_public_id = str_replace('_', '/', $cloudinary_public_id);
        $cloudinary_image = Cloudinary::destroy($cloudinary_public_id);

        if($cloudinary_image) {

            $redis_key = $collection.':'.$category.':'.$catalog_key.':images';
            // remove image member from the set
            Redis::sRem($redis_key, $redis_key.':'.$cloudinary_public_id);
            // remove the hash since cloud is deleted
            Redis::hDel($redis_key.':'.$cloudinary_public_id);

        }

        return back();
    }

    public function set_cover(Request $request)
    {
        if (!empty($current_cover_img[0])) {
            $current_cover_img[0]->is_cover = false;
            $current_cover_img[0]->save();
        }

        $request->is_cover = true;
        $request->save();

        return back();

    }
}
