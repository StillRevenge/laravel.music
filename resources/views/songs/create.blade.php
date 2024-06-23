@extends ('layout')

@section('content')
<h2>Добавить песню</h2>
<form method="POST" action="/songs/create/store">
    {{csrf_field()}}
    <div>
    <input type="text" name="song_title" placeholder="name">
</div>
<div>
    <input type="text" name="duration" placeholder="duration">
</div>
    <input type="text" name="album_id" placeholder="album_id">
    <button type="submit">Создать</button>
</form>
@endsection