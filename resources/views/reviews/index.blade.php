@extends('layout')
@section('content')
    <div class="container mt-4">
        <h1>Мои отзывы</h1>

        
        <button class="btn btn-primary">
            <a class="link-light" href="{{route('reviews.create')}}">Добавить</a>
        </button>

        @if($reviews->count() > 0)
            <table border="1" class="table table-bordered">
                <thead>
                <tr>
                    <th>Игра</th>
                    <th>Рейтинг</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{$review->game->title}}</td>
                        <td>{{$review->rating}}/10</td>
                        <td>{{$review->created_at->format('d.m.Y H:i')}}</td>
                        <td>
                            <a href="{{route('reviews.edit',$review->id)}}">Редактировать</a>
                            <form action="{{route('reviews.destroy',$review->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>У вас нет отзывов</p>
        @endif
    </div>
@endsection
