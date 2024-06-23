@extends ('layout')

@section('content')
<tr>
    <th scope="row">{{$song->id}}</th>
    <td colspan="2">{{$song->song_title}}</td>
    <td>{{$song->duration}}</td>
</tr>
@endsection