<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';
    public function album()
    {
        return $this->hasMany(Album::class);
    }
    public function song()
    {
        return $this->hasManyThrough(Song::class, Album::class);
    }
}
