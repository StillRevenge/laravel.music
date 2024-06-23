<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\PageRequest;
use App\Http\Resources\Song\SongResource;

class SongsController extends Controller
{
    public function getAllSongs()
    {
        $songs = Song::all();
        return $songs;
    }

    public function getById($id)
    {
        $song = Song::where('id', '=', $id)->first();
        return new SongResource($song);
    }

    public function edit($id)
    {
        $songup = Song::where('id', '=', $id)->first();
        return view('songs.updatesong')->with('song', $songup);
    }
    public function update($id, Request $request)
    {
        $song = Song::query()->find($id);
        $song->song_title = $request->get('song_title');
        $song->duration = $request->get('duration');
        $song->save();
        return true;
    }
    public function delete($id)
    {
        Song::where('id', '=', $id)->delete();
        return true;
    }
    public function store(Request $request)
    {
        $song = new Song();
        $song->song_title = $request->song_title;
        $song->duration = $request->duration;
        $song->album_id = $request->album_id;
        $song->save();
        return $song;
    }
    public function getPage(PageRequest $request): JsonResponse
    {
        $all = Song::query()->paginate($request->post('itemsOnPage'), ['*'], 'page', $request->post('pageNumber'));
        return response()->json($all);
    }
    public function storeOne()
    {
        $song = new Song();
        $song->song_title = request('song_title');
        $song->duration = request('duration');
        $song->album_id = request('album_id');
        $song->save();
        return redirect()->route('artists');
    }
    public function uploadSong(Request $request, $id)
    {
        $path = $request->file('file')->store('uploads', 'public');
        $song = Song::query()->find($id);
        $song->song_path = '/storage/' . $path;
        $song->save();
        return $song;
    }
}
