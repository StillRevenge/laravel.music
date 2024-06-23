@extends ('layout')

@section('content')

<h1>Изменение записи</h1>

<form method="POST" action="{{route('songs.update', $song->id)}}">
    @csrf
    @method('PUT')
    <label for="">название</label>
    <input type="text" name="song_title" value="{{$song->song_title}}">
    <label for="">длительность</label>
    <input type="text" name="duration" value="{{$song->duration}}">

    <button type="submit">Сохранить</button>
</form>
@endsection