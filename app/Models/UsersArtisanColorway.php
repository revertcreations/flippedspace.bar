<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersArtisanColorway extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function listing()
    {
        return $this->hasOneThrough(Listing::class, ArtisanColorwayListing::class, 'users_artisan_colorway_id','id','id','listing_id');

    }

    public function colorway()
    {
        return $this->belongsTo(ArtisanColorway::class, 'artisan_colorway_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(UserArtisanColorwayImage::class);
    }
}
