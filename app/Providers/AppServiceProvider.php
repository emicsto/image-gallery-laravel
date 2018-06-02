<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.sidebar', function ($view) {

            $tags = \App\Tag::has('images')->get();
            $images = \App\Image::all();
            $comments = \App\Comment::all();
            $archives=\App\Image::archives();

            $view->with(compact('tags', 'images', 'archives', 'comments'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
