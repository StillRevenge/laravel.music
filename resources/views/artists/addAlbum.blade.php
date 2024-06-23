@extends ('layout')

@section('content')
<h2>Добавить альбом</h2>
<form method="POST" action="/album/create/store">
    {{csrf_field()}}
    <div>
    <input type="text" name="album_name" placeholder="name">
</div>
<div>
    <input type="text" name="release_year" placeholder="year">
</div>
    <input type="text" name="artist_id" placeholder="artist_id">
    <button type="submit">Создать</button>
</form>
@endsection