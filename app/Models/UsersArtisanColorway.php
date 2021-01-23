<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersArtisanColorway extends Model
{
    use HasFactory;

    public function listing_detail()
    {
        return $this->hasOneThrough(ListingDetail::class, ArtisanColorwayListing::class);
    }
}
