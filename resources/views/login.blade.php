@extends('layout')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card shadow-sm">
                <div class="card-header text-center bg-primary text-white">
                    <h3 class="mb-0">Вход в систему</h3>
                </div>
                <div class="card-body">
                    @if(!Auth::check())
                        <form method="POST" action="{{url('auth')}}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" value="{{old('email')}}">
                                @error('email')
                                    <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                       name="password">
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Войти</button>
                            </div>
                        </form>
                    @else
                        <div class="text-center">
                            <p>Вы уже вошли как <strong>{{Auth::user()->name}}</strong></p>
                            <a href="{{url('logout')}}" class="btn btn-outline-danger">Выйти</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
