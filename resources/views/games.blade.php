<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>609-32</title>
</head>
<body>
<h2>Список игр:</h2>
<table border="1">
    <thread>
        <td>id</td>
        <td>Название</td>
        <td>Описание</td>
        <td>Дата выхода</td>
        <td>Разработчик</td>
        <td>Metascore</td>
        <td>Пользовательский рейтинг</td>
    </thread>
    @foreach ($games as $game)
        <tr>
            <td>{{$game->id}}</td>
            <td>{{$game->title}}</td>
            <td>{{$game->description}}</td>
            <td>{{$game->release_date->format('Y-m-d')}}</td>
            <td>{{$game->developer->name}}</td>
            <td>{{$game->meta_score}}</td>
            <td>{{number_format($game->reviews_avg_rating,1)}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
