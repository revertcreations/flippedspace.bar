<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanColorway extends Model
{
    use HasFactory;

    protected $table = 'artisan_colorways';
    protected $guarded = [];

    public function artisan_sculpt()
    {
        return $this->belongsTo(ArtisanSculpt::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}
