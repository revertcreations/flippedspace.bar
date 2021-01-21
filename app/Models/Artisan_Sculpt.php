<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisan_Sculpt extends Model
{
    use HasFactory;

    protected $table = 'artisan_sculpts';
    protected $guarded = [];

    public function artisan()
    {
        $this->belongsTo(Artisan::class);
    }
}
