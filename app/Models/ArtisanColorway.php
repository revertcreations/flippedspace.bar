<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtisanColorway extends Model
{
    use HasFactory;

    protected $table = 'artisan_colorways';
    protected $guarded = [];

    public function sculpt()
    {
        return $this->belongsTo(ArtisanSculpt::class, 'artisan_sculpt_id');
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}