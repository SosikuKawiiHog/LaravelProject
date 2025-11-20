<?php

namespace App\Providers;

use App\Models\Game;
use App\Models\Review;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('pagination::default');

        Gate::define('delete-game', function ($user) {
            return $user->is_admin == 1;
        });

        Gate::define('delete-review', function ($user, Review $review) {
            return $user->is_admin == 1 OR $user->id === $review->user_id;
        });

    }
}
