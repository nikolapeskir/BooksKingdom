<?php

namespace App\Providers;

use App\Http\Resources\BookAuthorResource;
use App\Http\Resources\BookResource;
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
        BookResource::withoutWrapping();
        BookAuthorResource::withoutWrapping();
    }
}
