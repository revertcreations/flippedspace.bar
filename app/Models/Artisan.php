<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artisan_sculpts()
    {
        return $this->hasMany(Artisan_Sculpt::class);
    }

    public function artisan_colorways()
    {
        return $this->hasMany(Artisan_Colorway::class);
    }
}
