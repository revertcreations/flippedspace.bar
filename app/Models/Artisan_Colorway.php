<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan_Colorway extends Model
{
    use HasFactory;

    protected $table = 'artisan_colorways';
    protected $guarded = [];

    public function artisan_sculpt()
    {
        return $this->belongsTo(Artisan_Sculpt::class);
    }

    public function artisan()
    {
        return $this->belongsTo(Artisan::class);
    }
}
