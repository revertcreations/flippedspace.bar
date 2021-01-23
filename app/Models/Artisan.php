<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sculpts()
    {
        return $this->hasMany(ArtisanSculpt::class);
    }

    public function colorways()
    {
        return $this->hasManyThrough(ArtisanColorway::class, ArtisanSculpt::class);
    }
}
