<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>609-32</title>
</head>
<body>
<h2>{{$game ? "Жанры игры ".$game->title : 'Неверный ID игры'}}</h2>
@if($game)
    <table border="1">
        <tr>
            <th>id</th>
            <th>Название жанра</th>
        </tr>
        @foreach($game->genres as $genre)
            <tr>
                <td>{{$genre->id}}</td>
                <td>{{$genre->name}}</td>
            </tr>
        @endforeach
    </table>
@endif
</body>
</html>
