@extends ('layout')

@section('content')
@foreach($song as $el)
<tr>
    <th scope="row">{{$el->song_id}}</th>
    <td colspan="2">{{$el->song_title}}</td>
    <td>{{$el->duration}}</td>
</tr>
@endforeach
@endsection