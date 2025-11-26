@extends('layout')
@section('content')
<div class="row justify-content-center">
    <div class="col-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2>Добавить отзыв</h2>
            </div>
            <div class="card-body">
                <form action="{{route('reviews.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
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

                    <div class="mb-3">
                        <label for="rating">Рейтинг (0-10): </label>
                        <input type="number" name="rating" id="rating" min="0" max="10" step="0.1"
                               value="{{old('rating')}}" placeholder="Например: 7.8">
                        @error('rating')
                        <div>{{$message}}</div>
                        @enderror
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-success" type="submit">Добавить</button>
                        <a class="btn btn-secondary" href="{{route('reviews.index')}}">Отмена</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
