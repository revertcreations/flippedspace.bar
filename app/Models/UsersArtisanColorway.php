<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersArtisanColorway extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function listing_detail()
    {
        return $this->hasOneThrough(ListingDetail::class, ArtisanColorwayListing::class);
    }

    public function artisan_colorways()
    {
        return $this->hasMany(ArtisanColorway::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
