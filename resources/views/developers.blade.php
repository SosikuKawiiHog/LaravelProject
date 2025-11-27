@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2>Список разработчиков:</h2>
        <table border="1" class="table table-bordered">
            <thread>
                <thead class="table-dark">
                <tr>
                    <th>id</th>
                    <th>Название</th>
                </tr>
                </thead>
            </thread>
            @foreach ($developers as $developer)
                <tr>
                    <td>{{$developer->id}}</td>
                    <td><a href="{{url('developer',$developer->id)}}">{{$developer->name}}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
