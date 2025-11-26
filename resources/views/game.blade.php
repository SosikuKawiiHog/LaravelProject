@extends('layout')
@section('content')
<h2>{{$game ? "Информация об игре ".$game->title : 'Неверный ID игры'}}</h2>
@if($game)
    <table border="1">
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Дата выхода</th>
            <th>Разработчик</th>
            <th>Metascore</th>
            <th>Пользовательски рейтинг</th>
        </tr>
        <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->title}}</td>
            <td>{{$game->description}}</td>
            <td>{{$game->release_date->format('Y-m-d')}}</td>
            <td>{{$game->developer->name}}</td>
            <td>{{$game->meta_score}}</td>
            <td>{{$game->user_score}}</td>
        </tr>
    </table>

    <form action="{{route('game.destroy', $game->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Удалить игру? Это действие нельзя будет отменить')">
            Удалить игру
        </button>
    </form>

    <h3>Отзывы</h3>
    @if($game->reviews->count() > 0)
        <table border="1">
            <tr>
                <th>Пользователь</th>
                <th>Рейтинг</th>
                <th>Дата отзыва</th>
            </tr>
        @foreach($game->reviews as $review)
            <tr>
                <td>{{$review->user->name}}</td>
                <td>{{$review->rating}}</td>
                <td>{{$review->created_at->format('Y-m-d')}}</td>
                <td>
                    <form action="{{route('reviews.destroy',$review->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Удалить отзыв?')">Удалить отзыв</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>
    @endif
@endif
@endsection
