<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>609-32</title>
</head>
<body>
    <h2>Список разработчиков:</h2>
    <table border="1">
        <thread>
            <td>id</td>
            <td>Название</td>
        </thread>
        @foreach ($developers as $developer)
        <tr>
            <td>{{$developer->id}}</td>
            <td>{{$developer->name}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>

