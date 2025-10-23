<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Добавить отзыв</title>
</head>
<body>
    <h1>Добавить отзыв</h1>
    <form action="{{route('reviews.store')}}" method="POST">
        @csrf
        <div>
            <label for="game_id">Игра</label>
            <select name="game_id" id="game_id">
                <option value="" style="display: none">Выберите игру</option>
                @foreach($games as $game)
                    <option value="{{$game->id}}" {{old('game_id') == $game->id ? 'selected' : ''}}>
                        {{$game->title}} ({{$game->developer->name}})
                    </option>
                @endforeach
            </select>
            @error('game_id')
                <div>{{$message}}</div>
            @enderror
        </div>

        <div>
            <label for="rating">Рейтинг (0-10): </label>
            <input type="number" name="rating" id="rating" min="0" max="10" step="0.1"
                   value="{{old('rating')}}" placeholder="Например: 7.8">
            @error('rating')
                <div>{{$message}}</div>
            @enderror
        </div>
        <button type="submit">Добавить</button>
        <a href="{{route('reviews.index')}}">Отмена</a>
    </form>
</body>
