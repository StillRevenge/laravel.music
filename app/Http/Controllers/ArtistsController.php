<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistsController extends Controller
{
    public function getAllArtists()
    {
        $artists = Artist::with('album.song')->get();
        return $artists;
    }
    public function getAlbum($id)
    {
        $artist = Artist::with('album.song')->where('id', '=', $id)->first();
        return $artist;
    }
    public function delete($id)
    {
        Album::where('id', '=', $id)->delete();
        return true;
    }
    public function create()
    {
        return view('artists.addAlbum');
    }
    public function store()
    {
        $album = new Album();
        $album->album_name = request('album_name');
        $album->release_year = request('release_year');
        $album->artist_id = request('artist_id');
        $album->save();
        return redirect()->route('artists');
    }
    public function getName($id)
    {
        $album =  Album::where('id', '=', $id)->first();
        return $album;
    }
    public function getNames()
    {
        $albums = Album::all();
        return $albums;
    }
}
