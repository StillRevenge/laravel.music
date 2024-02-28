<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Songs;
use Illuminate\Support\Facades\DB;

class SongsController extends Controller
{
    public function getAllSongs()
    {
        $songs = Songs::all();
        return view('songs.songs')->with('songs', $songs);
    }

    public function getById($id)
    {
        $song = Songs::where('song_id', $id)->get();
        return view('songs.songsid')->with('song', $song);
    }

    public function updateSong($id)
    {
        $song =  DB::table('songs')->where('song_id', $id)->first();
        return view('songs.updatesong')->with('song', $song);
    }
    public function update(Request $request, $id)
    {
        $song = Songs::where('song_id', '=', $id)->first();
        $song->update($request->all());

        return redirect('songs/getall');
    }
    public function delete($id)
    {
        Songs::where('song_id', '=', $id)->delete();
        return redirect('songs/getall');
    }
    public function create()
    {
        return view('songs.create');
    }
    public function store()
    {
        $song = new Songs();
        $song->song_title = request('song_title');
        $song->duration = request('duration');
        $song->album_id = request('album_id');
        $song->save();
        return redirect('/songs/all');
    }
}
