<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artisan_colorway_listings()
    {
        return $this->hasOne(ArtisanColorwayListing::class, 'listing_id');
    }

    public function FunctionName(Type $var = null)
    {
        # code...
    }
}
