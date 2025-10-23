<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Редактировать отзыв</title>
</head>
<body>
    <h1>Редактировать отзыв</h1>
    <div>
        <strong>Игра:</strong> {{$review->game->title}} ({{$review->game->developer->name}})
    </div>
    <form action="{{route('reviews.update', $review->id)}}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="rating">Рейтинг (0-10):</label>
            <input type="number" name="rating" id="rating" min="0" max="10" step="0.1"
                   value="{{old('rating',$review->rating)}}" placeholder="Например 7.8">

            @error('rating')
                <div>{{$message}}</div>
            @enderror
        </div>
        <button type="submit">Обновить отзыв</button>
        <a href="{{route('reviews.index')}}">Отмена</a>
    </form>
</body>
