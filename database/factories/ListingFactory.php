<?php

namespace Database\Factories;

use App\Http\Controllers\User\CollectibleImageController;
use App\Models\Listing;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

// use Illuminate\Support\Facades\Request;

class ListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Listing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $allArtisans = collect(Redis::hGetAll('catalog:artisans:search'));
        $randomArtisanId = $this->faker->numberBetween(0, 29223);

        $randomArtisan = collect(Redis::hGetAll('catalog:artisans:'.$randomArtisanId));
        $newUser = User::factory(1)->create();

        $collection = 'users:'.$newUser[0]->id.':collection';
        $images_key = $collection.':artisans:'.$randomArtisan.':images';

        $image = file_get_contents($randomArtisan['keycap_archivist_img']);
        Storage::disk('local')->put($randomArtisan['keycap_archivist_id'].'.jpg', $image);
        // dd(storage_path('app/'.$randomArtisan['keycap_archivist_id'].'.jpg'));
        $cloudinary_result = Cloudinary::upload(storage_path('app/'.$randomArtisan['keycap_archivist_id'].'.jpg'));

        $images_key = $collection.':artisans:'.$randomArtisanId.':images';

        Redis::hMSet($images_key.':'.$cloudinary_result->getPublicId(), [
            'cloudinary_secure_path' => $cloudinary_result->getSecurePath(),
            'cloudinary_public_id' => $cloudinary_result->getPublicId(),
            'file_extension' => $cloudinary_result->getExtension(),
            'is_cover' => false
        ]);

        Redis::sAdd($images_key, $images_key.':'.$cloudinary_result->getPublicId());

        return [
            'user_id' => $newUser[0]->id,
            'catalog_key' => 'artisans:'.$randomArtisanId,
            'title' => $this->faker->sentence(),
            'description' => implode("\n", $this->faker->paragraphs(2)),
            'category_id' => 1,
            'condition_id' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->numberBetween(20, 975),
            'shipping_cost' => $this->faker->numberBetween(8, 16),
            'published' => $this->faker->numberBetween(0, 1),
            'allow_offers' => $this->faker->numberBetween(0, 1)
        ];
    }
}
