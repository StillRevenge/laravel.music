@extends ('layout')

@section('content')
    <tbody>
            <a href="{{route('createAl')}}" class="btn btn-primary">{{__('Добавить альбом')}}</a>
            <div class="card-group">
                <div class="row">
        @foreach ($artists as $artist)

    @foreach ($artist->album as $album)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
    <h3 class="card-title">{{$album->album_name}}</h3>
    <h5 class="card-title">{{$artist->artist_name}}</h5>
    @foreach ($album->song as $song)
    <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ $song->song_title }}</li>
        @endforeach
    </ul>
    <a href="{{route('getalbum', $artist->id)}}" class="btn btn-primary">{{__('к исполнителю')}}</a>
</div>
</div>
        @endforeach
        @endforeach
    </div>
</div>
    </tbody>
</table>
@endsection




