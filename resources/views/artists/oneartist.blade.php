@extends ('layout')

@section('content')
    <tbody>
        <div class="card-group">
            <div class="row">
    @foreach ($artistt->album as $album)
    <div class="card" style="width: 18rem;">
        <a href="{{route('addSong', $album->id)}}" class="btn btn-primary">{{__('добавить песню в альбом')}}</a>
        <div class="card-body">
    <h3 class="card-title">{{$album->album_name}}</h3>
    <h5 class="card-title">{{$artistt->artist_name}}</h5>
    <ul class="list-group list-group-flush">
    @foreach ($album->song as $song)
    <tr>
        <td>{{ $song->song_title }}</td>
    </tr>
    <a href="{{route('edit',$song->id)}}" class="btn btn-primary">{{__('редактировать')}}</a>
        <a href="{{route('delete', $song->id)}}" class="btn btn-primary">{{__('удалить')}}</a>
        @endforeach
    </ul>
    <a href="{{route('deleteAl', $album->id)}}" class="btn btn-primary">{{__('удалить весь альбом')}}</a>
</div>
</div>
        @endforeach

    </div>
</div>
    </tbody>
</table>
@endsection