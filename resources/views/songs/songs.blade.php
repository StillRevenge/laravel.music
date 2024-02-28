@extends ('layout')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $el)

        <tr>
            <th scope="row">{{$el->song_id}}</th>
            <td colspan="2">{{$el->song_title}}</td>
            <td>{{$el->duration}}</td>
            <td><a href="{{route('login')}}">{{__('редактировать')}}</a></td>
            <td><a href="{{route('login')}}">{{__('удалить')}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection