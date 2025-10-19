<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

use App\Models\User;
use App\Models\Post;
use App\Observers\UserObserver;
use App\Observers\PostObserver;

class EventServiceProvider extends ServiceProvider
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
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
    }
}