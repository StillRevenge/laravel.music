@extends ('layout')

@section('content')
<h2>Добавить песню</h2>
<form method="POST" action="/album/create/storeOne">
    {{csrf_field()}}
    <div>
        <label for="">Название</label>
        <input type="text" name="song_title" placeholder="name">
    </div>
    <div>
        <label for="">Продолжительность</label>
        <input type="text" name="duration" placeholder="duration">
    </div>
    <div>
        <label for="">Для альбома</label>
        <input type="text" name="album_id" value="{{$currId}}">
    </div>
    <button type="submit">Создать</button>
</form>
@endsection