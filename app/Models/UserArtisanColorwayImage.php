<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserArtisanColorwayImage extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'users_artisan_colorway_images';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function(Builder $builder) {
            $builder->orderBy('is_cover', 'desc');
        });
    }

    public function user_artisan_colorway()
    {
        return $this->belongsTo(UserArtisanColorway::class);
    }

    public function artisan_colorway()
    {
        return $this->belongsTo(ArtisanColorway::class);
    }
}
