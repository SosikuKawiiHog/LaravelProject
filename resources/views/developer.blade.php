@extends('layout')

@section('content')
    <div class="container">
        <h2>{{$developer ? "Список игр от разработчиков ".$developer->name : 'Неверный ID разработчика'}}</h2>
        @if($developer)
            <table border="1" class="table table-bordered">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                    <th>Metacritic</th>
                    <th>Оценка пользователей</th>
                </tr>
                @foreach($developer->games as $game)
                    <tr>
                        <td>{{$game->id}}</td>
                        <td><a href="{{url('game',$game->id)}}">{{$game->title}}</a></td>
                        <td>{{$game->meta_score}}</td>
                        <td>{{ number_format($game->reviews_avg_rating, 1) }}</td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
