<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artisans_Collection extends Model
{
    use HasFactory;

    protected $table = 'artisans_collection';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
