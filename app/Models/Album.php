<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';
    protected $fillable = [
        'album_name',
        'release_year',
        'artist_id',
    ];

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class, 'artist_id', 'album_id');
    }
    public function song()
    {
        return $this->hasMany(Song::class);
    }
}
