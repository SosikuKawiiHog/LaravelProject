@extends('layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h3 class="mb-0">Редактировать отзыв</h3>
                    <small>Игра: {{ $review->game->title }}</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Рейтинг (0–10)</label>
                            <input type="number" step="0.1" min="0" max="10" name="rating"
                                   value="{{ old('rating', $review->rating) }}"
                                   class="form-control" required>
                            @error('rating')
                            <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Отмена</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
