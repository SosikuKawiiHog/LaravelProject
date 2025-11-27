@extends('layout')
@section('content')
    <div class="container mt-4">
        <h2>{{$genre ? "Список игр в жанре ".$genre->name : 'Неверный ID жанра'}}</h2>
        @if($genre)
            <table border="1" class="table table-bordered table-striped">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Разработчик</th>
                    <th>Дата выхода</th>
                    <th>Metascore</th>
                </tr>
                @foreach($genre->games as $game)
                    <tr>
                        <td>{{$game->id}}</td>
                        <td><a href="{{url('game',$game->id)}}">{{$game->title}}</a></td>
                        <td>{{$game->developer->name}}</td>
                        <td>{{$game->release_date->format('Y-m-d')}}</td>
                        <td>{{$game->meta_score}}</td>
                    </tr>
                @endforeach
            </table>
            <h2>{{"Итого: ".$total}}</h2>
        @endif
    </div>
@endsection
