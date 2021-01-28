<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanColorwayListing extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'artisan_colorway_listings';

    public function colorway()
    {
        return $this->hasOneThrough(ArtisanColorway::class, UserArtisanColorway::class, 'id', 'id', 'users_artisan_colorway_id', 'artisan_colorway_id');
    }

    public function listing()
    {
        return $this->hasOne(Listing::class, 'id', 'listing_id');
    }

    public function user_colorway()
    {
        return $this->belongsTo(UserArtisanColorway::class, 'users_artisan_colorway_id');
    }

    public function user()
    {
        // return $this->bel
    }

}

// class Mechanic extends Model
// {
//     /**
//      * Get the car's owner.
//      */
//     public function carOwner()
//     {
//         return $this->hasOneThrough(
//             Owner::class,
//             Car::class,
//             'mechanic_id', // Foreign key on the cars table...
//             'car_id', // Foreign key on the owners table...
//             'id', // Local key on the mechanics table...
//             'id' // Local key on the cars table...
//         );
//     }
// }
