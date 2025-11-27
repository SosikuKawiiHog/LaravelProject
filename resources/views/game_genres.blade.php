@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>{{$game ? "Жанры игры ".$game->title : 'Неверный ID игры'}}</h2>
        @if($game)
            <table border="1" class="table table-bordered table-striped">
                <tr>
                    <th>id</th>
                    <th>Название жанра</th>
                </tr>
                @foreach($game->genres as $genre)
                    <tr>
                        <td>{{$genre->id}}</td>
                        <td><a href="{{route('genre',$genre->id)}}">{{$genre->name}}</a></td>
                    </tr>
                @endforeach
            </table>

            <a class="link-primary" href="{{url('game',$game->id)}}">Вернуться</a>
        @endif
    </div>
@endsection
