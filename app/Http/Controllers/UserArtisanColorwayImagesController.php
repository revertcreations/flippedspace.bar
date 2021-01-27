<?php

namespace App\Http\Controllers;

use App\Models\UserArtisanColorwayImage;
// use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class UserArtisanColorwayImagesController extends Controller
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

        return back()
            ->with('status', $cloudinary_result);
    }
}
