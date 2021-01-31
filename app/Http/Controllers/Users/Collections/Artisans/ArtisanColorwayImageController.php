<?php

namespace App\Http\Controllers\Users\Collections\Artisans;

use App\Http\Controllers\Controller;
use App\Models\UserArtisanColorway;
use App\Models\UserArtisanColorwayImage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class ArtisanColorwayImageController extends Controller
{
    public function store(Request $request)
    {

        foreach($request->file('artisan_images') as $image)
        {
            $cloudinary_result = $image->storeOnCloudinary('artisans');

            UserArtisanColorwayImage::create([
                'users_artisan_colorway_id' => $request->my_artisan_id,
                'artisan_colorway_id' => $request->artisan_colorway_id,
                'cloudinary_secure_path' => $cloudinary_result->getSecurePath(),
                'cloudinary_public_id' => $cloudinary_result->getPublicId()
            ]);
        }

        return back()->with('status', $cloudinary_result);
    }

    public function destroy(UserArtisanColorwayImage $image)
    {

        Cloudinary::destroy($image->id);

        $image->destroy($image->id);

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
