<?php

namespace App\Http\Resources\Song;

use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'song_title' => $this->song_title,
            'duration' => $this->duration,
            'album_id' => $this->album_id,
        ];
    }
}
