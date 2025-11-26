@extends('layout')
@section('content')
<div class="container">
    <h2 class="mb-4">Список игр</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Дата выхода</th>
                    <th>Разработчик</th>
                    <th>Metascore</th>
                    <th>Рейтинг пользователей</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($games as $game)
                <tr>
                    <td>{{$game->id}}</td>
                    <td>
                        <a href="{{url('game',$game->id)}}">{{$game->title}}</a>

                    </td>
                    <td>{{$game->description}}</td>
                    <td>{{$game->release_date->format('Y-m-d')}}</td>
                    <td>{{$game->developer->name}}</td>
                    <td>{{$game->meta_score}}</td>
                    <td>{{number_format($game->reviews_avg_rating,1)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{$games->links('pagination::default')}}
</div>
@endsection
