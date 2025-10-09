<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>609-32</title>
</head>
<body>
<h2>{{$developer ? "Список игр от разработчиков ".$developer->name : 'Неверный ID разработчика'}}</h2>
@if($developer)
    <table border="1">
        <tr>
            <th>id</th>
            <th>Название</th>
            <th>Metacritic</th>
        </tr>
        @foreach($developer->games as $game)
            <tr>
                <td>{{$game->id}}</td>
                <td>{{$game->title}}</td>
                <td>{{$game->meta_score}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
