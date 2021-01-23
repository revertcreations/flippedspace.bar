<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanSculpt extends Model
{
    use HasFactory;

    protected $table = 'artisan_sculpts';
    protected $guarded = [];

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }

    public function colorways()
    {
        return $this->hasMany(ArtisanColorway::class);
    }
}
