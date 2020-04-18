<?php

namespace App\Providers;

use App\Models\BookCategory;
use App\Models\BookPost;
use App\Observers\BookCategoryObserver;
use App\Observers\BookPostObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BookCategory::observe(BookCategoryObserver::class);
        BookPost::observe(BookPostObserver::class);
    }
}
