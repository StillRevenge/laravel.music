<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'duration',
        'album_id',
        'song_path',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
