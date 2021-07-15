<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CollectibleImageController extends Controller
{

    public function store(Request $request, $catalog_key)
    {
        // dd('here');
        if(empty($request->file()))
            return back()->withErrors(['empty_file' => 'No images were attached.']);

        $collection = 'users:'.Auth::user()->id.':collection';

        foreach($request->file('artisan_images') as $image) {

            $cloudinary_result = $image->storeOnCloudinary('artisans');
            $images_key = $collection.':artisans:'.$catalog_key.':images';
            // dd($images_key);

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

    public function destroy($catalog_key, $cloudinary_public_id)
    {

        $collection = 'users:'.Auth::user()->id.':collection';

        $cloudinary_public_id = str_replace('_', '/', $cloudinary_public_id);
        $cloudinary_image = Cloudinary::destroy($cloudinary_public_id);

        if($cloudinary_image) {

            $image_key = $collection.':'.$catalog_key.':images';
            // remove image member from the set
            Redis::sRem($image_key, $image_key.':'.$cloudinary_public_id);
            // remove the hash since cloud is deleted
            Redis::hDel($image_key.':'.$cloudinary_public_id);

        }

        return back();
    }

    public function set_cover($catalog_key, $cloudinary_public_id)
    {

        $collection = 'users:'.Auth::user()->id.':collection';
        $cloudinary_public_id = str_replace('_', '/', $cloudinary_public_id);
        $images_key = $collection.':'.$catalog_key.':images';

        // dd($images_key);

        // loop through all collectibe images, and set is_cover to false
        $current_images =  Redis::sMembers($images_key);
        foreach ($current_images as $image) {
            if($image == $images_key.':'.$cloudinary_public_id) {
                Redis::hSet($image, 'is_cover', true);
                // dd($image);
            } else {
                Redis::hSet($image, 'is_cover', false);
            }
        }

        return back();

    }
}
