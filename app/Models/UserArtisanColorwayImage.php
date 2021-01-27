<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArtisanColorwayImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'user_artisan_colorway_images';

    public function user_artisan_colorway()
    {
        return $this->belongsTo(UsersArtisanColorway::class);
    }

    public function artisan_colorway()
    {
        return $this->belongsTo(ArtisanColorway::class);
    }
}
