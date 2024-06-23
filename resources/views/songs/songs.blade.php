@extends ('layout')

@section('content')
<table class="table">
    <thead>
        <a href="{{route('create')}}" class="btn btn-primary">{{__('добавить песню')}}</a>
        <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">duration</th>
        </tr>
    </thead>
    <tbody>
        @foreach($songs as $el)

        <tr>
            <th scope="row">{{$el->id}}</th>
            <td colspan="2">{{$el->song_title}}</td>
            <td>{{$el->duration}}</td>
            <td><a href="{{route('edit' , $el->id)}}" class="btn btn-primary">{{__('редактировать')}}</a></td>
            <td><a href="{{route('delete', $el->id)}}" class="btn btn-primary">{{__('удалить')}}</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection