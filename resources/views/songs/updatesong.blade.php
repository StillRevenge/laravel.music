@extends ('layout')

@section('content')

<h1>Изменение записи</h1>

<form action="/songs/{{$song->song_id}}" method="POST">
    {{method_field('PUT')}}
    {{csrf_field()}}
    <label for="">название</label>
    <input type="text" name="song_title" value="{{$song->song_title}}">
    <label for="">длительность</label>
    <input type="text" name="duration" value="{{$song->duration}}">

    <button type="submit">Сохранить</button>
</form>
@endsection