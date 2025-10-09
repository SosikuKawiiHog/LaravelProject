<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>609-32</title>
</head>
<body>
<h2>{{$genre ? "Список игр в жанре ".$genre->name : 'Неверный ID жанра'}}</h2>
@if($genre)
    <table border="1">
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
                <td>{{$game->title}}</td>
                <td>{{$game->developer->name}}</td>
                <td>{{$game->release_date->format('Y-m-d')}}</td>
                <td>{{$game->meta_score}}</td>
            </tr>
        @endforeach
    </table>
    <h2>{{"Итого: ".$total}}</h2>
@endif
</body>
</html>
