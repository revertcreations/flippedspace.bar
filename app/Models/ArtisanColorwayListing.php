<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanColorwayListing extends Model
{
    use HasFactory;

    public function artisan_colorway()
    {
        return $this->hasOneThrough(ArtisanColorway::class, UserArtisanColorways::class);
    }

    public function listing()
    {
        return $this->hasOne(Listing::class);
    }

}
